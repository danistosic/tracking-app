<?php

namespace App\Services;

use App\Models\Shipment;
use App\Models\ShipmentDocuments;

class ShipmentDocumentService
{
    public function storeDocuments(Shipment $shipment, array $documents): void
    {
        foreach ($documents as $document) {
            $path = $document->store('documents/' . $shipment->id, 'public');

            ShipmentDocuments::create([
                'shipment_id' => $shipment->id,
                'document_name' => $path,
            ]);
        }
    }
}
