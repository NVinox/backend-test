<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DeviceController;

Route::post('/devices', [DeviceController::class, 'create']);
Route::get('/devices', [DeviceController::class, 'getAll']);
Route::get('/devices/{id}', [DeviceController::class, 'getOne']);
Route::put('/devices/{id}', [DeviceController::class, 'update']);
Route::delete('/devices/{id}', [DeviceController::class, 'delete']);
