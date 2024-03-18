<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use NjoguAmos\Pesapal\Models\PesapalIpn;

class PesapalIpns extends Component
{
    public function render(): View
    {
        return view(view: 'livewire.pesapal-ipns', data: [
            'ipns' => PesapalIpn::latest()->get(),
        ]);
    }
}
