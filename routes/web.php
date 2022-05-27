<?php

use App\Http\Controllers\CekController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [TamuController::class, 'index']);

// Untuk Admin
Route::group(['middleware' => ['auth','checkRole:admin']], function(){
Route::get('/kamar/admin', [KamarController::class, 'index']);
Route::get('/kamar/tambah', [KamarController::class, 'tambah']);
Route::post('/kamar/create', [KamarController::class, 'store']);
Route::get('/kamar/edit/{id}', [KamarController::class, 'edit']);
Route::post('/kamar/{id}/update', [KamarController::class, 'update']);
Route::get('/kamar/{id}/hapus', [KamarController::class, 'delete']);
Route::get('/about', [KamarController::class, 'about'])->name('about');

Route::get('/fasilitas/admin', [FasilitasController::class, 'index']);
Route::get('/fasilitas/tambah', [FasilitasController::class, 'tambah']);
Route::post('/fasilitas/create', [FasilitasController::class, 'store']);
Route::get('/fasilitas/edit/{id}', [FasilitasController::class, 'edit']);
Route::post('/fasilitas/{id}/update', [FasilitasController::class, 'update']);
Route::get('/fasilitas/{id}/hapus', [FasilitasController::class, 'delete']);
});

//resepsionis
Route::group(['middleware' => ['auth','checkRole:resepsionis,admin']], function(){
Route::get('/filtering', [KamarController::class, 'filtering']);
Route::get('/filtering/checkin', [KamarController::class, 'ser_checkin']);
Route::get('/filtering/status', [KamarController::class, 'status']);
Route::get('/filtering/cetak_pdf', [KamarController::class, 'cetak_pdf']);
Route::get('/tamu', [HomeController::class, 'tamu'])->name('tamu.index');
Route::get('/verifikasi/{id}', [HomeController::class, 'verifi']);
Route::get('/checkin/{id}', [HomeController::class, 'checkin']);
Route::get('/checkout/{id}', [HomeController::class, 'checkout']);
});

// Untuk Tamu
Route::group(['middleware' => ['auth','checkRole:guest']], function(){
Route::get('/pesan/{id}', [PesanController::class, 'index']);
Route::get('/lihat2/{id}', [CekController::class, 'cek']);
Route::post('/pesan/{id}', [PesanController::class, 'pesan']);
Route::get('/checkout', [PesanController::class, 'checkout']);
Route::get('/konfirmasi/checkout', [PesanController::class, 'konfirmasi']);
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/tamu', [ProfileController::class, 'update'])->name('profile.guest');
Route::get('/history', [HistoryController::class, 'index']);
Route::get('/history/{id}', [HistoryController::class, 'detail']);
Route::delete('/checkout/{id}',[PesanController::class, 'delete']);
Route::get('/cetak_pdf/{id}', [HistoryController::class, 'cetak_pdf']);
});
Route::get('/kamar', [TamuController::class, 'kamar'])->name('kamar');
Route::get('/fasilitas', [TamuController::class, 'fasilitas'])->name('fasilitas');
Route::get('/lihat/{id}', [TamuController::class, 'lihat']);

Auth::routes([
    'password.reset' => false,
    'verify' => false,
    'password.request' => false,
    'reset'=>false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
