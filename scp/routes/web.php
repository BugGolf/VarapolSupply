<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

Route::get('/login', function () { return view('login.form_login'); });
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(["middleware" => "auth"], function() {
  Route::get('/', function () { return view('home.home'); });
  Route::get('/home', function () { return view('home.home'); });

  Route::get('/profile', [ProfileController::class, 'index']);
  Route::post('/profile', [ProfileController::class, 'update']);
  
  // Product
  Route::get('/product', [ProductController::class, 'index']);
  Route::get('/product/lowStock', [ProductController::class, 'lowStock']);
  Route::get('/product/add', [ProductController::class, 'addProduct']);
  Route::post('/product/add', [ProductController::class, 'store']);
  Route::get('/product/edit/{id}', [ProductController::class, 'editProduct']);
  Route::post('/product/edit/{id}', [ProductController::class, 'update']);
  Route::get('/product/delete/{id}', [ProductController::class, 'delete']);

  Route::get('/transaction/income', [TransactionController::class, 'incomeStock']);
  Route::post('/transaction/income', [TransactionController::class, 'addIncome']);
  Route::get('/transaction/outcome', [TransactionController::class, 'outcomeStock']);
  Route::post('/transaction/outcome', [TransactionController::class, 'addOutcome']);
  
  Route::get('/transaction/reportIncome', [TransactionController::class, 'reportIncome']);
  Route::get('/transaction/reportOutcome', [TransactionController::class, 'reportOutcome']);

  // Category
  Route::get('/category', [CategoryController::class, 'index']);
  Route::get('/category/add', [CategoryController::class, 'addCategory']);
  Route::post('/category/add', [CategoryController::class, 'store']);

  Route::get('/user', [UserController::class, 'index']);
  Route::get('/user/add', [UserController::class, 'addUser']);
  Route::post('/user/add', [UserController::class, 'store']);
  Route::get('/user/edit/{id}', [UserController::class, 'editUser']);
  Route::post('/user/edit/{id}', [UserController::class, 'update']);
  Route::get('/user/delete/{id}', [UserController::class, 'delete']);
});