<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/language/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('language');

Route::get('/greeting/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'th'])) {
        abort(400);
    }

    App::setLocale($locale);

    $locale = App::currentLocale();
    print($locale . "<br>");

    echo __('messages.welcome');
});
