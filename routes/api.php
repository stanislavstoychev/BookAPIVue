<?php

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
Route::apiResource('book', 'BookController')->except(['edit']);
Route::apiResource('genre', 'GenreController')->except(['edit']);
Route::apiResource('rent', 'RentController')->except(['edit']);
Route::get('rentedbooks', 'RentController@rentedbooks');
Route::apiResource('subscriber', 'SubscriberController')->except(['edit']);
Route::get('rentedbooksbysubscriber', 'SubscriberController@rentedbooks');
