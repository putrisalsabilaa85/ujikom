<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PembayaranController;


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

route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');
route::get('/login', [LoginController::class,'halamanlogin'])->name('halamanlogin');
route::post('/postlogin', [LoginController::class,'postlogin'])->name('postlogin');


// User Route

route::get('/user', [UserController::class,'user'])->name('user');



Route::get('/datasiswa', function () {
       return view('admin/datasiswa');
    });

    Route::get('/datakelas', function () {
        return view('admin/datakelas');
     });

      Route::get('/datapetugas', function () {
          return view('admin/datapetugas');
      });

      Route::get('/dataspp', function () {
         return view('admin/dataspp');
     });

     Route::get('/dataspp', function () {
        return view('admin/datapembayaran');
    });

Route::resource('datasiswa', SiswaController::class);

Route::resource('datakelas', KelasController::class);

Route::resource('datapetugas', PetugasController::class);

Route::resource('dataspp', SppController::class);

Route::resource('datapembayaran', PembayaranController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
