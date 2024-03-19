
<x-app>
<x-container>
    <x-section title="Order Details">

        <div class="grid grid-cols-12 gap-5 w-full">
            <div class="col-span-12 md:col-span-6 font-semibold flex items-center">
                Describe the transaction
            </div>
            <div class="col-span-12 md:col-span-6">
               {{ $order->description }}
            </div>

            <div class="col-span-12 md:col-span-6 font-semibold flex items-center">
                Order Amount
            </div>
            <div class="col-span-12 md:col-span-6">
                {{ $order->currency->name." ".$order->amount }}
            </div>

            <div class="col-span-12 md:col-span-6 font-semibold flex items-center">
                Where to redirect after payment is cancelled
            </div>
            <div class="col-span-12 md:col-span-6">
                {{ $order->cancellation_url }}
            </div>

          <div class="col-span-12 md:col-span-6 font-semibold flex items-center">
                Where to redirect after payment is made
            </div>
            <div class="col-span-12 md:col-span-6">
                {{ $order->callback_url }}
            </div>

            <div class="col-span-12 md:col-span-6 font-semibold flex items-center">
                Customer name
            </div>
            <div class="col-span-12 md:col-span-6">
                {{ $order->first_name." ".$order->middle_name." ".$order->last_name }}
            </div>

            <div class="col-span-12 md:col-span-6 font-semibold flex items-center">
                Customer email
            </div>
            <div class="col-span-12 md:col-span-6">
                {{ $order->email_address }}
            </div>

            <div class="col-span-12 md:col-span-6 font-semibold flex items-center">
                Customer phone
            </div>
            <div class="col-span-12 md:col-span-6">
                {{ $order->phone_number }}
            </div>

            <div class="col-span-12 md:col-span-6 font-semibold flex items-center">
                Submit Status
            </div>
            <div class="col-span-12 md:col-span-6">
                @if($order->order_tracking_id)
                    Submitted with tracking id: {{ $order->order_tracking_id  }}
                @else
                    <a href="{{ route('order.submit', $order) }}" class="btn btn-sm btn-primary">Submit Order</a>
                @endif
            </div>
        </div>
    </x-section>
    </x-container>

    <x-container>
        <x-section title="Payment Links">

            @if($order->redirect_url && ! $order->transaction_payload)
                <iframe src="{{ $order->redirect_url }}" class="w-full" height="412px"></iframe>
            @else
                <p class="text-center">You have not initiated the transaction or the transaction has been completed.</p>
            @endif
        </x-section>
    </x-container>

    <x-container>
        <x-section title="Payment Status">
            @if($order->transaction_payload)
                <div class="mockup-code mt-6">
                    @foreach($order->transaction_payload as $key => $value)
                        <pre data-prefix=">" class="text-success"><code>{{ $key }}: {{ is_array($value) ? json_encode($value): $value }} {{ PHP_EOL }}</code></pre>
                    @endforeach
                </div>
            @else
                <p>No transaction status found</p>
            @endif
        </x-section>
    </x-container>
</x-app>
