<?php

namespace C6Digital\LaravelSiteRedirect\Middleware;

use Closure;
use Illuminate\Http\Request;

class SiteRedirect
{
    public function handle(Request $request, Closure $next)
    {
        $bypassToken = config('site-redirect.bypass_token') !== null;

        if ($bypassToken !== null && session('site-redirect:bypassed') && session('site-redirect:bypassed') >= now()->getTimestamp()) {
            return $next($request);
        }

        if ($bypassToken !== null && $request->query('bypass_token') !== null && $request->query('bypass_token') === config('site-redirect.bypass_token')) {
            session()->put('site-redirect:bypassed', now()->addHour()->getTimestamp());

            return $next($request);
        }

        if (config('site-redirect.enabled') && config('site-redirect.location')) {
            return redirect()->to(config('site-redirect.location'));
        }

        return $next($request);
    }
}
