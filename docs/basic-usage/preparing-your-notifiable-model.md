---
title: Preparing your notifiable model
sidebar_position: 1
---

To use the SMS Notification Channel with a notifiable model, the model must implement the following interface and trait.

```php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Javaabu\SmsNotifications\Notifiable\HasSmsNumber;
use Javaabu\SmsNotifications\Notifiable\SmsNotifiable;

class User extends Authenticatable implements SmsNotifiable
{
    use Notifiable;
    use HasSmsNumber;

    public function routeNotificationForSms(): string|array|null
    {
        return $this->mobile_number;
    }
}
```

The notifiable model must implement the `routeNotificationForSms()` method which should return the mobile number associated with the notifiable.
