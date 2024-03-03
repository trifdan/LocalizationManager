<?php

namespace App\Jobs;

use App\Exports\TranslationCsvExport;
use App\Models\Language;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ExportCsvTranslations implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected string $directory)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $languages = Language::pluck('code_iso2');
        foreach ($languages as $language) {
            Excel::store(
                new TranslationCsvExport($language),
                $this->directory . DIRECTORY_SEPARATOR . 'translations' . '_' . $language . '.csv',
            );
        }
    }
}
