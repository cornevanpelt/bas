<?php

declare(strict_types=1);

namespace App\services;

use App\interfaces\FileServiceInterface;

class FileService implements FileServiceInterface
{
    /** {@inheritDoc} */
    public function writeArrayToCsv(array $data, string $filename, string $delimiter = ','): bool
    {
        if (!empty($data)) {
            array_unshift($data, array_keys($data[0]));
        }

        if (!($handle = fopen($filename, 'w'))) {
            return false;
        }

        foreach ($data as $row) {
            if (fputcsv($handle, $row, $delimiter, escape: '') === false) {
                fclose($handle);

                return false;
            }
        }

        fclose($handle);

        return true;
    }
}