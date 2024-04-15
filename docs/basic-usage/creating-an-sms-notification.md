---
title: Creating an SMS Notification
sidebar_position: 2
---

SMS Notifications must implement the following interface and trait.

```php
namespace App\Notifications;

use Illuminate\Notifications\Notification
use Javaabu\SmsNotifications\Notifications\SendsSms;
use Javaabu\SmsNotifications\Notifications\SmsNotification;

class TestNotification extends Notification implements SmsNotification
{
    use SendsSms;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            $this->getSmsChannel()
        ];
    }

    public function toSms($notifiable): string
    {
        return 'Test message';
    }
}
```

The notification model must implement the `toSms($notifiable)` method which should return the sms message that needs to be sent.

To use the SMS channel, include the `$this->getSmsChannel()` in your returned channels from the `via($notifiable)` method.

The following methods will be available on SMS Notifications:

```php
$this->getSmsDriver(); // returns the current SMS driver being used
$this->getSmsChannel(); // returns the current SMS channel being used
```

# Overriding the default SMS Driver

If you want to override the Default SMS driver on a specific Notification, you can override the `getSmsDriver()` method.

```php
    /**
     * Get the sms driver
     *
     * @return string
     */
    public function getSmsDriver(): string
    {
        return 'dhiraagu';
    }
```

