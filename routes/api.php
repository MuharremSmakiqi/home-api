<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\RegistrationsController;

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

Route::post('/register', [CustomersController::class, 'register']);
Route::post('/login', [CustomersController::class, 'login']);
Route::get('packages', [PackagesController::class, 'index']);
Route::post('register-package/{id}', [RegistrationsController::class, 'register']);
 




