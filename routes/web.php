<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;

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

Route::prefix('task')->middleware(['cors'])->group(function () {
    Route::get('getAll', [TaskController::class, 'getAll']);
    Route::get('getByID/{id}', [TaskController::class, 'getByID']);
    Route::post('addTask', [TaskController::class, 'addTask']);
    Route::put('editTask/{id}', [TaskController::class, 'editTask']);
    Route::delete('deleteTask/{id}', [TaskController::class, 'deleteTask']);
});
