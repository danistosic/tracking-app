<?php

namespace App\Livewire;

use App\Models\Shipment;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Requests\NewShipmentRequest;
use App\Services\ShipmentService;
use App\Services\ShipmentDocumentService;

class CreateShipment extends Component
{
    use WithFileUploads;

    public string $title = '';
    public string $fromCity = '';
    public string $fromCountry = '';
    public string $toCity = '';
    public string $toCountry = '';
    public int $price;
    public array $statuses = [];
    public string $status = '';
    public int $clientId;
    public array $documents = [];
    public string $details = '';
    

    public function validateUser()
    {
        $this->validate([
            'clientId' => 'required|integer|exists:users,id',
        ]);
    }

    public function render()
    {
        return view('livewire.create-shipment');
    }

    public function mount()
    {
        $this->statuses = Shipment::ALLOWED_STATUSES;
    }

    public function submit(
        ShipmentService $shipmentService,
        ShipmentDocumentService $shipmentDocumentService
    ) {
        $request = new NewShipmentRequest();

        $data = $this->validate($request->rules());

        $documents = $data['documents'] ?? [];

        unset($data['documents']);

        $data['from_city'] = $this->fromCity;
        $data['to_city'] = $this->toCity;
        $data['from_country'] = $this->fromCountry;
        $data['to_country'] = $this->toCountry;
        $data['client_id'] = $this->clientId;
        $data['user_id'] = auth()->id();

        $shipment = $shipmentService->store($data);

        $shipmentDocumentService->storeDocuments($shipment, $documents);
    }
}
