<?php

namespace App\Messages;

use App\Models\Agency;
use App\Models\Rule;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HotelRuleNotification extends Notification
{
    private $agency;
    private $rule;

    public function __construct(Agency $agency, Rule $rule)
    {
        $this->agency = $agency;
        $this->rule = $rule;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Уведомление о срабатывании правила')
            ->line('Текст для менеджера: '. $this->rule->text)
            ->line('Агентство: '. $this->agency->name);
    }

    public function toArray($notifiable)
    {
        return [
            'agency_name' => $this->agency->name,
            'rule_text' => $this->rule->text,
        ];
    }
}
