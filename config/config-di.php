<?php

use App\interfaces\CalendarServiceInterface;
use App\interfaces\FileServiceInterface;
use App\interfaces\PaymentServiceInterface;
use App\services\CalendarService;
use App\services\FileService;
use App\services\PaymentService;

use function DI\autowire;

return [
    CalendarServiceInterface::class => autowire(CalendarService::class),
    FileServiceInterface::class => autowire(FileService::class),
    PaymentServiceInterface::class => autowire(PaymentService::class),
];