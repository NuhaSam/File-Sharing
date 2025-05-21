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
    return view('home');
})->name('home');


Route::get('/upload', [fileController::class, 'index'])->name('file.index');
Route::put('/upload', [fileController::class, 'upload'])->name('file.uploads');
Route::get('/download', [fileController::class, 'showDownload'])->name('file.showDownload');
Route::post('/download', [fileController::class, 'download'])->name('file.download');

Route::view('/file-sharing/contact','technical-support')->name('contact');

Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ar'])) {
        abort(400);
    }
    session()->put('locale', $locale);
    app()->setLocale($locale);
    // return $locale;

    return redirect()->back();
})->name('lang.switch');
