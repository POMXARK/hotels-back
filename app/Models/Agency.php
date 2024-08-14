<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Agency extends Model
{
    use Notifiable;
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function rules(): HasMany
    {
        return $this->hasMany(Rule::class);
    }

    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class);
    }
}
