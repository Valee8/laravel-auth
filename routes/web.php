<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'home']) -> name('home');

Route::get('/show/{project}', [MainController::class, 'projectShow']) -> name('project.show');

Route::middleware(['auth', 'verified'])
   ->name('admin.')
   ->prefix('admin')
   ->group(function () {
    Route::get('/delete/{project}', [MainController :: class, 'projectDelete']) -> name('project.delete');

    Route::get('/create', [MainController::class, 'projectCreate']) -> name('project.create');

    Route::post('/store', [MainController::class, 'projectStore']) -> name('project.store');

    Route::get('/project/edit/{project}', [MainController::class, 'projectEdit']) -> name('project.edit');

    Route::post('/project/update/{project}', [MainController::class, 'projectUpdate']) -> name('project.update');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
