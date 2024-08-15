<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property HasMany $conditions
 */
class Rule extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'agency_id',
        'text_for_manager',
        'is_active',
    ];


    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }

    public function ruleConditions(): HasMany
    {
        return $this->hasMany(RuleCondition::class);
    }

    public function delete()
    {
        $this->ruleConditions()->delete();
        parent::delete();
    }
}
