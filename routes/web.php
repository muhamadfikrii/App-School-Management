<?php

use App\Http\Controllers\ExportFinalGradeController;
use App\Livewire\About;
use App\Livewire\Contact;
use App\Livewire\FromRegister;
use App\Livewire\Home;
use App\Livewire\Partials\Achievement;
use Illuminate\Support\Facades\Route;
use App\Livewire\Partials\AchievementDetail;




Route::group(['middleware' => 'auth'], function (): void {
    Route::get('/export/final-grade/{finalGrade}', ExportFinalGradeController::class)->name('export.final-grade');
});

Route::get('/register/{invitation}', FromRegister::class)->name('register')->middleware('signed');
Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/prestasi', Achievement::class)->name('achievement');
Route::get('/prestasi/{achievement}', AchievementDetail::class)
     ->name('achievement.detail');

