<?php

namespace C6Digital\LaravelSiteRedirect\Middleware;

use Closure;
use Illuminate\Http\Request;

class SiteRedirect
{
    public function handle(Request $request, Closure $next)
    {
        // We don't want to require a bypass token for Livewire requests.
        if ($request->hasHeader('X-Livewire')) {
            return $next($request);
        }

        $bypassToken = config('site-redirect.bypass_token');

        if ($bypassToken !== null && session('site-redirect:bypassed') && session('site-redirect:bypassed') >= now()->getTimestamp()) {
            return $next($request);
        }

        if ($bypassToken !== null && $request->query('bypass_token') !== null && $request->query('bypass_token') === $bypassToken) {
            session()->put('site-redirect:bypassed', now()->addHour()->getTimestamp());

            return $next($request);
        }

        if (config('site-redirect.enabled') && config('site-redirect.location')) {
            return redirect()->to(config('site-redirect.location'));
        }

        return $next($request);
    }
}
