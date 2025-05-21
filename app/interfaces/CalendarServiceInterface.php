<?php

namespace App\interfaces;

use DateTimeImmutable;

interface CalendarServiceInterface
{
    /**
     * Create an immutable datetime for the given date
     */
    public function createDate(int $year, int $month, int $day): DateTimeImmutable;

    /**
     * Check if the given date is in the past
     */
    public function isPastDate(DateTimeImmutable $date): bool;

    /**
     * Check if given date is a weekday (monday thru friday)
     */
    public function isWeekday(DateTimeImmutable $date): bool;

    /**
     * Get the last day of the given month in the given year
     */
    public function lastDayOfMonth(int $year, int $month): DateTimeImmutable;
}