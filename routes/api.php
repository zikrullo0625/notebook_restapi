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

Route::get('notebook', [NotebookController::class, 'index']);
Route::post('notebook', [NotebookController::class, 'store']);
Route::get('notebook/{note}', [NotebookController::class, 'show']);
Route::put('notebook/{note}', [NotebookController::class, 'update']);
Route::delete('notebook/{note}', [NotebookController::class, 'destroy']);
