<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'restaurant_id',
        'is_active'
    ];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function phones(): HasMany
    {
        return $this->hasMany(BranchPhoneNumber::class);
    }

    public function branchWorkTime(): HasMany
    {
        return $this->hasMany(BranchWorkTime::class);
    }
}
