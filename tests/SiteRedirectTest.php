<?php

use C6Digital\LaravelSiteRedirect\Middleware\SiteRedirect;
use Illuminate\Support\Facades\Route;
use function Pest\Laravel\get;

beforeEach(function () {
    Route::get('/', fn () => 'Hello, world!')
        ->middleware(SiteRedirect::class);
});

it('does not redirect when disabled', function () {
    get('/')
        ->assertOk();
});

it('redirects to the specified location when enabled', function () {
    config()->set([
        'site-redirect.enabled' => true,
        'site-redirect.location' => 'https://c6digital.io',
    ]);

    get('/')
        ->assertRedirect('https://c6digital.io');
});
