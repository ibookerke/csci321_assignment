<?php

use App\Http\Controllers\DiseaseTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('user.index');
});

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('users/{email}', [UserController::class, 'edit'])->name('user.edit');
Route::post('users/save', [UserController::class, 'save'])->name('user.save');
Route::post('users/delete', [UserController::class, 'delete'])->name('user.delete');

Route::get('disease_types', [DiseaseTypeController::class, 'index'])->name('disease-type.index');
Route::get('disease_types/{id}', [DiseaseTypeController::class, 'edit'])->name('disease_types.edit');
Route::post('disease_types/save', [DiseaseTypeController::class, 'save'])->name('disease_types.save');
Route::post('disease_types/delete', [DiseaseTypeController::class, 'delete'])->name('disease_types.delete');
