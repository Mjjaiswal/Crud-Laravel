<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crud;

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

Route::get('/register',[crud::class,'registration']);   
Route::post('/registerpost',[crud::class,'postcrud']);
Route::get('/showdata',[crud::class,'showreg']);
Route::get('/delreg/{id}',[crud::class,'delreg']);
Route::get('/editcrud/{id}',[crud::class,'editcrud']);
Route::post('/editcrudpost',[crud::class,'editcrudpost']);

