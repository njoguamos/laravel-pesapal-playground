<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class OrdersList extends Component
{
    public function render(): View
    {
        return view(view: 'livewire.orders-list', data: [
            'orders' => Order::with(relations: 'ipn')->latest()->get(),
        ]);
    }
}
