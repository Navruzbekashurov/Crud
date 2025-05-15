<?php

namespace App\Listeners;

use App\Events\RestaurantCreatedEvent;
use Carbon\Carbon;

class RestaurantCreatedEventListener
{
    public function __construct()
    {
    }

    public function handle(RestaurantCreatedEvent $event): void
    {
        dump(Carbon::now());
        dump('salom 2');
    }
}
