<?php

use App\Http\Controllers\NewsCategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;
use App\Http\Controllers\SocialProvidersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::prefix('news')->name('news.')->group(static function () {
    Route::get('/', [NewsController::class, 'index'])
        ->name('index');

    Route::get('/{news}', [NewsController::class, 'show'])
        ->name('show');
});

Route::prefix('news-categories')->name('categories.')->group(static function () {
    Route::get('/', [NewsCategoriesController::class, 'index'])
        ->name('index');

    Route::get('/{id}', [NewsCategoriesController::class, 'show'])
        ->where('id', '\d+')
        ->name('show');
});

// Route::group(['prefix' => ''], static function() {
//     Route::get('/news-categories', [NewsCategoriesController::class, 'index']);

//     Route::get('/news-categories/{id}', [NewsCategoriesController::class, 'show'])
//         ->where('id', '\d+')
//         ->name('categories.show');
// });

Route::prefix('admin')->name('admin.')->middleware(['auth', 'is.admin'])->group(static function () {
    Route::get('/', [AdminIndexController::class, 'index'])
                    ->name('index');
    Route::get('/parser', AdminParserController::class)
                    ->name('parser');
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/users', AdminUserController::class);
    Route::get('/users/toggleRole/{user}', [AdminUserController::class, 'toggleRole'])
                    ->name('users.toggleRole');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/{driver}/redirect', [SocialProvidersController::class, 'redirect'])
        ->name('social-providers.redirect');

    Route::get('/{driver}/callback', [SocialProvidersController::class, 'callback'])
        ->name('social-providers.callback');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
