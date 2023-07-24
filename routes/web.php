<?php

use App\Http\Controllers\fileController;
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
    return view('welcome');
});

// Route::get('/upload', function () {
//     return view('upload');
// });
Route::get('/upload', [fileController::class, 'index'])->name('file.index');
Route::put('/upload', [fileController::class, 'upload'])->name('file.upload');
Route::post('/download', [fileController::class, 'download'])->name('file.download');
