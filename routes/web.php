<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RefundController;
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


Route::resource('stranky', 'PageController');
Route::resource('sluzby', 'ServiceController');
Route::get('kontakt', [ContactController::class, 'show']);
Route::post('/mail', [MailController::class, 'sendEmail']);
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('user', 'UserController');
    Route::resource('page', 'PageController');
    Route::resource('section', 'SectionController');
    Route::resource('contact', 'ContactController');
    Route::resource('faq', 'FaqController');
    Route::resource('menu', 'MenuController');
    Route::resource('refund', 'RefundController');
    Route::resource('service', 'ServiceController');
    Route::resource('journey', 'JourneyController');


    Route::post('/upload', [ImageController::class, 'upload']);

    Route::get('/administracia', [UserController::class, 'index']);
    Route::get('/administracia/kontakt', [ContactController::class, 'dash']);
    Route::get('/administracia/sekcie', [SectionController::class, 'index']);
    Route::get('/administracia/stranky', [PageController::class, 'index']);
    Route::get('/administracia/sluzby', [ServiceController::class, 'index']);
    Route::get('/administracia/menu', [MenuController::class, 'index']);
    Route::get('/administracia/kalkulacka', [RefundController::class, 'index']);
    Route::get('/administracia/cesta', [JourneyController::class, 'index']);
});

