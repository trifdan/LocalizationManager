<?php

namespace App\Exports;

use App\Models\Translation;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TranslationCsvExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct(protected string $languageCode)
    {
    }

    public function query(): \Illuminate\Database\Eloquent\Builder
    {
        return Translation::query()->where('language_code', $this->languageCode);
    }

    public function headings(): array
    {
        return [
            'Language',
            'Key',
            'Value',
        ];
    }
}
