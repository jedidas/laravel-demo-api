<?php

namespace App\Listeners;

use App\Events\LikesStatusChangeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LikesStatusListener
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
     * @param  LikesStatusChangeEvent  $event
     * @return void
     */
    public function handle(LikesStatusChangeEvent $event)
    {
        //
    }
}
