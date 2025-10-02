<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')
        ->name('login');
});

Route::post('logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('logout');

Route::post('logout', App\Livewire\Actions\Logout::class)
    ->name('logout');
