
@extends('layout')

@section('content')

<style>
    body {
        background: #f5f7fa;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 900px;
        margin: 40px auto;
    }

    .card {
        background: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: 0.2s;
    }

    .card:hover {
        transform: translateY(-4px);
    }

    .title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .info {
        margin: 5px 0;
        color: #555;
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
        font-size: 12px;
        color: white;
        display: inline-block;
    }

    .status-unassigned {
        background: gray;
    }

    .status-completed {
        background: green;
    }

    .status-problem {
        background: red;
    }

    .status-in_progress {
        background: orange;
    }

    .details {
        margin-top: 10px;
        font-style: italic;
        color: #666;
    }

    .user {
        margin-top: 10px;
        font-size: 12px;
        color: #999;
    }
</style>

<div class="container">

   @foreach($shipments as $shipment)
    <a href="{{ route('shipments.show', $shipment->id) }}" style="text-decoration: none; color: inherit;">
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

            <div class="user">
                Posted by User ID: {{ $shipment->user_id }}
            </div>

        </div>
    </a>
@endforeach

</div>

@endsection