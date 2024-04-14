<?php

return [
    /*
     |--------------------------------------------------------------------------
     | SMS Channels
     |--------------------------------------------------------------------------
     |
     | Supported sms notification channels
     |
     */

    'sms_channels' => [
        'twilio' => \NotificationChannels\Twilio\TwilioChannel::class,
        'dhiraagu' => \Dash8x\DhiraaguSmsNotification\DhiraaguSmsNotificationChannel::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | SMS Driver
    |--------------------------------------------------------------------------
    |
    | Which SMS service provider to use. Supports: twilio, dhiraagu
    |
    */

    'sms_driver' => env('SMS_DRIVER', 'twilio'),
];
