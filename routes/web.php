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
    return view('welcome');
});
Route::get('/index',[BlogController::class,'index'])->name('index');
Route::get('/index/tambah',[BlogController::class,'tambah'])->name('tambah');
Route::post('/tambah',[BlogController::class,'simpan'])->name('simpan');
Route::get('/index/edit/{id}',[BlogController::class,'edit'])->name('edit');
Route::put('/update/{id}',[BlogController::class,'update'])->name('update');


Route::delete('/hapus{id}',[BlogController::class,'delete']);
// Route::post('/simpan', 'BlogController@simpan')->name('simpan');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('penulis', function () { return view('penulis'); })->middleware(['checkRole:admin,penulis']);
Route::get('pembaca', function () { return view('pembaca'); })->middleware('checkRole:pembaca');
