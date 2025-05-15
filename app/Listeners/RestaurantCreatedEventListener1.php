<?php

namespace App\Listeners;

use App\Events\RestaurantCreatedEvent;

class RestaurantCreatedEventListener1
{
    public function __construct()
    {
    }

    public function handle(RestaurantCreatedEvent $event): void
    {
        dump('salom 1');
    }
}
