@extends('layout')

@section('content')
    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            background: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .error {
            color: red;
            margin-bottom: 20px;
        }
    </style>

    <div class="form-container">
        <h2>Edit Shipment</h2>

        <form action="{{ route('shipments.update', $shipment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title', $shipment->title) }}" required>
            </div>

            <div class="form-group">
                <label>From City</label>
                <input type="text" name="from_city" value="{{ old('from_city', $shipment->from_city) }}">
            </div>

            <div class="form-group">
                <label>From Country</label>
                <input type="text" name="from_country" value="{{ old('from_country', $shipment->from_country) }}">
            </div>

            <div class="form-group">
                <label>To City</label>
                <input type="text" name="to_city" value="{{ old('to_city', $shipment->to_city) }}">
            </div>

            <div class="form-group">
                <label>To Country</label>
                <input type="text" name="to_country" value="{{ old('to_country', $shipment->to_country) }}">
            </div>

            <div class="form-group">
                <label>Price ($)</label>
                <input type="number" name="price" value="{{ old('price', $shipment->price) }}">
            </div>

            <div class="form-group">
                <label>Status</label>

                <div class="form-group">
                    @if ($errors->has('user_id'))
                        <p style="color: red;">{{ $errors->first('user_id') }}</p>
                    @endif

                    <label for="user_id">Trucker ID</label>
                    <input type="number" name="user_id" value="{{ old('user_id', $shipment->user_id) }}" min="0"
                        required>
                </div>

                <select name="status" required>
                    @foreach (\App\Models\Shipment::ALLOWED_STATUSES as $status)
                        <option value="{{ $status }}"
                            {{ old('status', $shipment->status) == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                @if ($errors->has('client_id'))
                    <p style="color: red;">{{ $errors->first('client_id') }}</p>
                @endif

                <label for="client_id">Client ID</label>
                <input type="number" name="client_id" value="{{ old('client_id', $shipment->client_id) }}" min="0"
                    required>
            </div>

            <div class="form-group">
                <label for="documents">Documents</label>
                <input type="file" name="documents[]" multiple>
            </div>

            <div class="form-group">
                <label>Details</label>
                <textarea name="details">{{ old('details', $shipment->details) }}</textarea>
            </div>

            <button type="submit">Update Shipment</button>
        </form>
    </div>
@endsection
