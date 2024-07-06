<?php

use App\Http\Controllers\CheckSanksiController;
use App\Http\Controllers\ClasStudentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TatibController;
use Illuminate\Support\Facades\Route;

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
    return view('Riwayat.tester');
});

// route kelas
Route::get('/kelas/index', [ClasStudentController::class, 'index'])->name('kelas-index');
Route::post('kelas/store', [ClasStudentController::class, 'store'])->name('kelas-store');
Route::get('/kelas/edit{id}', [ClasStudentController::class, 'edit'])->name('kelas-edit');
Route::put('/kelas/update{id}', [ClasStudentController::class, 'update'])->name('kelas-update');
Route::delete('/kelas/delete{id}', [ClasStudentController::class, 'destroy'])->name('kelas-delete');

// route siswa
Route::get('/siswa/index', [StudentController::class, 'index'])->name('siswa-index');
Route::post('siswa/store', [StudentController::class, 'store'])->name('siswa-store');
Route::get('/siswa/edit{id}', [StudentController::class, 'edit'])->name('siswa-edit');
Route::put('/siswa/update{id}', [StudentController::class, 'update'])->name('siswa-update');
Route::delete('/siswa/delete{id}', [StudentController::class, 'destroy'])->name('siswa-delete');

// route tatib
Route::get('tatib/index', [TatibController::class, 'index'])->name('tatib-index');
Route::post('tatib/store', [TatibController::class, 'store'])->name('tatib-store');
Route::delete('/tatib/delete{id}', [TatibController::class, 'destroy'])->name('tatib-delete');

// route sanksi
Route::get('sanksi/index', [SanksiController::class, 'index'])->name('sanksi-index');
Route::post('sanksi/store', [SanksiController::class, 'store'])->name('sanksi-store');
Route::delete('/sanksi/delete{id}', [SanksiController::class, 'destroy'])->name('sanksi-delete');

// route Laporan
Route::get('/laporan/create', [ReportController::class, 'create'])->name('laporan-create');
Route::get('/laporan/index', [ReportController::class, 'index'])->name('laporan-index');
Route::get('/laporan/index{id}', [ReportController::class, 'index_user'])->name('laporan-index-user');
Route::post('laporan/store', [ReportController::class, 'store'])->name('laporan-store');
// Route::get('/laporan/edit{id}', [ReportController::class, 'edit'])->name('laporan-edit');
// Route::put('/laporan/update{id}', [ReportController::class, 'update'])->name('laporan-update');
Route::delete('/laporan/delete{id}', [ReportController::class, 'destroy'])->name('laporan-delete');
// Route::delete('/laporan/deleteuser{id}', [ReportController::class, 'destroy_user'])->name('delete-laporan-user');

// route riwayat
Route::get('/riwayat/index', [HistoryController::class, 'selectcounthistory'])->name('riwayat-count');

Route::get('selectSiswa',[HistoryController::class, 'selectsiswa'])->name('selectsiswa');
Route::get('selectTatib',[HistoryController::class, 'selecttatib'])->name('selecttatib');

Route::post('riwayat/store', [HistoryController::class, 'store'])->name('riwayat-store');
Route::get('/riwayat/edit{id}', [HistoryController::class, 'edit'])->name('riwayat-edit');
Route::put('/riwayat/update{id}', [HistoryController::class, 'update'])->name('riwayat-update');
Route::delete('/riwayat/delete{id}', [HistoryController::class, 'destroy'])->name('riwayat-delete');


Route::get('/tester',[CheckSanksiController::class, 'testing'])->name('tester');
Route::get('/testingview',[CheckSanksiController::class, 'tesview'])->name('viewtes');
Route::post('testing/store', [CheckSanksiController::class, 'testing'])->name('testing-store');