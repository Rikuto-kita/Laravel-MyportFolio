<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LearningLogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/learninglog/edit', [LearningLogController::class, 'edit'])->name('learninglog.edit');
    Route::patch('/learninglog/{id}', [LearningLogController::class, 'update'])->name('learninglog.update');
    Route::delete('/learninglog/{id}', [LearningLogController::class, 'delete'])->name('learninglog.delete');
    Route::get('/learninglog/create/{category_id}', [LearningLogController::class, 'create'])->name('learninglog.create');
    Route::post('/learninglog/store', [LearningLogController::class, 'store'])->name('learninglog.store');
});

require __DIR__.'/auth.php';
