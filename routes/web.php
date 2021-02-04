<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/get_posts', [PostController::class, 'get_posts'])->name('get_posts');

Route::get('/form', [PostController::class, 'form'])
			->name('form')
			->middleware('auth');

Route::post('/add_post', [PostController::class, 'add_post'])
			->name('add_post')
			->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/move_images', [PostController::class, 'move_images']);
