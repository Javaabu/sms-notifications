<?php

namespace Javaabu\SmsNotifications\Notifications;

interface SmsNotification
{
    /**
     * Get the sms driver
     *
     * @return string
     */
    public function getSmsDriver(): string;

    /**
     * Get the sms channel
     *
     * @return string
     */
    public function getSmsChannel(): string;

    /**
     * Get the dhiraagu representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    public function toDhiraagu($notifiable);

    /**
     * Get the twilio representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    public function toTwilio($notifiable);

    /**
     * Get the sms representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    public function toSms($notifiable): string;
}
