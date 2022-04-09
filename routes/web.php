<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\AppController;


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

Route::get('/app', [AppController::class, 'index']);

Route::get('/add-accounting', [AccountingController::class, 'addAccounting']);

Route::post('/create-accounting', [AccountingController::class, 'createAccounting'])->name('accounting.create');

Route::get('/accountings', [AccountingController::class, 'getAccounting']);

Route::get('/accountings/{id}', [AccountingController::class, 'getAccountingById']);

Route::get('/delete-accounting/{id}', [AccountingController::class, 'deleteAccounting']);

Route::get('/edit-accounting/{id}', [AccountingController::class, 'editAccounting']);

Route::post('/update-accounting', [AccountingController::class, 'updateAccounting'])->name('accounting.update');

//Route for localization

Route::get('/accounting/{lang}', function ($lang) {
    App::setLocale($lang);
});
