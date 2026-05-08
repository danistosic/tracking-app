<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewShipmentRequest;
use App\Models\ShipmentDocuments;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\UpdateShipmentRequest;
use Illuminate\Support\Facades\Gate;

class ShipmentController extends Controller
{

    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('shipments.index', [
            'shipments' => Shipment::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('canViewCreationPage', Shipment::class);

        return view('shipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewShipmentRequest $request)
    {
        Gate::authorize('create', Shipment::class);
        
        $shipment = Shipment::create($request->validated());

        $fileTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];

        foreach ($request->file('documents') as $document) {
            if (str_starts_with($document->getMimeType(), 'image/')) {
                $name = $this->uploadImage($document, "documents/{$shipment->id}");

                $name = $shipment->id . "/" . $name;

                ShipmentDocuments::create([
                    'shipment_id' => $shipment->id,
                    'document_name' => $name,
                ]);
            } elseif (in_array($document->getMimeType(), $fileTypes)) {
                $extension = $document->getClientOriginalExtension();

                $filename = uniqid() . "." . $extension;

                $path = $document->storeAs("documents/{$shipment->id}", $filename, 'public');

                $path = str_replace("documents/", "", $path);

                ShipmentDocuments::create([
                    'shipment_id' => $shipment->id,
                    'document_name' => $path,
                ]);
            } else {
                dd("Nije dozvoljeno!");
            }
        
        }

        return redirect()->route('shipments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        return view('shipments.show', compact('shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        return view('shipments.edit', compact('shipment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipment->update($request->validated());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        //
    }
}
