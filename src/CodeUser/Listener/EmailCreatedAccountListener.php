<?php

namespace CodePress\CodeUser\Listener;

use Illuminate\Support\Facades\Event;
use CodePress\CodeUser\Event\UserCreatedEvent;

/**
 * 
 *
 * @author gabriel
 */
class EmailCreatedAccountListener
{

    public function handle(UserCreatedEvent $event)
    {
        
    }
}
