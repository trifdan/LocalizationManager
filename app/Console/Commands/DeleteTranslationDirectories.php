<?php

namespace App\Console\Commands;

use App\Services\ExportService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteTranslationDirectories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-translation-directories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $directoriesToDelete = (new ExportService)->getAvailableExports();
        foreach ($directoriesToDelete as $dir) {
            Storage::deleteDirectory($dir);
        }
    }
}
