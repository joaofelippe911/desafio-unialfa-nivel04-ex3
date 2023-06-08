<?php

use App\Http\Controllers\BeersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctumk')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/beers", [BeersController::class, "index"]);

Route::get("/beers/download", [BeersController::class, "download"]);
