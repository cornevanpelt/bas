<?php

namespace App\interfaces;

interface FileServiceInterface
{
    /**
     * Write the contents of a multi-dimensional array to a CSV file
     * The keys of the first array item will be used as the header
     */
    public function writeArrayToCsv(array $data, string $filename, string $delimiter = ','): bool;
}