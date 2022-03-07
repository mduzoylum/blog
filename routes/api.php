<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\CategoryTagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::middleware('auth:api')->group(function () {
    Route::get('/test', [LoginController::class, 'test'])->name('test');
});

Route::prefix('/user')->name('user.')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResources([
        'categories' => CategoryController::class,
        'articles' => ArticleController::class,
        'subscription' => SubscriptionController::class,
        'authors' => AuthorController::class,
        'tags' => TagController::class,
        'articles_tags' => ArticleTagController::class,
        'categories_tags' => CategoryTagController::class,
    ]);
});

