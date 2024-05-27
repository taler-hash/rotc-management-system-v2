<?php
// Tiwasa ni route login not defined sa auth:sanctum ang sulbad kay pangitaon nimu ang middleware

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/user')
->controller(UserController::class)
->group(function () {
    Route::post('/create', 'create');   
});


Route::post('/login', [AuthController::class, 'login']);

Route::get('/authenticate', function() {
    return response()->noContent();
})->middleware('auth:sanctum');

Route::get('/test', function () {

    return response()->json('test');
});

