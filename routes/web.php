<?php

use App\Livewire\AuthPage;
use App\Livewire\Customer\Home;
use App\Livewire\Customer\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', AuthPage::class)->name('auth');

Route::middleware('auth')->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/profile', Profile::class)->name('profile');
});
