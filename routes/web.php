<?php

use App\Http\Controllers\ArtikelController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('artikel.dashboard', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('artikel.create', [ArtikelController::class, 'create'])->name('artikel.create');
Route::post('artikel.store', [ArtikelController::class, 'store'])->name('artikel.store');

require __DIR__.'/auth.php';
