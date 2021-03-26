<?php

namespace App\Listeners;

use App\Events\PriceIsChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PriceListener
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
     * @param  PriceIsChanged  $event
     * @return void
     */
    public function handle(PriceIsChanged $event)
    {
    }
}
