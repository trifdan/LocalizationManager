<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTranslationRequest;
use App\Models\Language;
use App\Models\Locale;
use App\Models\Translation;
use Illuminate\Http\Response;
use Inertia\Inertia;

class TranslationsController extends Controller
{

    public function store(CreateTranslationRequest $request): Response
    {
        Translation::query()->create($request->all());
        return response('Created', 201);
    }

    public function index(): \Inertia\Response
    {
        return Inertia::render(
            'Translations',
            ['translations' => Translation::all(), 'languages' => Language::all(), 'locales' => Locale::all()]
        );
    }
}
