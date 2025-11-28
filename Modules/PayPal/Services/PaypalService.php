<?php

namespace Modules\PayPal\Services;

use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalService
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider = PayPal::setProvider();
        $this->provider->setApiCredentials(config('paypal'));
        $this->provider->getAccessToken();
    }

    public function createOrder(array $data)
    {
        return $this->provider->createOrder($data);
    }

    public function capturePayment(string $token)
    {
        return $this->provider->capturePaymentOrder($token);
    }
}
