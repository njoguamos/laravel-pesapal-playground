<div wire:poll.60s id="apiIpns-api">
    <x-container>
        <x-section title="Pesapal Instant Payment Notification (API)">
            @if(empty($apiIpns))
                <div role="alert" class="alert alert-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <span>You have not registered API with Pesapal API. Use the button below to create a new IPN.</span>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>IPN ID</th>
                            <th>Url</th>
                            <th>Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($apiIpns as $index => $ipn)
                            <tr>
                                <th class="font-normal">{{ $index+1 }}</th>
                                <th class="font-normal">{{ $ipn['ipn_id'] }}</th>
                                <th class="font-normal">{{ $ipn['url'] }}</th>
                                <th class="font-normal">{{ \Carbon\Carbon::parse($ipn['created_date'], 'UTC')->tz('Africa/Nairobi')->diffForHumans() }}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </x-section>
    </x-container>
</div>
