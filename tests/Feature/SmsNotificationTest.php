<?php

namespace Javaabu\SmsNotifications\Tests\Feature;

use Dash8x\DhiraaguSmsNotification\DhiraaguSmsNotificationChannel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification as BaseNotification;
use Illuminate\Support\Facades\Notification;
use Javaabu\SmsNotifications\Notifiable\HasSmsNumber;
use Javaabu\SmsNotifications\Notifiable\SmsNotifiable;
use Javaabu\SmsNotifications\Notifications\SendsSms;
use Javaabu\SmsNotifications\Notifications\SmsNotification;
use Javaabu\SmsNotifications\Tests\TestCase;
use Illuminate\Foundation\Auth\User as Authenticatable;
use NotificationChannels\Twilio\TwilioChannel;

class User extends Authenticatable implements SmsNotifiable
{
    use Notifiable;
    use HasSmsNumber;


    public function routeNotificationForSms(): string|array|null
    {
        return '+9607528222';
    }
}

class TestNotification extends BaseNotification implements SmsNotification
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

class SmsNotificationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Notification::fake();

    }

    /** @test */
    public function it_can_send_an_sms_notification(): void
    {
        $user = new User();

        $notification = new TestNotification();

        $user->notify($notification);

        Notification::assertSentTo([$user], TestNotification::class);
    }

    /** @test */
    public function it_can_send_an_sms_via_twilio(): void
    {
        $this->app['config']->set('sms.default', 'twilio');

        $user = new User();

        $notification = new TestNotification();

        $user->notify($notification);

        Notification::assertSentTo($user, function (TestNotification $notification, array $channels) {
            return in_array(TwilioChannel::class, $channels) && count($channels) == 1;
        });
    }

    /** @test */
    public function it_can_send_an_sms_via_dhiraagu(): void
    {
        $this->app['config']->set('sms.default', 'dhiraagu');

        $user = new User();

        $notification = new TestNotification();

        $user->notify($notification);

        Notification::assertSentTo($user, function (TestNotification $notification, array $channels) {
            return in_array(DhiraaguSmsNotificationChannel::class, $channels) && count($channels) == 1;
        });
    }
}
