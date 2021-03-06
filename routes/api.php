<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompetitorLocationMoitoringController;

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

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
// Route::controller(CompetitorLocationMoitoringController::class)->group(function(){
//     Route::get('/plan','index');
// });
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //     return $request->user();
    // });
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/plan',[CompetitorLocationMoitoringController::class,'index']);
});
