<?php

namespace Modules\Setting\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'PAYPAL_MODE' => 'sandbox',
            'PAYPAL_SANDBOX_CLIENT_ID' => '',
            'PAYPAL_SANDBOX_CLIENT_SECRET' => '',
            'PAYPAL_LIVE_CLIENT_ID' => '',
            'PAYPAL_LIVE_CLIENT_SECRET' => '',
            'RECAPTCHA_SITE_KEY' => '',
            'RECAPTCHA_SECRET_KEY' => '',
        ];

        foreach ($settings  as $index => $setting) {
            Setting::create([
                'key' => $index,
                'value' => $setting,
            ]);
        }
    }
}
