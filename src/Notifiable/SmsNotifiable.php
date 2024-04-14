<?php
/**
 * The contract for sms notifiables
 */

namespace Javaabu\SmsNotifications\Notifiable;

interface SmsNotifiable
{
    /**
     * The number to send SMSs to
     */
    public function routeNotificationForSms(): string|array|null;

    /**
     * The number to send SMSs to
     */
    public function routeNotificationForTwilio();

    /**
     * The number to send SMSs to
     */
    public function routeNotificationForDhiraagu();

}
