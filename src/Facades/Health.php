<?php

namespace Concept7\Health\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Concept7\Health\Health
 */
class Health extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Concept7\Health\Health::class;
    }
}
