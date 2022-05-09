<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::apiResource("employees", UserController::class)->only("index", "store");
Route::get("groups", [GroupController::class, 'index']);
Route::get("profiles", [ProfileController::class, 'index']);
Route::post("assign_group", [GroupController::class, 'assign_group']);
