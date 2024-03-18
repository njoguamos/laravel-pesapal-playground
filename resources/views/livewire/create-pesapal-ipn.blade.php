<x-container >
<x-section title="Create a new Instant Payment Notification">

<form wire:submit="submit" class="flex items-end justify-between space-x-3 w-full">
    <label class="form-control w-full">
        <div class="label">
            <span class="label-text">Enter the url to create a new IPN</span>
        </div>
        <input type="text" placeholder="Endpoint" class="input input-bordered w-full"  wire:model="url"/>
        @error('url')
            <div class="label ">
                <span class="label-text-alt text-red-600 font-medium">{{ $message }}</span>
            </div>
        @enderror
    </label>

        <button class="btn btn-primary w-32" type="submit">Create</button>
</form>
</x-section>
</x-container>
