<?php

namespace App\Http\Controllers;

use App\Models\Order;
use NjoguAmos\Pesapal\DTOs\PesapalAddressData;
use NjoguAmos\Pesapal\DTOs\PesapalOrderData;
use NjoguAmos\Pesapal\Enums\ISOCountryCode;
use NjoguAmos\Pesapal\Enums\RedirectMode;
use NjoguAmos\Pesapal\Pesapal;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class SubmitOrderController extends Controller
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws \JsonException
     */
    public function __invoke(Order $order)
    {
        $order = $order->load('ipn');

        $orderData = new PesapalOrderData(
            id: $order->id,
            currency: $order->currency,
            amount: $order->amount,
            description: $order->description,
            callbackUrl: $order->callback_url,
            notificationId: $order->ipn->ipn_id,
            cancellationUrl: $order->cancellation_url,
            redirectMode: RedirectMode::PARENT_WINDOW,
        );

        // All fields are optional except either phoneNumber or emailAddress
        $billingAddress = new PesapalAddressData(
            phoneNumber: $order->phone_number,
            emailAddress: $order->email_address,
            countryCode: ISOCountryCode::KE,
            firstName: $order->first_name,
            line2: "Gil House, Nairobi, Tom Mboya Street",
        );

        $pesapalOrder = Pesapal::createOrder(
            orderData: $orderData,
            billingAddress: $billingAddress,
        );

        if (is_array($pesapalOrder)) {

            $order->update([
                'order_tracking_id' => $pesapalOrder['order_tracking_id'],
                'redirect_url'      => $pesapalOrder['redirect_url'],
            ]);

            session()->flash('status', 'Order submitted successfully');

            return to_route('order.show', $order);
        }

        session()->flash('status', 'There was an error creating the order. Please try again.');

        return to_route('order.show', $order);
    }
}
