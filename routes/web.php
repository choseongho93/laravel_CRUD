<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\EmailController;


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

## Board
Route::get('/boards', [BoardController::class,'index']); // index
Route::get('/boards/create', [BoardController::class,'create']); // 생성페이지
Route::post('/boards', [BoardController::class,'store']); // Data insert post
Route::get('/boards/{board}', [BoardController::class,'show']); // 하나의 데이터 view
Route::get('/boards/{board}/edit',[BoardController::class,'edit']); // 수정 page
Route::put('/boards/{board}', [BoardController::class,'update']); // data update
Route::delete('/boards/{board}', [BoardController::class,'destroy']); // data delete

## mail
Route::get('/email',[EmailController::class, 'sendEmail']);
