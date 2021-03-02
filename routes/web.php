<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\EmailController;
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

## Board 페이지 (MySQL만을 이용하여 작업)
Route::get('/boards', [BoardController::class,'index']); // index
Route::get('/boards/create', [BoardController::class,'create']); // 생성페이지
Route::post('/boards', [BoardController::class,'store']); // Data insert post
Route::get('/boards/{board}', [BoardController::class,'show']); // 하나의 데이터 view
Route::get('/boards/{board}/edit',[BoardController::class,'edit']); // 수정 page
Route::put('/boards/{board}', [BoardController::class,'update']); // data update
Route::delete('/boards/{board}', [BoardController::class,'destroy']); // data delete

## User API (MySQL & Queue Redis를 이용)
Route::get('/user/list',[UserController::class,'show']); // User List
Route::post('/user/create', [UserController::class, 'store']); // User install
Route::post('/user/{no}/update', [UserController::class, 'update']); // User update
Route::delete('/user/{no}/delete', [UserController::class, 'destroy']); // User delete
Route::post('/mail/send',[UserController::class,'sendEmail']); // mail send


## mail ( Queue Job Test )
Route::get('/email',[EmailController::class, 'sendEmail']);
