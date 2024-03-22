<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NotebookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('note/{id}', [NotebookController::class, 'show']);
Route::get('note', [NotebookController::class, 'index']);
Route::post('note', [NotebookController::class, 'store']);
Route::put('note/{id}', [NotebookController::class, 'update']);
Route::delete('note/{id}', [NotebookController::class, 'destroy']);
