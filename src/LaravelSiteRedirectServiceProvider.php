<?php

namespace C6Digital\LaravelSiteRedirect;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use C6Digital\LaravelSiteRedirect\Commands\LaravelSiteRedirectCommand;

class LaravelSiteRedirectServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-site-redirect')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-site-redirect_table')
            ->hasCommand(LaravelSiteRedirectCommand::class);
    }
}
