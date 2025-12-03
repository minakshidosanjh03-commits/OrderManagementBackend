<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

Route::post('/signup',[AuthController::class,'signup']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/orders',[OrderController::class,'create']);
    Route::get('/orders',[OrderController::class,'list']);
    
});

Route::patch('/orders/{id}/status',[OrderController::class,'updateStatus']);

?>