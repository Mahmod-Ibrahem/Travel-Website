<?php

namespace Modules\PayPal\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Setting\Entities\Setting;

class LoadPayPalConfig
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $mode = Setting::where('key', 'paypal_mode')->first()->value;
        $sandboxClientId = Setting::where('key', 'PAYPAL_SANDBOX_CLIENT_ID')->first()->value;
        $sandboxSecret   = Setting::where('key', 'PAYPAL_SANDBOX_CLIENT_SECRET')->first()->value;
        $liveClientId    = Setting::where('key', 'PAYPAL_LIVE_CLIENT_ID')->first()->value;
        $liveSecret      = Setting::where('key', 'PAYPAL_LIVE_CLIENT_SECRET')->first()->value;
        if ($mode == 'sandbox') {
            config([
                'paypal.mode' => 'sandbox',
                'paypal.sandbox.client_id' => $sandboxClientId ?: config('paypal.sandbox.client_id'),
                'paypal.sandbox.client_secret' => $sandboxSecret ?: config('paypal.sandbox.client_secret'),
            ]);
        } else {
            config([
                'paypal.mode' => 'live',
                'paypal.live.client_id' => $liveClientId ?: config('paypal.live.client_id'),
                'paypal.live.client_secret' => $liveSecret ?: config('paypal.live.client_secret'),
            ]);
        }
        return $next($request);
    }
}
