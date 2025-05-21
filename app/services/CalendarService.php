<?php

declare(strict_types=1);

namespace App\services;

use App\interfaces\CalendarServiceInterface;
use DateTimeImmutable;
use DateTimeZone;

class CalendarService implements CalendarServiceInterface
{
    private DateTimeZone $dateTimeZone;

    public function __construct()
    {
        $this->dateTimeZone = new DateTimeZone('Europe/Amsterdam');
    }

    /** {@inheritDoc} */
    public function createDate(int $year, int $month, int $day): DateTimeImmutable
    {
        return new DateTimeImmutable("{$year}-{$month}-{$day}", $this->dateTimeZone);
    }

    /** {@inheritDoc} */
    public function isPastDate(DateTimeImmutable $date): bool
    {
        $currentDate = new DateTimeImmutable('now', $this->dateTimeZone)->setTime(0,0,0);

        return $date < $currentDate;
    }

    /** {@inheritDoc} */
    public function isWeekday(DateTimeImmutable $date): bool
    {
        return $date->format('N') < 6;
    }

    /** {@inheritDoc} */
    public function lastDayOfMonth(int $year, int $month): DateTimeImmutable
    {
        return new DateTimeImmutable("{$year}-{$month}-01", $this->dateTimeZone)->modify('last day of');
    }
}