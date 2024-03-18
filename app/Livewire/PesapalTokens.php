<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use NjoguAmos\Pesapal\Models\PesapalToken;

class PesapalTokens extends Component
{
    public function render(): View
    {
        return view(view: 'livewire.pesapal-tokens', data: [
            'tokens'   => PesapalToken::latest()->get(),
            'schedule' => $this->getScheduled()
        ]);
    }

    protected function getScheduled(): string
    {
        Artisan::call('schedule:list');

        return Artisan::output();
    }
}
