<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [ProjectController::class, 'all'])->middleware(['auth'])->name('dashboard');

Route::get('/profile/my-profile', [UserController::class, 'index'])->middleware(['auth']);
Route::post('/profile/profile-update', [UserController::class, 'update'])->middleware(['auth'])->name('profile-update');

Route::get('/projects/my-projects', [ProjectController::class, 'index'])
    ->middleware(['auth'])->name('my-projects');

Route::get('/projects/create-project', [ProjectController::class, 'create'])->middleware(['auth']);

Route::get('/projects/{id}/edit-project', [ProjectController::class, 'edit'])->middleware(['auth'])->name('edit-project');

Route::get('/projects/{id}/delete', [ProjectController::class, 'destroy'])->middleware(['auth'])->name('delete-project');

Route::post('/profile/create-project', [ProjectController::class, 'store'])->middleware(['auth'])
    ->name('project-create');


Route::put('/profile/{id}/edit-project', [ProjectController::class, 'update'])->middleware(['auth'])
    ->name('project-edit');

require __DIR__ . '/auth.php';
