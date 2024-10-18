<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\MealsController;
use App\Http\Controllers\API\MealCategorysController;
use App\Http\Controllers\API\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/meals', MealsController::class)->except(['index','show']);
    Route::apiResource('/employees', EmployeeController::class);
    Route::apiResource('/mealcategorys', MealCategorysController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::get('/meals', [MealsController::class, 'index']);
Route::get('/meals/{meal}', [MealsController::class, 'show']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

