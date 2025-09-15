<?php

use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\FromRegister;
use Illuminate\Support\Facades\Route;



Route::get('/register/{invitation}', FromRegister::class)->name('register')->middleware('signed');

Route::get('/', Home::class)->name('home');
Route::get('/blog', About::class)->name('About');

