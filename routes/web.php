<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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
    return redirect('welcome');
});
// Auth 
Route::post('auth',[AuthController::class, 'login']);
// User
Route::get('profile',[UserController::class, 'user']);
Route::post('signup',[UserController::class, 'signup']);
Route::get('editUser/{id}',[UserController::class, 'showUser']);
Route::post('updateuser',[UserController::class, 'updateUser']);
// Interest
Route::get('interest',[InterestController::class, 'interest']);
Route::get('interested/{id}',[InterestController::class, 'storeInterest']);
Route::get('deleteInterest/{id}',[InterestController::class, 'deleteInterest']);
// Post
Route::get('welcome',[PostController::class, 'bestPost']);
Route::get('home',[PostController::class, 'posts']);
Route::get('delete/{id}',[PostController::class, 'deletePost']);
Route::get('edit/{id}',[PostController::class, 'showPost']);
Route::get('create', [PostController::class, 'cat']);
Route::post('updatePost',[PostController::class, 'updatePost']);
Route::post('add',[PostController::class, 'storePost']);
// Category
Route::get('admin',[CategoryController::class, 'getAll']);
Route::get('editcat/{id}',[CategoryController::class, 'showCat']);
Route::get('delcat/{id}',[CategoryController::class, 'delcat']);
Route::post('addcat',[CategoryController::class, 'store']);
Route::post('updatecat',[CategoryController::class, 'updateCat']);
// Views
Route::view('goToSignUp', '/users/signup');
Route::view('update', '/posts/update');