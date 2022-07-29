<?php

use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\FiturController;
use App\Http\Controllers\LihatPesanController;
use App\Http\Controllers\LihatReplyController;
use App\Http\Controllers\LihatUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyPesanController;
use App\Http\Controllers\UserDashboardController;
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
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', [UserDashboardController::class, 'index'])->middleware('auth');

Route::resource('/pesan', LihatPesanController::class)->middleware('auth');

Route::get('/u/{user:username}', [PesanController::class, 'index'])->middleware('otherUserOnly');
Route::post('/kirimpesan', [PesanController::class, 'store']);

Route::get('/reply/{pesan:id}', [ReplyPesanController::class, 'index']);
Route::post('/kirimreply', [ReplyPesanController::class, 'store']);

Route::get('/lihatreply', [LihatReplyController::class, 'index']);
// Hapus reply
Route::delete('/lihatreply/{komentar:id}', [LihatReplyController::class, 'destroy']);

Route::post('/fitur/{user:id}', [FiturController::class, 'fitur']);

Route::get('/editp', [EditProfileController::class, 'index']);

Route::get('/lihatuser', [LihatUserController::class, 'index']);