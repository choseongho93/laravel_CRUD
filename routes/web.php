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
Route::prefix('/boards')->group(function(){
    Route::get('/', [BoardController::class,'index']); // index
    Route::get('/create', [BoardController::class,'create']); // 생성페이지
    Route::post('/', [BoardController::class,'store']); // Data insert post
    Route::get('/{board}', [BoardController::class,'show']); // 하나의 데이터 view
    Route::get('/{board}/edit',[BoardController::class,'edit']); // 수정 page
    Route::put('/{board}', [BoardController::class,'update']); // data update
    Route::delete('/{board}', [BoardController::class,'destroy']); // data delete
});

## UserModel API (MySQL & Queue Redis를 이용)
Route::prefix('/users')->group(function(){
    Route::get('/list',[UserController::class,'show']); // UserModel List
    Route::post('/create', [UserController::class, 'store']); // UserModel insert
    Route::post('/{no}/update', [UserController::class, 'update']); // UserModel update
    Route::delete('/{no}/delete', [UserController::class, 'destroy']); // UserModel delete

});


Route::post('/mails/send',[UserController::class,'sendEmail']); // mail send


## mail ( Queue Job Test )
Route::get('/email',[EmailController::class, 'sendEmail']);
