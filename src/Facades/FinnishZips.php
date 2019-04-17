<?php

namespace Spacha\FinnishZips\Facades;

use Illuminate\Support\Facades\Facade;

class FinnishZips extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'finnish-zips';
    }
}
