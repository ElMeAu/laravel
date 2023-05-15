<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::get('/dashboard/{id?}', [ActivityController::class, 'profile'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/post', [ActivityController::class, 'update'])->name('post');
    Route::post('/save', [ActivityController::class, 'save']);
    Route::get('/delete/{post_id}', [ActivityController::class, 'delete']);
    Route::post('/update_post/{post_id}', [ActivityController::class, 'update_post']);
    Route::get('/update_post/{post_id}', [ActivityController::class, 'update_post']);
});

Route::get('/activities', [ActivityController::class, 'list'])->name('activities');



require __DIR__.'/auth.php';