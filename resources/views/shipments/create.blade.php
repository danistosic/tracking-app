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

        button:hover {
            background: #45a049;
        }
    </style>

    <div class="form-container">
        <h2>Create New Shipment</h2>

        <form action="{{ route('shipments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div style="color:red; margin-bottom:20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label>From City</label>
                <input type="text" name="from_city" value="{{ old('from_city') }}">
            </div>

            <div class="form-group">
                <label>From Country</label>
                <input type="text" name="from_country" value="{{ old('from_country') }}">
            </div>

            <div class="form-group">
                <label>To City</label>
                <input type="text" name="to_city" value="{{ old('to_city') }}">
            </div>

            <div class="form-group">
                <label>To Country</label>
                <input type="text" name="to_country" value="{{ old('to_country') }}">
            </div>

            <div class="form-group">
                <label>Price ($)</label>
                <input type="number" name="price" value="{{ old('price') }}">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" required>
                    @foreach (\App\Models\Shipment::ALLOWED_STATUSES as $status)
                        <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="documents">Documents</label>
                <input type="file" name="documents[]" multiple required>
            </div>


            <div class="form-group">
                <label>Details</label>
                <textarea name="details">{{ old('details') }}</textarea>
            </div>

            <button type="submit">Create Shipment</button>

        </form>
    </div>
@endsection
