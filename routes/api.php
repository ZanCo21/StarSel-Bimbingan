<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Login & Logout\\
Route::post('/loginApi', [ApiController::class, 'loginApi']);
// Route::get('/logoutApi', [ApiController::class, 'logoutApi'])->middleware(['auth:sanctum']);

//GET JADWAL AND SHOW JADWAL\\
Route::get('/jadwal', [ApiController::class, 'jadwal']);
Route::get('/profile', [ApiController::class, 'profile']);
Route::get('/profile/editprofil', [ApiController::class, 'editprofile']);
Route::post('/jadwal/storeJadwal', [ApiController::class, 'storeJadwal']);
Route::get('/jadwal/createJadwal', [ApiController::class, 'createJadwal']);
Route::put('/profile/update/{id}', [ApiController::class, 'updateProfile']);

