<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/players')->group( function(){

    Route::post('/', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::middleware(['auth:api'])->group(function () {
        Route::get('/', [UserController::class, 'getUsers'])->name('players')->middleware('admin');
        Route::put('/{id}', [UserController::class, 'update'])->name('update.player');
        Route::delete('/{id}/games', [UserController::class, 'deleteThrows'])->name('delete.throws');
        Route::post('/{id}/games', [GameController::class, 'play'])->name('play');
        Route::get('/{id}/games', [GameController::class, 'getThrows'])->name('all.throws');
        Route::get('/ranking', [GameController::class, 'ranking'])->name('ranking')->middleware('admin');
        Route::get('/ranking/loser', [GameController::class, 'loser'])->name('loser');
        Route::get('/ranking/winner', [GameController::class, 'winner'])->name('winner');
    });
});
