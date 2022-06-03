<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PetitionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/petitions/display/{id}',[PetitionController::class, 'display']);
Route::get('/petitions/category/{id}',[PetitionController::class, 'findbycategory']);
Route::get('/petitions/search/{keyword}',[PetitionController::class, 'search']);
Route::post('/petitions/sort/{api_token}',[PetitionController::class, 'sortables'])->middleware('api_token');
Route::post('/petitions/create/{api_token}',[PetitionController::class, 'create'])->middleware('api_token');
Route::post('/categories/{api_token}',[CategoryController::class, 'store'])->middleware('api_token');
