<x-container>
    <x-section title="Pesapal Configuration">
        <div class="grid grid-cols-12 gap-5 w-full">
            <div class="col-span-12 md:col-span-4 font-semibold flex items-center">
                Pesapal status
            </div>
            <div class="col-span-12 md:col-span-8">
                @if($pesapalMode)
                    <div class="bg-error/70 text-error-content p-2 rounded-lg">You are running live mode. Be careful! ⚠️</div>
                @else
                    <div class="bg-warning/70 text-warning-content p-2 rounded-lg">You are running sandbox </div>
                @endif
            </div>

            <div class="col-span-12 md:col-span-4 font-semibold flex items-center">
                Consumer Key
            </div>
            <div class="col-span-12 md:col-span-8">
                <div class="bg-base-300/50 p-2 rounded-lg">{{ $consumerKey ?: 'You have not set PESAPAL_CONSUMER_KEY' }}</div>
            </div>

            <div class="col-span-12 md:col-span-4 font-semibold flex items-center">
                Consumer Secret
            </div>
            <div class="col-span-12 md:col-span-8">
                <div class="bg-base-300/50 p-2 rounded-lg">{{ $consumerSecret ?: 'You have not set PESAPAL_CONSUMER_SECRET' }}</div>
            </div>

            <div class="col-span-12 md:col-span-4 font-semibold flex items-center">
                Pesapal tables
            </div>
            <div class="col-span-12 md:col-span-8">
                <div class="bg-base-300/50 p-2 rounded-lg">{{ $tablesMigrated ? 'Pesapal tables migrated ✅' : 'Tables not migrated. Run php artisan migrate ⚠️' }}</div>
            </div>
        </div>
    </x-section>
</x-container>
