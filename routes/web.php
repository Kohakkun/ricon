<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LockerBookingController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('login.login');
});
