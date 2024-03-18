<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Livewire\Component;

class PesapalConfig extends Component
{
    public function render(): View
    {
        return view(view: 'livewire.pesapal-config', data: [
            'pesapalMode'    => config(key: 'pesapal.pesapal_live'),
            'consumerKey'    => Str::mask(config(key: 'pesapal.consumer_key'), "*", 4, '24'),
            'consumerSecret' => Str::mask(config(key: 'pesapal.consumer_secret'), "*", 2, '20'),
            'tablesMigrated' => Schema::hasTable('pesapal_tokens') && Schema::hasTable('pesapal_ipns')
        ]);
    }
}
