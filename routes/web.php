<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

//common resource routings;
//index-show all listings
//show -show single listing
//create-show form to create new listings
//store-store new listings
//edit-show form to edit listing
//update-update listings
//delete-delete listings



//all listings
Route::get('/', [ListingController::class,'index']);


//show Create Form
Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

//store listing Data
Route::post('/listings',[ListingController::class,'store'])->middleware('auth');

//show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');

//update-update listings
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');


//delete-delete listings
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');


//single listings
Route::get('/listings/{listing}',[ListingController::class,'show']);


//Show Register/Create Form
Route::get('/register',[UserController::class,'register'])->middleware('guest');


//create New User
Route::post('/users',[UserController::class,'storeuser']);

// Log User Out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');


//Show Login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');


//authenticate User
Route::post('/users/authenticate',[UserController::class,'authenticate']);





