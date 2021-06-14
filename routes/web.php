<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\VoteController;

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

Route::get('/', [PollController::class, 'index']);
Route::get('/poll/create', [PollController::class, 'create']);
Route::post('/poll/save', [PollController::class, 'store']);
Route::post('/poll/save/{id}', [PollController::class, 'update']);
Route::get('/poll/delete/{id}', [PollController::class, 'delete']);
Route::get('/poll/find/{id}', [PollController::class, 'find']);
Route::get('/poll/show/{id}', [PollController::class, 'show']);
Route::get('/poll/close/{id}', [PollController::class, 'closePoll']);

Route::get('/poll/vote/{id}', [VoteController::class, 'find']);
Route::post('/poll/vote/confirm/{id}', [VoteController::class, 'vote']);
Route::get('/poll/results/{id}', [VoteController::class, 'results']);
