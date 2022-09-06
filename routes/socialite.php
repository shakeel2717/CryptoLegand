<?php

// Google login

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('login/google', [AuthenticatedSessionController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [AuthenticatedSessionController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('login/facebook', [AuthenticatedSessionController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [AuthenticatedSessionController::class, 'handleFacebookCallback']);
