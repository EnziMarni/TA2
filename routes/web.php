<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DraftDocumentController;

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

Route::put('/dokumen/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
Route::get('/search-dokumen', [DokumenController::class, 'search'])->name('search-dokumen');

Route::post('/dokumen/{id}/move-to-draft', [DokumenController::class, 'moveToDraft'])->name('dokumen.moveToDraft');
Route::delete('/draft/{id}/delete', [DraftDocumentController::class, 'delete'])->name('draft.delete');
Route::get('/dokumens', [DraftDocumentController::class, 'index'])->name('dokumens.index');
Route::delete('/dokumens/{id}/draft', [DraftDocumentController::class, 'moveToDraft'])->name('dokumens.moveToDraft');
Route::get('/draft-dokumen', [DraftDocumentController::class, 'index'])->name('draft-dokumen');




