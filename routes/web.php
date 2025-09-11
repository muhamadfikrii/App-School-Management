<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\FromRegister;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register/{invitation}', FromRegister::class)->name('register')->middleware('signed');

