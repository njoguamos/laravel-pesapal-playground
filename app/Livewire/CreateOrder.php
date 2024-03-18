<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use NjoguAmos\Pesapal\Enums\ISOCurrencyCode;
use NjoguAmos\Pesapal\Enums\RedirectMode;
use NjoguAmos\Pesapal\Models\PesapalIpn;

class CreateOrder extends Component
{
    #[Validate('required|max:100')]
    public $description;

    #[Validate('required|decimal:0,2')]
    public $amount;

    #[Validate('required')]
    public $currency;

    #[Validate('required')]
    public $callbackUrl;

    #[Validate('required')]
    public $notificationId;

    #[Validate('required')]
    public $cancellationUrl;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $phone;

    #[Validate('required')]
    public $email;

    public function mount(): void
    {
        $this->description = 'Payment for goods and services provided by Njogu Amos.';
        $this->amount = 5.01;
        $this->notificationId = '';
        $this->currency = ISOCurrencyCode::KES->value;
        $this->callbackUrl = route('pesapal-callback');
        $this->cancellationUrl = route('cancellation-callback');
        $this->name = 'Njogu Amos';
        $this->email = 'njoguamos@gmail.com';
        $this->phone = '0700326009';
    }

    public function render(): View
    {
        return view(view: 'livewire.create-order', data: [
            'ipns' => PesapalIpn::all(),
        ]);
    }

    public function submit()
    {
        $this->validate();

        Order::create([
            'description'      => $this->description,
            'amount'           => $this->amount,
            'currency'         => ISOCurrencyCode::from($this->currency),
            'callback_url'     => $this->callbackUrl,
            'ipn_id'           => PesapalIpn::firstWhere('ipn_id', '=', $this->notificationId)?->id,
            'cancellation_url' => $this->cancellationUrl,
            'first_name'       => $this->name,
            'phone_number'     => $this->phone,
            'email_address'    => $this->email,
            'redirect_mode'    => RedirectMode::PARENT_WINDOW->name,
        ]);

        session()->flash(key: 'status', value: 'IOrderPN created successfully.');

        $this->redirect(url: route(name: 'home').'#orders');
    }
}
