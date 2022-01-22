<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::post('/create', [ApiController::class, 'createUser']);
Route::get('/user/{id}', [ApiController::class, 'readUser']);
Route::put('/transaction', [ApiController::class, 'transaction']);
Route::delete('/todo/{id}', [ApiController::class, 'deleteTodo']);
