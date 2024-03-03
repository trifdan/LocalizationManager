<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLanguageRequest;
use App\Models\Language;
use Illuminate\Http\Response;
use Inertia\Inertia;

class LanguageController extends Controller
{
    public function store(CreateLanguageRequest $request): Response
    {
        Language::create($request->all());
        return response('Created', 201);
    }

    public function index(): \Inertia\Response
    {
        return Inertia::render('Languages', ['languages' => Language::all()]);
    }
}
