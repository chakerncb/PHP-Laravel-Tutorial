<?php

namespace App\Listeners;

use App\Events\OrderIvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ViewsListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderIvent $event): void
    {
        //
        $this -> updateviews($event -> order);
    }

    function updateViews($order){
           $order -> views += 1;	
            $order -> save();
        
}

}
