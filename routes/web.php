<?php

use App\Http\Controllers\ExportFinalGradeController;
use App\Livewire\FromRegister;
use App\Livewire\Page\About;
use App\Livewire\Page\Achievements;
use App\Livewire\Page\BeritaPage;
use App\Livewire\Page\Contact;
use App\Livewire\Page\Home;
use App\Livewire\Page\Organization;
use App\Livewire\Page\ProfileGuru;
use App\Livewire\Page\Program;
use App\Livewire\Partials\AchievementDetail;
use App\Livewire\Partials\BeritaDetail;
use App\Livewire\Partials\ProgramDetail;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function (): void {
    Route::get('/export/final-grade/{finalGrade}', ExportFinalGradeController::class)->name('export.final-grade');
});

Route::get('/register/{invitation}', FromRegister::class)->name('register')->middleware('signed');
Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');

Route::get('/achievement', Achievements::class)->name('achievement');
Route::get('/achievement/{id}', AchievementDetail::class)->name('achievement.detail');

Route::get('/jurusan', Program::class)->name('jurusan');
Route::get('/jurusan/{slug}', ProgramDetail::class)->name('jurusan.detail');

Route::get('/organisasi-eskul', Organization::class)->name('organisasi');

Route::get('/profile-guru', ProfileGuru::class)->name('profile-guru');

Route::get('/berita', BeritaPage::class)->name('berita');
Route::get('/berita/{slug}', BeritaDetail::class)->name('berita.detail');
