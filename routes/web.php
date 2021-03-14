<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
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
    return view('homepage');
});


Route::resource('stranky', PageController::class);
Route::resource('sluzby', ServiceController::class);
Route::get('kontakt', [ContactController::class, 'show']);

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('user', 'UserController');
    Route::resource('section', 'SectionController');
    Route::resource('contact', 'ContactController');
    Route::resource('faq', 'FaqController');
    Route::resource('menu', 'MenuController');
    Route::resource('refund', 'RefundController');

    Route::get('/administracia', [UserController::class, 'index']);
    Route::get('/administracia/kontakt', [ContactController::class, 'dash']);
});

