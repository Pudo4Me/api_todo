<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'getAll']);
Route::post('/check', [TaskController::class, 'checkTask']);
Route::post('/delete', [TaskController::class, 'delete']);
Route::post('/create', [TaskController::class, 'create']);

