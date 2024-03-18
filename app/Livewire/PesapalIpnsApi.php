<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use JsonException;
use Livewire\Component;
use NjoguAmos\Pesapal\Pesapal;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class PesapalIpnsApi extends Component
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
     */
    public function render(): View
    {
        return view(view: 'livewire.pesapal-ipns-api', data: [
            'apiIpns' => Pesapal::getIpns()
        ]);
    }
}
