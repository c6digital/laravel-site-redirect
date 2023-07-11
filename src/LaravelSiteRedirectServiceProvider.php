<?php

namespace C6Digital\LaravelSiteRedirect;

use C6Digital\LaravelSiteRedirect\Middleware\SiteRedirect;
use Spatie\LaravelPackageTools\Package;
use Illuminate\Contracts\Http\Kernel;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelSiteRedirectServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-site-redirect')
            ->hasConfigFile();
    }

    public function packageBooted()
    {
        $this->app->get(Kernel::class)->pushMiddleware(SiteRedirect::class);
    }
}
