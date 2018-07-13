<?php

namespace CodePress\CodeUser\Facade;

use illuminate\Support\Facades\Facade;

/**
 * 
 *
 * @author gabriel
 */
class Route extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'codepress_user_route';
    }
}
