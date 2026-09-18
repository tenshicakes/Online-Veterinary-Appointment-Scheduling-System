<?php

use Illuminate\Support\Facades\Auth;
use App\Livewire\AuthPage;
use App\Livewire\Customer\Home;
use App\Livewire\Customer\Profile;
use App\Livewire\Customer\Appointment;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Support\Facades\Route;

Route::get('/', AuthPage::class)->name('auth');

Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/appointment', Appointment::class)->name('appointment');

    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect('/');
    })->name('logout');

});
