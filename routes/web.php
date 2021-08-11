<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
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
    return view('index');
});
Route::get('/index',[BlogController::class,'index']);
Route::get('/tambah',[BlogController::class,'tambah'])->name('tambah');
Route::post('/tambah',[BlogController::class,'simpan'])->name('simpan');
Route::get('/edit/{id}',[BlogController::class,'edit'])->name('edit');
Route::put('/update/{id}',[BlogController::class,'update'])->name('update');


Route::delete('/hapus{id}',[BlogController::class,'delete']);
// Route::post('/simpan', 'BlogController@simpan')->name('simpan');