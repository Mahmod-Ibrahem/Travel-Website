<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalController extends Controller
{
    //
    public function createPayment()
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $data = [
            [
                "amount" => [
                    "currency_code" => "USD",
                    "value" => "",
                    "breakdown" => [
                        "item_total" => [
                            "currency_code" => "USD",
                            "value" => "100.00",
                        ],
                    ],
                ],
                "items" => [ // Move items to the correct level
                    [
                        "name" => "Item 1",
                        "quantity" => 1,
                        "unit_amount" => [
                            "currency_code" => "USD",
                            "value" => "100.00",
                        ],
                    ],
                ],
            ],
        ];


        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => $data
        ]);


        if (isset($response['id'])) {
            // Redirect user to PayPal payment page
            return redirect($response['links'][1]['href']);
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function successPayment(Request $request)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->query('token'));
        dd($response);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            return view('payment-success');
        }

        return view('payment-failed');
    }

    public function cancelPayment()
    {
        return view('payment-cancel');
    }
}
