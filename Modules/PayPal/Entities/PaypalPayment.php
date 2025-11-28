<?php

namespace Modules\PayPal\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\PayPal\Database\factories\PaypalPaymentFactory;

class PaypalPayment extends Model
{
    protected $table = 'paypal_payments';

    protected $fillable = [
        'paypal_order_id',
        'capture_id',
        'amount',
        'currency',
        'status',
    ];
}
