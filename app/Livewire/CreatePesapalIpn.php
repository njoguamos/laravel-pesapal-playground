<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use JsonException;
use Livewire\Component;
use NjoguAmos\Pesapal\Enums\IpnType;
use NjoguAmos\Pesapal\Pesapal;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Livewire\Attributes\Validate;

class CreatePesapalIpn extends Component
{
    #[Validate('required|min:3')]
    public $url;

    public function mount(): void
    {
        $this->url = route(name: 'pesapal-ipn');
    }
    public function render(): View
    {
        return view(view: 'livewire.create-pesapal-ipn');
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
     */
    public function submit(): void
    {
        $this->validate();

        $ipn = Pesapal::createIpn(
            url: $this->url,
            ipnType: IpnType::GET,
        );

        if ($ipn) {
            session()->flash(key: 'status', value: 'IPN created successfully.');
        } else {
            session()->flash(key: 'status', value: 'We could not create an IPN.');
        }

        $this->redirect(url: route(name: 'home'));
    }
}
