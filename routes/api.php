<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
//use App\Http\Controllers\PasswordController;
//use APP\Http\Controllers\AuthContController;
//use APP\Http\Controllers\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('/generate-password', [PasswordController::class, 'generate']);
// 所有的todo
Route::get('/getAllTodos', [TodoController::class, 'getAllTodos']);

// 新增Todo
Route::post('/createTodo', [TodoController::class, 'createTodo']);
// 更新Todo
Route::post('/updateTodo', [TodoController::class, 'updateTodo']);
// 刪除Todo
Route::post('/deleteTodo', [TodoController::class, 'deleteTodo']);