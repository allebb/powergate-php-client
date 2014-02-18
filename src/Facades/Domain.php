<?php

namespace Ballen\PowergateClient\Facades;

use Illuminate\Support\Facades\Facade;

class Domain extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'domain';
    }

}
