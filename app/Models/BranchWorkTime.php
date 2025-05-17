<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchWorkTime extends Model
{
    protected $fillable = [
        'branch_id',
        'day',
        'open_time',
        'close_time',
        'day_off'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
