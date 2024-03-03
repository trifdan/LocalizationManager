<?php

namespace App\Services;

use App\Jobs\ExportCsvTranslations;
use App\Jobs\ExportJsonTranslations;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ExportService
{
    const TYPES_JOB_MAP = [
        'csv' => ExportCsvTranslations::class,
        'json' => ExportJsonTranslations::class,
    ];

    public function export(string $type): ?string
    {
        if (!in_array($type, array_keys(self::TYPES_JOB_MAP))) {
            return null;
        }

        $directoryPath = 'translations_'.$type . Carbon::now()->toDateTimeLocalString();
        Storage::makeDirectory($directoryPath);

        /**
         * @var ShouldQueue $job
         */
        $job = self::TYPES_JOB_MAP[$type];
        $job::dispatch($directoryPath);

        return $directoryPath;
    }

    public function getAvailableExports(): array
    {
        return array_filter(Storage::allDirectories(''), function ($directory) {
            return str_contains($directory, 'translation');
        });
    }

    public function downloadDirectory(string $name): ?string
    {
        $zipFileName = $name. '.zip';
        $zipFilePath = storage_path($zipFileName);

        $zip = new ZipArchive();

        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            return null;
        }

        $files = Storage::allFiles($name);
        foreach ($files as $file) {
            $fileContent = Storage::get($file);

            $relativePath = basename($name) . '/' . basename($file);
            $zip->addFromString($relativePath, $fileContent);
        }

        $zip->close();
        return $zipFilePath;
    }
}
