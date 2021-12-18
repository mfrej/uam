<?php

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

Route::get('/uam', [\App\Http\Controllers\AccountController::class, 'index']);
Route::get('/uam/{account}', [\App\Http\Controllers\AccountController::class, 'show']);
Route::get('/uam/create/post', [\App\Http\Controllers\AccountController::class, 'create']); //shows create post form
Route::post('/uam/create/post', [\App\Http\Controllers\AccountController::class, 'store']); //saves the created post to the databse
Route::get('/uam/{account}/edit', [\App\Http\Controllers\AccountController::class, 'edit']); //shows edit post form
Route::put('/uam/{account}/edit', [\App\Http\Controllers\AccountController::class, 'update']); //commits edited post to the database 
Route::delete('/uam/{account}', [\App\Http\Controllers\AccountController::class, 'destroy']); //deletes post from the database

