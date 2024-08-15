<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Notification extends Model
{
    protected $fillable = [
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',
    ];

    protected $casts = [
        'id' => 'string',
        'data' => 'array',
    ];

    protected $dates = [
        'read_at',
        'created_at',
        'updated_at',
    ];

    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }

    public function markAsRead(): void
    {
        $this->read_at = now();
        $this->save();
    }

    public function markAsUnread(): void
    {
        $this->read_at = null;
        $this->save();
    }

    public function isRead(): bool
    {
        return $this->read_at!== null;
    }

    public function isUnread(): bool
    {
        return $this->read_at === null;
    }
}
