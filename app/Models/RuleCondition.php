<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RuleCondition extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'rule_id',
        'sql_query_id',
    ];

    public function rule(): BelongsTo
    {
        return $this->belongsTo(Rule::class);
    }

    public function sqlQuery(): BelongsTo
    {
        return $this->belongsTo(SqlQuery::class);
    }
}
