---
title: Installation & Setup
sidebar_position: 1.2
---

You can install the package via composer:

```bash
composer require javaabu/sms-notifications
```

# Publishing the config file

Publishing the config file is optional:

```bash
php artisan vendor:publish --provider="Javaabu\SmsNotifications\SmsNotificationsServiceProvider" --tag="sms-notifications-config"
```

This is the default content of the config file:

```php
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

```
