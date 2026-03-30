<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('shipments', ShipmentController::class);
