<?php

namespace C6Digital\LaravelSiteRedirect\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \C6Digital\LaravelSiteRedirect\LaravelSiteRedirect
 */
class LaravelSiteRedirect extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \C6Digital\LaravelSiteRedirect\LaravelSiteRedirect::class;
    }
}
