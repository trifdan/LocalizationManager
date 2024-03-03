<?php

namespace App\Jobs;

use App\Exports\TranslationCsvExport;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ExportJsonTranslations implements ShouldQueue
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
           $translations = Translation::query()->where('language_code',$language)->get();
           $filePath = $this->directory . DIRECTORY_SEPARATOR . 'translations' . '_' . $language . '.json';
           Storage::put($filePath,$translations);
        }
    }
}
