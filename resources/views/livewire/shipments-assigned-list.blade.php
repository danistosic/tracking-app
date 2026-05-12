<div>
    <p>
        Clicked times:
        <span class="{{ $count >= 5000 ? 'red' : '' }}">
            {{ $count }}
        </span>
    </p>

    <button wire:click="increment">Povecaj</button>
    <button wire:click="decrement">Smanji</button>

    <p>{{ $errorMessage }}</p>

    <input
        type="number"
        min="1"
        wire:blur="validateAmount"
        wire:model.live.debounce="amount"
    >

    <p>Amount is {{ $amount }}</p>

    <style>
        .red {
            color: red;
        }
    </style>
</div>
