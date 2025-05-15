<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class RestaurantCreatedEvent
{
    use Dispatchable;

    public function __construct(private readonly int $id)
    {
    }
}
