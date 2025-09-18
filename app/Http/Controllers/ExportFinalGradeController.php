<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinalGrade;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

class ExportFinalGradeController extends Controller
{
    public function __invoke(FinalGrade $finalGrade)
    {
        $finalGrade->load(['gradesDetail', 'student', 'classRombel', 'academicYear']);

        return Pdf::view('pdfs.final-grade', ['finalGrade' => $finalGrade])
            ->withBrowsershot(function (Browsershot $browsershot): void {
                $browsershot->noSandbox();
                $browsershot->setEnvironmentOptions([
                    'CHROME_CONFIG_HOME' => storage_path('app/chrome/.config'),
                ]);
            })
            ->download("Final-Grade-Report-{$finalGrade->id}.pdf");
    }
}
