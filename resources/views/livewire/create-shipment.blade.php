<div>
    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 24px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background: #fff;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .error {
            color: red;
            font-size: 0.9rem;
        }

        button {
            background: #38a169;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>

    <form class="form-container" wire:submit="submit">

        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
        

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" wire:model="title">
        </div>

        <div class="form-group">
            <label for="from_city">From City</label>
            <input type="text" wire:model="fromCity">
        </div>

        <div class="form-group">
            <label for="from_country">From Country</label>
            <input type="text" wire:model="fromCountry">
        </div>

        <div class="form-group">
            <label for="to_city">To City</label>
            <input type="text" wire:model="toCity">
        </div>

        <div class="form-group">
            <label for="to_country">To Country</label>
            <input type="text" wire:model="toCountry">
        </div>

        <div class="form-group">
            <label for="price">Price ($)</label>
            <input type="number" wire:model="price">
        </div>

        <div class="form-group">
            <label for="client_id">Client ID</label>

            @error('clientId')
                <p class="error">{{ $message }}</p>
            @enderror

            <input type="number" wire:blur="validateUser" wire:model="clientId">
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select wire:model="status">
                @foreach ($statuses as $singleStatus)
                    <option value="{{ $singleStatus }}">{{ $singleStatus }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="documents">Documents</label>
            <input type="file" wire:model="documents" multiple>
        </div>

        <div class="form-group">
            <label for="details">Details</label>
            <textarea wire:model="details" rows="4"></textarea>
        </div>

        <button type="submit">Create Shipment</button>
    </form>
</div>
