<?php

namespace App\interfaces;

use DateTimeImmutable;

interface CalendarServiceInterface
{
    /**
     * @param int $year
     * @param int $month
     * @param int $day
     *
     * @return DateTimeImmutable
     */
    public function createDate(int $year, int $month, int $day): DateTimeImmutable;

    /**
     * @param DateTimeImmutable $date
     *
     * @return bool
     */
    public function isPastDate(DateTimeImmutable $date): bool;

    /**
     * @param DateTimeImmutable $date
     *
     * @return bool
     */
    public function isWeekday(DateTimeImmutable $date): bool;

    /**
     * @param int $year
     * @param int $month
     *
     * @return DateTimeImmutable
     */
    public function lastDayOfMonth(int $year, int $month): DateTimeImmutable;
}