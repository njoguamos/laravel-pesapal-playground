<x-container >
    <x-section title="Create a new order">
        <form class="grid grid-cols-1 gap-4 md:grid-cols-2" wire:submit="submit">

            <label class="form-control w-full md:col-span-2">
                <div class="label">
                    <span class="label-text">Describe the transaction</span>
                </div>
                <input type="text" class="input input-bordered w-full" name="description"  wire:model="description"/>
                @error('description')
                <div class="label ">
                    <span class="label-text-alt text-red-600 font-medium">{{ $message }}</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Amount</span>
                </div>
                <input type="number" step=".01" class="input input-bordered w-full" name="amount" wire:model="amount"/>
                @error('amount')
                <div class="label ">
                    <span class="label-text-alt text-red-600 font-medium">{{ $message }}</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Currency</span>
                </div>
                <select class="select select-bordered w-full" name="currency" wire:model="currency">
                    @foreach(\NjoguAmos\Pesapal\Enums\ISOCurrencyCode::cases() as $currency)
                        <option value="{{ $currency->value }}">{{ $currency->name }} - {{ $currency->value }}</option>
                    @endforeach
                </select>
                @error('amount')
                <div class="label ">
                    <span class="label-text-alt text-red-600 font-medium">{{ $message }}</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Where to redirect after payment</span>
                </div>
                <input type="text" class="input input-bordered w-full"  wire:model="callbackUrl"/>
                @error('callbackUrl')
                <div class="label ">
                    <span class="label-text-alt text-red-600 font-medium">{{ $message }}</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Instant Payment Notification</span>
                </div>
                <select class="select select-bordered w-full" name="notificationId" wire:model="notificationId">
                    <option value="" disabled selected>Select IPN</option>
                    @foreach($ipns as $ipn)
                        <option value="{{ $ipn->ipn_id }}">{{ $ipn->url }}</option>
                    @endforeach
                </select>
                @error('notificationId')
                <div class="label ">
                    <span class="label-text-alt text-red-600 font-medium">{{ $message }}</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Where to redirect after payment is cancelled</span>
                </div>
                <input type="text" class="input input-bordered w-full" name="cancellationUrl" wire:model="cancellationUrl"/>
                @error('cancellationUrl')
                <div class="label ">
                    <span class="label-text-alt text-red-600 font-medium">{{ $message }}</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Customer name</span>
                </div>
                <input type="text" class="input input-bordered w-full" name="name" wire:model="name"/>
                @error('name')
                <div class="label ">
                    <span class="label-text-alt text-red-600 font-medium">{{ $message }}</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Customer email</span>
                </div>
                <input type="email" class="input input-bordered w-full" name="email" wire:model="email"/>
                @error('email')
                <div class="label">
                    <span class="label-text-alt text-red-600 font-medium">{{ $message }}</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Customer phone</span>
                </div>
                <input type="tel" class="input input-bordered w-full" name="phone" wire:model="phone"/>
                @error('phone')
                <div class="label ">
                    <span class="label-text-alt text-red-600 font-medium">{{ $message }}</span>
                </div>
                @enderror
            </label>

            <div class="form-control md:col-span-2 flex justify-end">
                <button class="btn btn-primary w-40" type="submit">Create Order</button>
            </div>
        </form>
    </x-section>
</x-container>
