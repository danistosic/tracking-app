<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ShipmentController;

Route::get('/', function () {
    return redirect('/shipments');
});

Route::get('/login-as-admin', function () {
    Auth::loginUsingId(3);

    return redirect('/shipments/create');
});

Route::resource('shipments', ShipmentController::class);

Route::post('/shipments/{shipment}/assign-user', [ShipmentController::class, 'assignUser'])
    ->name('shipments.assignUser');
