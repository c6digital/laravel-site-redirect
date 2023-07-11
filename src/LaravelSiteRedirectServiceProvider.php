<?php

namespace C6Digital\LaravelSiteRedirect;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelSiteRedirectServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-site-redirect')
            ->hasConfigFile();
    }
}
