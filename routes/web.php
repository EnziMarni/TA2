<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokumenController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/input-dokumen', [DokumenController::class, 'input'])->name('input-dokumen');
Route::get('/list-dokumen', [DokumenController::class, 'listDokumen'])->name('list-dokumen');
Route::post('simpan-dokumen', [DokumenController::class, 'store'])->name('simpan-dokumen');
Route::post('list-dokumen/process', [DokumenController::class, 'processList'])->name('list-dokumen.process');
Route::get('/kategori-dokumen', [DokumenController::class, 'kategori'])->name('kategori-dokumen');
Route::get('/dokumen/{id}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
Route::delete('/dokumen/{id}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');
Route::put('/dokumen/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
Route::get('/search-dokumen', [DokumenController::class, 'search'])->name('search-dokumen');

Route::get('/draft-dokumen', [DokumenController::class, 'draftDocuments'])->name('draft-dokumen');


