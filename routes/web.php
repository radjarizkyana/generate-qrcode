<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
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
Route::get('/', [DataController::class, 'index']);
Route::post('/', [DataController::class, 'store'])->name('store');
Route::get('/qrcode/cetak_pdf/{id}', [DataController::class, 'cetak_pdf'])->name('generate.cetak_pdf');
Route::get('/qrcode-generate/{id}', [DataController::class, 'generate'])->name('generate.qr');
Route::get('/qrcode/{id}', [DataController::class, 'edit'])->name('generate.edit');
Route::delete('/qrcode/{id}', [DataController::class, 'delete'])->name('generate.destroy');
Route::patch('/qrcode/{id}', [DataController::class, 'update'])->name('generate.update');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
