<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Models\Absen;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/laporan', [DashboardController::class, 'laporan']);
Route::get('/databsen/{absen:id}', [DashboardController::class, 'header'])->name('absen_header');
Route::get('/search', [DashboardController::class, 'search']);
Route::get('/absen', [AbsenController::class, 'index']);
Route::post('/absen', [AbsenController::class, 'store']);
Route::get('/jampulang', [AbsenController::class, 'pulang']);
Route::patch('/jampulang', [AbsenController::class, 'absenpulang'])->name('pulang');
Route::patch('/istirahat', [AbsenController::class, 'istirahat'])->name('istirahat');
Route::patch('/selesaiIstirahat', [AbsenController::class, 'selesaiIstirahat'])->name('istirahatEnd');
Route::resource('/karyawan', KaryawanController::class);
Route::get('/karyawan/checkSlug', [KaryawanController::class, 'checkSlug']);
