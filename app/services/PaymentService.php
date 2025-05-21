<?php

declare(strict_types=1);

namespace App\services;

use App\interfaces\CalendarServiceInterface;
use App\interfaces\PaymentServiceInterface;
use DateTimeImmutable;

class PaymentService implements PaymentServiceInterface
{
    private CalendarServiceInterface $calendarService;

    public function __construct(CalendarServiceInterface $calendarService)
    {
        $this->calendarService = $calendarService;
    }

    /** {@inheritDoc} */
    public function calculateRemainingPaymentDates(): array
    {
        $currentYear = (int)date('Y');
        $currentMonth = (int)date('n');
        $paymentDates = [];

        for ($month = $currentMonth; $month <= 12; $month++) {
            $paymentMonth['month'] = date('F', mktime(0, 0, 0, $month, 1));
            $paymentMonth['salary_payment_date'] = null;
            $paymentMonth['bonus_payment_date'] = null;

            if (!$this->calendarService->isPastDate($paymentDate = $this->calculateBaseSalaryPaymentDate($currentYear, $month))) {
                $paymentMonth['salary_payment_date'] = $paymentDate->format('Y-m-d');
            }

            if (!$this->calendarService->isPastDate($bonusPaymentDate = $this->calculateBonusPaymentDate($currentYear, $month))) {
                $paymentMonth['bonus_payment_date'] = $bonusPaymentDate->format('Y-m-d');
            }

            $paymentDates[] = $paymentMonth;
        }

        return $paymentDates;
    }

    /**
     * Calculate the base salary payment date for the given month and year
     * Payment date is the last weekday of the given month
     */
    private function calculateBaseSalaryPaymentDate(int $year, int $month): DateTimeImmutable
    {
        $paymentDate = $this->calendarService->lastDayOfMonth($year, $month);

        return $this->calendarService->isWeekday($paymentDate) ? $paymentDate : $paymentDate->modify('last weekday');
    }

    /**
     * Calculate the bonus payment date for the given month and year
     * Bonus payment date is the 15th of the given month when that is
     * a working day, if not, then bonus payment date is the wednesday after
     */
    private function calculateBonusPaymentDate(int $year, int $month): DateTimeImmutable
    {
        $paymentDate = $this->calendarService->createDate($year, $month, 15);

        return $this->calendarService->isWeekday($paymentDate) ? $paymentDate : $paymentDate->modify('next wednesday');
    }
}