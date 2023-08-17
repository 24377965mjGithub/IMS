<div>
    @if ($notify != "")
        @if (!$isError)
            <p class="alert alert-success">{{ $notify }}</p>
            <script>
                window.location.reload();
            </script>
        @else
            <p class="alert alert-danger">{{ $notify }}</p>
        @endif
    @endif
    <div class="form-group">
        <label for="">Quantity</label>
        <input type="number" class="form-control" wire:model="quantity">
    </div>
    <div class="form-group">
        <button class="btn btn-info" wire:click="addQuantity">Add</button>
    </div>
</div>