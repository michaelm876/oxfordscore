<?php

use Illuminate\Support\Facades\Route;

use App\Models\Hip;
use App\Models\Knee;
use App\Models\Shoulder;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HipController;
use App\Http\Controllers\KneeController;
use App\Http\Controllers\ShoulderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\UserController;
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

// Public routes
Route::get('/', function () {
    return view('questionnaire');
})->name('questionnaire');

Route::get('/success', function () {
    return view('success');
})->name('success');

Route::get('/hips/create', [HipController::class, 'create'])->name('hips.create');
Route::post('/hips', [HipController::class, 'store'])->name('hips.store');

Route::get('/knees/create', [KneeController::class, 'create'])->name('knees.create');
Route::post('/knees', [KneeController::class, 'store'])->name('knees.store');

Route::get('/shoulders/create', [ShoulderController::class, 'create'])->name('shoulders.create');
Route::post('/shoulders', [ShoulderController::class, 'store'])->name('shoulders.store');

// Private routes
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/hips', [HipController::class, 'index'])->name('hips.index');
    Route::get('/hips/{hip}', [HipController::class, 'show'])->name('hips.show');
    Route::patch('/hips/{hip}', [HipController::class, 'update'])->name('hips.update');
    Route::delete('/hips/{hip}', [HipController::class, 'destroy'])->name('hips.destroy');
    Route::get('/hips/{hip}/edit', [HipController::class, 'edit'])->name('hips.edit');

    Route::get('/knees', [KneeController::class, 'index'])->name('knees.index');
    Route::get('/knees/{knee}', [KneeController::class, 'show'])->name('knees.show');
    Route::patch('/knees/{knee}', [KneeController::class, 'update'])->name('knees.update');
    Route::delete('/knees/{knee}', [KneeController::class, 'destroy'])->name('knees.destroy');
    Route::get('/knees/{knee}/edit', [KneeController::class, 'edit'])->name('knees.edit');

    Route::get('/shoulders', [ShoulderController::class, 'index'])->name('shoulders.index');
    Route::get('/shoulders/{shoulder}', [ShoulderController::class, 'show'])->name('shoulders.show');
    Route::patch('/shoulders/{shoulder}', [ShoulderController::class, 'update'])->name('shoulders.update');
    Route::delete('/shoulders/{shoulder}', [ShoulderController::class, 'destroy'])->name('shoulders.destroy');
    Route::get('/shoulders/{shoulder}/edit', [ShoulderController::class, 'edit'])->name('shoulders.edit');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});

// Private Admin routes
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/consultants', [ConsultantController::class, 'index'])->name('consultants.index');
    Route::get('/consultants/create', [ConsultantController::class, 'create'])->name('consultants.create');
    Route::post('/consultants', [ConsultantController::class, 'store'])->name('consultants.store');
    Route::get('/consultants/{consultant}/edit', [ConsultantController::class, 'edit'])->name('consultants.edit');
    Route::patch('/consultants/{consultant}', [ConsultantController::class, 'update'])->name('consultants.update');
    Route::delete('/consultants/{consultant}', [ConsultantController::class, 'destroy'])->name('consultants.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');       
});

require __DIR__.'/auth.php';