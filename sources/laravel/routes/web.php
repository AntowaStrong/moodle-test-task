<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MoodleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controller::class, 'index']);

Route::prefix('moodle')->name('moodle.')->group(function () {
    Route::get('users', [MoodleController::class, 'users'])->name('users');
    Route::get('courses', [MoodleController::class, 'courses'])->name('courses');
    Route::get('grades', [MoodleController::class, 'grades'])->name('grades');
});