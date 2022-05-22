<?php

use App\Http\Controllers\Admin\AuthorContoller;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\RubricController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});
Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/add',[HomeController::class,'add']);
Route::resource('news',NewsController::class);
Route::resource('rubric',RubricController::class);
Route::resource('author',AuthorController::class);
