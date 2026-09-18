<?php

use App\Http\Middleware\PreventBackHistory;
use App\Livewire\AuthPage;
use App\Livewire\Customer\About;
use App\Livewire\Customer\Appointment;
use App\Livewire\Customer\Home;
use App\Livewire\Customer\Profile;
use App\Livewire\Customer\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', AuthPage::class)->name('login');

Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/appointment', Appointment::class)->name('appointment');
    Route::get('/services', Services::class)->name('services');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/about', About::class)->name('about');

    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    })->name('logout');

});
