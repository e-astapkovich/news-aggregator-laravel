<?php

use App\Http\Controllers\NewsCategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => ''], static function() {
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

    Route::get('/news/{id}', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
});

Route::group(['prefix' => ''], static function() {
    Route::get('/news-categories', [NewsCategoriesController::class, 'index']);

    Route::get('/news-categories/{id}', [NewsCategoriesController::class, 'show'])
        ->where('id', '\d+')
        ->name('categories.show');
});
