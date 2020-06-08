<?php

namespace App\Listeners;

use App\Events\OrderPrepared;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\shipping;

class ShipProduct
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPrepared  $event
     * @return void
     */
    public function handle(OrderPrepared $event)
    {
        shipping::create([
            'order_product_id' => 
        ]);
    }
}
