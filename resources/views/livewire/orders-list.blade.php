<x-container id="orders">
    <x-section title="Orders">

        @if($orders->isEmpty())
            <div class="alert alert-warning bg-warning/50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>No orders found</span>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="table table-zebra">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Amount</th>
                        <th>Name</th>
                        <th>description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th class="font-normal">{{ $order->id }}</th>
                            <th class="font-normal">{{ $order->amount }} {{ $order->currency->name }}</th>
                            <th class="font-normal">{{ $order->first_name }}</th>
                            <th class="font-normal">{{ $order->description }}</th>
                            <th class="font-normal">
                                @if($order->order_tracking_id)
                                    <div class="badge badge-success">Initiated</div>
                                    @else
                                    <div class="badge badge-warning">Not Initiated</div>
                                @endif
                            </th>
                            <th class="font-normal">
                                <button class="btn btn-sm btn-primary">View Details</button>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </x-section>
</x-container>
