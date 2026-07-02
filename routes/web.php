<?php

use App\Http\Controllers\BasicController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\VisitLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [BasicController::class, 'log'])->name('login');
Route::get('/reg', [BasicController::class, 'reg'])->name('reg');
Route::post('/log', [FormController::class, 'log'])->name('log.form');
Route::post('/reg', [FormController::class, 'reg'])->name('reg.form');
Route::get('/links/del', function () {
    abort(404);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/', [BasicController::class, 'home'])->name('home');
    Route::get('/links', [BasicController::class, 'links'])->name('links');
    Route::post('/', [FormController::class, 'linkCut'])->name('link.form');
    Route::post('/links/del', [FormController::class, 'linkDel'])->name('link.del');
    Route::get('/link/{id}', [BasicController::class, 'linkOpen'])->name('link.open');
});

Route::get('/logout', [BasicController::class, 'logout'])->name('logout');
Route::get('/{code}', [VisitLinkController::class, 'openLink']);
