<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FiturController;
use App\Http\Controllers\LihatPesanController;
use App\Http\Controllers\LihatReplyController;
use App\Http\Controllers\LihatUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyPesanController;
use App\Http\Controllers\SpecialFeatureController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Middleware\SpecialFeature;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', [UserDashboardController::class, 'index'])->middleware('auth');
Route::get('/about', [UserDashboardController::class, 'about'])->middleware('auth');

Route::resource('/pesan', LihatPesanController::class)->middleware('auth');

Route::get('/u/{user:username}', [PesanController::class, 'index'])->middleware('auth');
Route::post('/kirimpesan', [PesanController::class, 'store']);
Route::get('/deleteallmessage', [PesanController::class, 'deleteAllMessage'])->middleware('auth');

Route::get('/reply/{pesan:id}', [ReplyPesanController::class, 'index'])->middleware('auth');
Route::post('/kirimreply', [ReplyPesanController::class, 'store']);

Route::get('/lihatreply', [LihatReplyController::class, 'index'])->middleware('auth');
// Hapus reply
Route::delete('/lihatreply/{komentar:id}', [LihatReplyController::class, 'destroy']);

Route::post('/fitur/{user:id}', [FiturController::class, 'fitur'])->middleware('specialFeature');

Route::get('/editp/{user:username}', [EditProfileController::class, 'index'])->middleware('auth');

Route::get('/lihatuser', [AdminController::class, 'index'])->middleware('admin');
Route::get('/delete/{user:id}', [AdminController::class, 'hapus'])->middleware('admin');

Route::post('/specialFeature/{user:id}', [SpecialFeatureController::class, 'specialFeature'])->middleware('specialFeature');

Route::post('/kpesan', [PesanController::class, 'kirimpesan']);

Route::put('/updateuser/{user:username}', [FileController::class, 'updateProfile'])->middleware('auth');
