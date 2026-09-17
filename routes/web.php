<?php

use App\Livewire\Customer\Home;
use App\Livewire\Customer\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', Home::class)->name('home');
Route::get('/profile', Profile::class)->name('profile');
