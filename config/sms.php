<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default SMS Driver
    |--------------------------------------------------------------------------
    |
    | Which SMS service provider to use. Supports: twilio, dhiraagu
    |
    */

    'default' => env('SMS_DRIVER', 'twilio'),

    /*
     |--------------------------------------------------------------------------
     | SMS Channels
     |--------------------------------------------------------------------------
     |
     | Supported sms notification channels
     |
     */

    'channels' => [
        'twilio' => \NotificationChannels\Twilio\TwilioChannel::class,
        'dhiraagu' => \Dash8x\DhiraaguSmsNotification\DhiraaguSmsNotificationChannel::class,
    ],
];
