<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\DiscoverController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DiseaseTypeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PublicServantController;
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

Route::get('users', [UserController::class, 'index'])->name('user.index');
Route::get('users/{email}', [UserController::class, 'edit'])->name('user.edit');
Route::post('users/save', [UserController::class, 'save'])->name('user.save');
Route::post('users/delete', [UserController::class, 'delete'])->name('user.delete');

Route::get('disease_types', [DiseaseTypeController::class, 'index'])->name('disease-type.index');
Route::get('disease_types/{id}', [DiseaseTypeController::class, 'edit'])->name('disease_types.edit');
Route::post('disease_types/save', [DiseaseTypeController::class, 'save'])->name('disease_types.save');
Route::post('disease_types/delete', [DiseaseTypeController::class, 'delete'])->name('disease_types.delete');

Route::get('countries', [CountryController::class, 'index'])->name('countries.index');
Route::get('countries/{cname}', [CountryController::class, 'edit'])->name('countries.edit');
Route::post('countries/save', [CountryController::class, 'save'])->name('countries.save');
Route::post('countries/delete', [CountryController::class, 'delete'])->name('countries.delete');

Route::get('diseases', [DiseaseController::class, 'index'])->name('diseases.index');
Route::get('diseases/{disease_code}', [DiseaseController::class, 'edit'])->name('diseases.edit');
Route::post('diseases/save', [DiseaseController::class, 'save'])->name('diseases.save');
Route::post('diseases/delete', [DiseaseController::class, 'delete'])->name('diseases.delete');

Route::get('discoveries', [DiscoverController::class, 'index'])->name('discoveries.index');
Route::get('discoveries/{cname}', [DiscoverController::class, 'edit'])->name('discoveries.edit');
Route::post('discoveries/save', [DiscoverController::class, 'save'])->name('discoveries.save');
Route::post('discoveries/delete', [DiscoverController::class, 'delete'])->name('discoveries.delete');


Route::get('public_servants', [PublicServantController::class, 'index'])->name('public_servants.index');
Route::get('public_servants/{email}', [PublicServantController::class, 'edit'])->name('public_servants.edit');
Route::post('public_servants/save', [PublicServantController::class, 'save'])->name('public_servants.save');
Route::post('public_servants/delete', [PublicServantController::class, 'delete'])->name('public_servants.delete');

Route::get('doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('doctors/{email}', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::post('doctors/save', [DoctorController::class, 'save'])->name('doctors.save');
Route::post('doctors/delete', [DoctorController::class, 'delete'])->name('doctors.delete');
