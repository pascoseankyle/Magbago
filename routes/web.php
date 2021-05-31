<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\UserController;
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
// Interest
Route::get('interest',[InterestController::class, 'interest']);
Route::get('interested/{id}',[InterestController::class, 'storeInterest']);
Route::get('deleteInterest/{id}',[InterestController::class, 'deleteInterest']);
// Post
Route::get('welcome',[PostController::class, 'bestPost']);
Route::get('home',[PostController::class, 'posts']);
Route::get('delete/{id}',[PostController::class, 'deletePost']);
Route::get('edit/{id}',[PostController::class, 'showPost']);
Route::post('updatePost',[PostController::class, 'updatePost']);
Route::post('add',[PostController::class, 'storePost']);
// Auth 
Route::post('login',[AuthController::class, 'login']);
// User
Route::get('profile',[UserController::class, 'user']);
Route::post('signup',[UserController::class, 'signup']);
Route::get('editUser/{id}',[UserController::class, 'showUser']);
Route::post('updateuser',[UserController::class, 'updateUser']);
// Views
Route::view('goToSignUp', '/users/signup');
Route::view('create', '/posts/create');
Route::view('update', '/posts/update');