<?php

use App\Http\Controllers\PostController;
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
    return '11111';
});

/**
 * Первый route
 * принимает url, анонимную ф-ю в качестве callback
 */
Route::get('/first', function () {
    return 'this is my page';
});


/**
 * route, который принимает controller
 */
Route::get('/place', [PostController::class, 'index']);
