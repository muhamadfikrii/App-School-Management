<?php

use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Contact;
use App\Livewire\FromRegister;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportFinalGradeController;


Route::group(['middleware' => 'auth'], function () {
    Route::get('/export/final-grade/{finalGrade}', ExportFinalGradeController::class)->name('export.final-grade');
});

Route::get('/register/{invitation}', FromRegister::class)->name('register')->middleware('signed');
Route::get('/', Home::class)->name('home');
Route::get('/blog', About::class)->name('About');
Route::get('/contact', Contact::class)->name('Contact');
