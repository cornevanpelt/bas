<?php

declare(strict_types=1);

use App\interfaces\FileServiceInterface;
use App\interfaces\PaymentServiceInterface;
use DI\ContainerBuilder;

require_once __DIR__ . '/vendor/autoload.php';

// create services
$container = new ContainerBuilder()->addDefinitions('config/config-di.php')->build();
$paymentService = $container->make(PaymentServiceInterface::class);
$fileService = $container->make(FileServiceInterface::class);

// ask user for CSV filename
echo "Please enter output filename (without extension): ";
$filename = trim(fgets(STDIN));

// calculate the payment dates for the rest of the current year
$paymentDates = $paymentService->calculateRemainingPaymentDates();

// write the payment dates to a CSV file with the requested filename
$csvWritten = $fileService->writeArrayToCsv($paymentDates, "{$filename}.csv");

echo $csvWritten ?
    "Payment dates have been written to {$filename} successfully.\n" :
    "Storing payment dates to {$filename} has failed.\n";