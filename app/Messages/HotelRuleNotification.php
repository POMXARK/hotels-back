<?php

namespace App\Messages;

use App\Models\Agency;
use App\Models\Rule;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class HotelRuleNotification extends Notification
{
    public function __construct(private Agency $agency, private Rule $rule)
    {
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $mailMessage = (new MailMessage)
            ->subject('Уведомление о срабатывании правила')
            ->line('Текст для менеджера: '. $this->rule->text_for_manager)
            ->line('Агентство: '. $this->agency->name);

        $this->logMailMessage($mailMessage);
    }

    protected function logMailMessage($mailMessage)
    {
        Log::info('Отправлено уведомление по почте', [
            'data' => $mailMessage->data(),
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            'agency_name' => $this->agency->name,
            'rule_text' => $this->rule->text_for_manager,
        ];
    }
}
