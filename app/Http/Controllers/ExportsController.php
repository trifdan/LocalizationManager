<?php

namespace App\Http\Controllers;

use App\Services\ExportService;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportsController extends Controller
{
    public function __construct(protected ExportService $exportService)
    {
        $this->exportService = new ExportService();
    }

    public function index(): \Inertia\Response
    {
        return Inertia::render('Exports', ['exports' => $this->exportService->getAvailableExports()]);
    }

    public function export(string $fileType): Response
    {
        $this->exportService->export($fileType);
        return response('Exported', 201);
    }

    public function download(string $name): BinaryFileResponse
    {
        return response()->download($this->exportService->downloadDirectory($name))->deleteFileAfterSend();
    }

    public function available(): Response
    {
        return \response($this->exportService->getAvailableExports());
    }
}
