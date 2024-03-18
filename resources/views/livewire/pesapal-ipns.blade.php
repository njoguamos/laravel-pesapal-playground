<div wire:poll.60s id="ipns">
    <x-container>
        <x-section title="Pesapal Instant Payment Notification">
            @if($ipns->isEmpty())
                <div role="alert" class="alert alert-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <span>`pesapal_ipns` table is empty. Use the button below to create a new IPN.</span>
                </div>
            @else

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>IPN ID</th>
                            <th>Url</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ipns as $ipn)
                            <tr>
                                <th class="font-normal">{{ $ipn->id }}</th>
                                <th class="font-normal">{{ $ipn->ipn_id }}</th>
                                <th class="font-normal">{{ $ipn->url }}</th>
                                <th class="font-normal">{{ $ipn->type->name }}</th>
                                <th class="font-normal">{{ $ipn->status->name }}</th>
                                <th class="font-normal">{{ $ipn->updated_at->diffForHumans() }}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </x-section>
    </x-container>
</div>
