<?php

namespace App\Models;

use Database\Factories\RestaurantFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    /** @use HasFactory<RestaurantFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'founded_at',
        'employee_numbers',
        'founder_id',
        'phone_number'
    ];

    protected $casts = [
        'founded_at' => 'date',
        'is_active' => 'boolean'
    ];

    public function founder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'founder_id', 'id');
    }

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }
}
