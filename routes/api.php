<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/ping', function () {
    return ['pong' => true];
});


Route::post('/user', [AuthController::class, 'create']);
Route::middleware('auth:api')->get('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth', [AuthController::class, 'login']);
Route::get('/unauthenticated', function () {
    return ['error' => 'Usuario não logado! ou sem permissão'];
})->name('login');

//Route::middleware('auth:api')->get('/auth/me', [AuthController::class, 'me']);


Route::post('/create', [ApiController::class, 'createUser']);
Route::middleware('auth:api')->get('/user/{id}', [ApiController::class, 'readUser']);
Route::middleware('auth:api')->put('/transaction', [ApiController::class, 'transaction']);
Route::middleware('auth:api')->delete('/todo/{id}', [ApiController::class, 'deleteTodo']);
