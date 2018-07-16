<?php

namespace CodePress\CodeUser\Listener;

use Illuminate\Support\Facades\Event;

/**
 * 
 *
 * @author gabriel
 */
class TestEventListener
{
    public function numero1()
    {
        echo "numero 1";
    }
    
    public function numero2()
    {
        echo "numero 2";
    }

    public function subscribe()
    {
        Event::listen('event.numero1', 'CodePress\CodeUser\Listener\TestEventListener@numero1');
        Event::listen('event.numero2', 'CodePress\CodeUser\Listener\TestEventListener@numero2');
    }

}
