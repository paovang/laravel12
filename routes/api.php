<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// get ໃຊ້ໃນການດຶງຂໍ້ມູນ
// post ໃຊ້ໃນການບັນທຶກຂໍ້ມູນ
// put ໃຊ້ອັບເດດຂໍ້ມູນ
// delete ໃຊ້ລຶບຂໍ້ມູນ

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth.jwt')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::get('get-posts', [UserController::class, 'getPosts']);
    Route::put('edit-post/{id}', [UserController::class, 'editPost']);
});


Route::post('create-post', [UserController::class, 'createPost']);

Route::delete('delete-post/{id}', [UserController::class, 'deletePost']);