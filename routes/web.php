<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/question/respon', function () {
    return view('home-question-respon', session('data', []));
})->name('question.respon');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
