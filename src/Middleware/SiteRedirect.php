<?php

namespace C6Digital\LaravelSiteRedirect\Middleware;

use Closure;
use Illuminate\Http\Request;

class SiteRedirect
{
    public function handle(Request $request, Closure $next)
    {
        if (config('site-redirect.enabled') && config('site-redirect.location')) {
            return redirect()->to(config('site-redirect.location'));
        }

        return $next($request);
    }
}
