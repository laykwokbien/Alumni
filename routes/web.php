<?php

use App\Http\Controllers\ControllerAlumni;
use App\Http\Controllers\ControllerJurusan;
use App\Http\Controllers\ControllerUser;
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


Route::middleware('auth:web,admin,guru')->group(function () {
    Route::get('/', [ControllerUser::class, 'index']);
    Route::get('/create/jurusan', [ControllerJurusan::class, 'index']);
    Route::get('/view/alumni', [ControllerAlumni::class, 'index']);
    // Route::post('/', [ControllerUser::class, 'logout']);
    Route::get('/logout', [ControllerUser::class, 'logout']);
});

Route::middleware('auth:admin,guru')->group(function () {
    Route::post('/create/jurusan', [ControllerJurusan::class, 'create']);
    Route::get('/update/jurusan/{id}', [ControllerJurusan::class, 'view']);
    Route::post('/update/jurusan/{id}', [ControllerJurusan::class, 'update']);
    Route::get('/create/alumni', [ControllerAlumni::class, 'gotocreate']);
    Route::post('/create/alumni', [ControllerAlumni::class, 'create']);
    Route::get('/update/alumni/{id}', [ControllerAlumni::class, 'view']);
    Route::post('/update/alumni/{id}', [ControllerAlumni::class, 'update']);
    Route::get('/view/alumni/{id}', [ControllerAlumni::class, 'show']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/delete/jurusan/{id}', [ControllerJurusan::class, 'confirm']);
    Route::post('/delete/jurusan/{id}', [ControllerJurusan::class, 'delete']);
    Route::get('/delete/alumni/{id}', [ControllerAlumni::class, 'confirm']);
    Route::post('/delete/alumni/{id}', [ControllerAlumni::class, 'delete']);
    Route::get('/admin/view/user', [ControllerUser::class, 'view']);
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [ControllerUser::class, 'loginpg'])->name('login');
    Route::post('/login', [ControllerUser::class, 'login']);
    Route::get('/register', [ControllerUser::class, 'registerpg']);
    Route::post('/register', [ControllerUser::class, 'register']);
});
