<?php

namespace App\Services;

use App\Models\Shipment;

class ShipmentService
{
    public function store(array $data): Shipment
    {
        return Shipment::create($data);
    }
}
