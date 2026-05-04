@extends('layout')

@section('content')
    <style>
        .container {
            max-width: 800px;
            margin: 40px auto;
        }

        .card {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .info {
            margin: 8px 0;
        }

        .label {
            font-weight: bold;
            color: #333;
        }

        .price {
            color: #4CAF50;
            font-weight: bold;
        }

        .status {
            padding: 4px 8px;
            border-radius: 6px;
            color: white;
            font-size: 12px;
        }

        .unassigned {
            background: gray;
        }

        .completed {
            background: green;
        }

        .problem {
            background: red;
        }

        .in_progress {
            background: orange;
        }

        .details {
            margin-top: 15px;
            font-style: italic;
            color: #666;
        }
    </style>

    <div class="container">
        <div class="card">

            <div class="title">{{ $shipment->title }}</div>

            <div class="info">
                <span class="label">From:</span>
                {{ $shipment->from_city }}, {{ $shipment->from_country }}
            </div>

            <div class="info">
                <span class="label">To:</span>
                {{ $shipment->to_city }}, {{ $shipment->to_country }}
            </div>

            <div class="info price">
                💰 {{ $shipment->price }} CHF
            </div>

            <div class="info">
                <span class="label">Status:</span>
                <span class="status {{ $shipment->status }}">
                    {{ $shipment->status ?? 'N/A' }}
                </span>
            </div>

            <div class="details">
                {{ $shipment->details }}
            </div>

            <div class="info" style="margin-top:15px; font-size:12px; color:#999;">
                Posted by User ID: {{ $shipment->user_id ?? 'N/A' }}
            </div>

            <div class="info" style="margin-top:15px;">
                <span class="label">Documents:</span>

                @foreach ($shipment->documents as $document)
                    <p>
                        <a target="_blank" href="/storage/documents/{{ $document->document_name }}">
                            {{ $document->document_name }}
                        </a>
                    </p>
                @endforeach
            </div>

        </div>
    </div>
@endsection
