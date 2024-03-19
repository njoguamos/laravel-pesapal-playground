<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use NjoguAmos\Pesapal\Pesapal;

class PaymentCallback extends Controller
{
    public function __invoke(Request $request)
    {
        $order = Order::firstWhere('order_tracking_id', '=', $request->get('OrderTrackingId'));


        if(! $order) {
            session()->flash('status', 'The order could not be found in the in database');

            return redirect()->route('home');
        }

        $transaction = Pesapal::getTransactionStatus(
            orderTrackingId: $order->order_tracking_id,
        );

        $order->update([
            'transaction_payload' => $transaction
        ]);

        session()->flash('status', 'The order has been updated successfully');

        return redirect()->route('order.show', $order);

    }
}
