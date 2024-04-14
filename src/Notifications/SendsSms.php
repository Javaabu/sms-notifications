<?php
/**
 * Methods that sms notifications should have
 */

namespace Javaabu\SmsNotifications\Notifications;

trait SendsSms
{

    /**
     * Get the sms driver
     *
     * @return string
     */
    public function getSmsDriver(): string
    {
        return config('sms.default');
    }

    /**
     * Get the sms channel
     *
     * @return string
     */
    public function getSmsChannel(): string
    {
        $sms_driver = $this->getSmsDriver();
        return config('sms.channels.'.$sms_driver);
    }

    /**
     * Get the twilio representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    public function toTwilio($notifiable)
    {
        /** @var $this SmsNotification */
        return $this->toSms($notifiable);
    }

    /**
     * Get the dhiraagu representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    public function toDhiraagu($notifiable)
    {
        /** @var $this SmsNotification */
        return $this->toSms($notifiable);
    }
}
