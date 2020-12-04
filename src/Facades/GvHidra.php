<?php

namespace Gva\GvHidra\Facades;

use Illuminate\Support\Facades\Facade;

class GvHidra extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'gvhidra';
    }
}
