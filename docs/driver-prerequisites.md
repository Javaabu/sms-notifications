---
title: Driver Prerequisites
sidebar_position: 1.3
---

# Twilio

The Twilio driver uses the [`laravel-notification-channels/twilio`](https://github.com/laravel-notification-channels/twilio/) package. To use the Twilio driver, you must first install this package using the following command.

```bash
composer require laravel-notification-channels/twilio
```

Then, you should configure the Twilio credentials in your `.env` file.

```dotenv
TWILIO_USERNAME=XYZ # optional when using auth token
TWILIO_PASSWORD=ZYX # optional when using auth token
TWILIO_AUTH_TOKEN=ABCD # optional when using username and password
TWILIO_ACCOUNT_SID=1234 # always required
TWILIO_FROM=100000000 # optional default from
TWILIO_ALPHA_SENDER=HELLO # optional
TWILIO_DEBUG_TO=23423423423 # Set a number that call calls/messages should be routed to for debugging
TWILIO_SMS_SERVICE_SID=MG0a0aaaaaa00aa00a00a000a00000a00a # Optional but recommended
TWILIO_SHORTEN_URLS=true # optional, enable URL shortener
```

Now set the default `SMS_DRIVER` in your `.env` file to `twilio`.

```dotenv
SMS_DRIVER=twilio
```

# Dhiraagu Bulk Messaging

The Dhiraagu driver uses the [`dash8x/dhiraagu-sms-notification`](https://github.com/dash8x/dhiraagu-sms-notification) package. To use the Dhiraagu driver, you must first install this package using the following command.

```bash
composer require dash8x/dhiraagu-sms-notification
```

Then add your Dhiraagu Bulk Messaging credentials to your `config/services.php` config file.

```php
// config/services.php
...
'dhiraagu' => [
    'username' => env('DHIRAAGU_SMS_USERNAME'), // Bulk SMS gateway username, usually same as your sender name 
    'password' => env('DHIRAAGU_SMS_PASSWORD'), // Bulk SMS gateway password
    'url' => env('DHIRAAGU_SMS_URL'), // optional, use only if you need to override the default,
                                      // defaults to https://bulkmessage.dhiraagu.com.mv/partners/xmlMessage.jsp   
],
...
```

Finally, set the default `SMS_DRIVER` in your `.env` file to `dhiraagu`.

```dotenv
SMS_DRIVER=dhiraagu
```
