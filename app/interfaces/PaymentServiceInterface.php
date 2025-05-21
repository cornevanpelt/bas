<?php

namespace App\interfaces;

interface PaymentServiceInterface
{
    /**
     * Calculate the salary and bonus payment dates for the remainder of the current year
     */
    public function calculateRemainingPaymentDates(): array;
}