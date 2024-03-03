<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLocaleRequest;
use App\Models\Locale;
use Illuminate\Http\Response;
use Inertia\Inertia;

class LocalesController extends Controller
{
    public function store(CreateLocaleRequest $request): Response
    {
        Locale::create($request->all());
        return response('Created', 201);
    }

    public function index(): \Inertia\Response
    {
        return Inertia::render('Locales', ['locales' => Locale::all()]);
    }
}
