<?php

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
    return view('auth.login');
});

Auth::routes();




Route::get('/allCategory', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/allTests', [App\Http\Controllers\HomeController::class, 'AllTest'])->name('AllTest');

Route::get('/allTest', App\Http\Livewire\AllTest::class)->name('AllTest');


Route::get('/categories', [App\Http\Controllers\pharmacy::class, 'category']);
Route::post('/categories', [App\Http\Controllers\pharmacy::class, 'AddCategory'])->name('AddCategory');
Route::post('/categories/{id}', [App\Http\Controllers\pharmacy::class, 'eidtC']);

Route::get('/categories/{id}', [App\Http\Controllers\pharmacy::class, 'delete']);



Route::resource('Doctors','App\Http\Controllers\DoctorColl');
 Route::get('Doctors/{id}/edit/','App\Http\Controllers\DoctorColl@edit');

 Route::resource('Patients','App\Http\Controllers\PatientColl');
 Route::get('Patients/{id}/edit/','App\Http\Controllers\PatientColl@edit');

Route::get('/Tests', [App\Http\Controllers\pharmacy::class, 'test']);
Route::post('/Tests.add', [App\Http\Controllers\pharmacy::class, 'addT'])->name('addT');
Route::get('/Tests/{id}', [App\Http\Controllers\pharmacy::class, 'deleteTest']);
Route::post('/Tests2/{id}', [App\Http\Controllers\pharmacy::class, 'eidtTest']);

Route::get('/Orders', [App\Http\Controllers\pharmacy::class, 'order']);
Route::post('/Orders', [App\Http\Controllers\pharmacy::class, 'updateOresr'])->name('update');

Route::get('/create', [App\Http\Controllers\pharmacy::class, 'create']);
Route::get('/show{id}', [App\Http\Controllers\pharmacy::class, 'showOrder']);

Route::get('/Report', [App\Http\Controllers\pharmacy::class, 'report']);
Route::get('/allCategory', [App\Http\Controllers\pharmacy::class, 'search']);
Route::get('/search', [App\Http\Controllers\pharmacy::class, 'searchC'])->name("search");
Route::get('/allCategory.1', [App\Http\Controllers\pharmacy::class, 'search'])->name("search1");


Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/printP', [App\Http\Controllers\pharmacy::class, 'printp']);

Route::post('/allCategory.add', [App\Http\Controllers\pharmacy::class, 'addorder'])->name('addorder');

Route::get('/getData/{id}', [App\Http\Controllers\pharmacy::class, 'getData']);
Route::any('/report', [App\Http\Controllers\pharmacy::class, 'report2']);
Route::any('/Old{id}', [App\Http\Controllers\pharmacy::class, 'printS']);

Route::get('/Users', [App\Http\Controllers\pharmacy::class, 'users']);
Route::post('/Users', [App\Http\Controllers\pharmacy::class, 'adduser'])->name('adduser');
Route::post('/Users/{id}', [App\Http\Controllers\pharmacy::class, 'eidtUser']);
Route::get('/Users/{id}', [App\Http\Controllers\pharmacy::class, 'deleteuser']);





