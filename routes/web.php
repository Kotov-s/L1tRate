<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RatesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/book/{book:ISBN}', [ BookController::class, 'show']);

Route::get('/search/', [ BookController::class, 'search']);
Route::get('/author/', [ BookController::class, 'author']);

Route::get('/user/settings', [ Controller::class, 'settings'])->middleware('auth');
Route::post('/user/settings', [ Controller::class, 'update'])->middleware('auth');

Route::get('/rates/', [ RatesController::class, 'show']);
Route::delete('/rates/delete/{rate:id}', [ RatesController::class, 'delete'])->middleware('auth');
Route::post('/rates/store', [ RatesController::class, 'store'])->middleware('auth');
Route::get('/rates/check', [ RatesController::class, 'check'])->middleware('auth');

Route::post('/comment/store', [ CommentController::class, 'store']);


Route::get('/', [HomeController::class, 'index']);