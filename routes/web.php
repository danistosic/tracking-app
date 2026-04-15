<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;

Route::get('/', function () {
    return redirect('/shipments');
});

Route::resource('shipments', ShipmentController::class);
