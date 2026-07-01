<?php

use App\Http\Controllers\BasicController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BasicController::class, 'home'])->name('home');
Route::get('/loguot', [BasicController::class, 'loguot'])->name('loguot');

Route::get('/log', [BasicController::class, 'log'])->name('log');
Route::get('/reg', [BasicController::class, 'reg'])->name('reg');

Route::post('/log', [FormController::class, 'log'])->name('log.form');
Route::post('/reg', [FormController::class, 'reg'])->name('reg.form');
