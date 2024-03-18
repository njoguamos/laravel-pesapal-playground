<div wire:poll.60s id="tokens">
    <x-container>
        <x-section title="Pesapal Access Tokens">
            @if($tokens->isEmpty())
                <div role="alert" class="alert alert-warning">
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                  <span>`pesapal_tokens` table is empty.  </span>
                    <div>
                        <button class="btn btn-sm btn-primary" wire:click="runPesapalAuth">Run pesapal:auth command</button>
                    </div>
                </div>
            @else

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Encrypted Token</th>
                            <th>Created</th>
                            <th>Expires</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tokens as $token)
                            <tr>
                                <th class="font-normal">{{ $token->id }}</th>
                                <th class="font-normal">{{ str($token->access_token)->limit(50)->toString() }}</th>
                                <th class="font-normal">{{ $token->created_at->diffForHumans() }}</th>
                                <th class="font-normal">{{ $token->expires_at->diffForHumans() }}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

           @endif

            <div class="mockup-code mt-6">
                @foreach(explode(PHP_EOL, $schedule) as $cmd)
                    @if(!empty($cmd))
                        <pre data-prefix=">" class="text-success"><code>{{ $cmd }}</code></pre>
                    @endif
                @endforeach
            </div>
        </x-section>
    </x-container>
</div>
