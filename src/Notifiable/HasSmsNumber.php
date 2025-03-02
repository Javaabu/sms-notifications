<?php

/**
 * Methods that sms notifiables should have
 */

namespace Javaabu\SmsNotifications\Notifiable;

trait HasSmsNumber
{
    /**
     * The number to send SMSs to
     */
    public function routeNotificationForTwilio()
    {
        /** @var $this SmsNotifiable */
        return $this->routeNotificationForSms();
    }

    /**
     * The number to send SMSs to
     */
    public function routeNotificationForDhiraagu()
    {
        /** @var $this SmsNotifiable */
        return $this->routeNotificationForSms();
    }
}
