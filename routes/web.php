<?php

use App\Http\Controllers\ControllerAlumni;
use App\Http\Controllers\ControllerBerita;
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


Route::get('/', [ControllerUser::class, 'index']);
Route::get('/berita', [ControllerBerita::class, 'index']);
Route::get('/about', [ControllerUser::class, 'about']);

Route::middleware('auth:web,admin,guru,alumni')->group(function () {
    Route::get('/alumni', [ControllerUser::class, "alumni"]);
    Route::get('/create/jurusan', [ControllerJurusan::class, 'index']);
    Route::get('/view/alumni', [ControllerAlumni::class, 'index']);
    Route::get('/logout', [ControllerUser::class, 'logout']);
});

Route::middleware('auth:admin,guru')->group(function () {
    Route::get('/create/berita', [ControllerBerita::class, 'gotoCreate']);
    Route::post('/create/berita', [ControllerBerita::class, 'create']);
    Route::get('/update/berita/{id}', [ControllerBerita::class, 'gotoUpdate']);
    Route::post('/update/berita/{id}', [ControllerBerita::class, 'update']);
    Route::post('/create/jurusan', [ControllerJurusan::class, 'create']);
    Route::get('/update/jurusan/{id}', [ControllerJurusan::class, 'view']);
    Route::post('/update/jurusan/{id}', [ControllerJurusan::class, 'update']);
    Route::get('/create/alumni', [ControllerAlumni::class, 'gotocreate']);
    Route::post('/create/alumni', [ControllerAlumni::class, 'create']);
});

Route::middleware('auth:admin,guru,alumni')->group(function () {
    Route::get('/update/alumni/{id}', [ControllerAlumni::class, 'view']);
    Route::post('/update/alumni/{id}', [ControllerAlumni::class, 'update']);
    Route::get('/view/alumni/{id}', [ControllerAlumni::class, 'show']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/delete/berita/{id}', [ControllerBerita::class, 'confirm']);
    Route::post('/delete/berita/{id}', [ControllerBerita::class, 'delete']);
    Route::get('/delete/jurusan/{id}', [ControllerJurusan::class, 'confirm']);
    Route::post('/delete/jurusan/{id}', [ControllerJurusan::class, 'delete']);
    Route::get('/delete/alumni/{id}', [ControllerAlumni::class, 'confirm']);
    Route::post('/delete/alumni/{id}', [ControllerAlumni::class, 'delete']);
    Route::get('/admin/view/user', [ControllerUser::class, 'viewuser']);
    Route::get('/admin/view/guru', [ControllerUser::class, "viewguru"]);
    Route::get('/admin/view/alumni', [ControllerUser::class, 'viewalumni']);
    Route::get('/create/guru', [ControllerUser::class, 'gotoCreateguru']);
    Route::post('/create/guru', [ControllerUser::class, 'createguru']);
    Route::get('/delete/guru/{id}', [ControllerUser::class, 'confirmguru']);
    Route::post('/delete/guru/{id}', [ControllerUser::class, 'deleteguru']);
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [ControllerUser::class, 'loginpg'])->name('login');
    Route::post('/login', [ControllerUser::class, 'login']);
    Route::get('/register', [ControllerUser::class, 'registerpg']);
    Route::post('/register', [ControllerUser::class, 'register']);
    Route::get('/confirm/alumni', [ControllerUser::class, 'ConfirmPage']);
    Route::post('/confirm/alumni', [ControllerUser::class, 'ConfirmAlumni']);
    Route::get('/register/alumni', [ControllerUser::class, 'alumniIndex']);
    Route::post('/register/alumni', [ControllerUser::class, 'AlumniCreate']);
    Route::get('/return', [ControllerUser::class, 'return']);
});