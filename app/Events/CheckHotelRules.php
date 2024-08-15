<?php

namespace App\Events;

use App\Models\Agency;
use App\Models\Rule;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CheckHotelRules
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public int $hotelId, public Agency $agency, public Rule $rule)
    {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
