<?php

use Illuminate\Support\Facades\Route;
use function Pest\Laravel\get;
use function Pest\Laravel\travelTo;

beforeEach(function () {
    Route::get('/', fn () => 'Hello, world!');
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

it('allows bypassing the redirect when a bypass token is provided', function () {
    config()->set([
        'site-redirect.enabled' => true,
        'site-redirect.location' => 'https://c6digital.io',
        'site-redirect.bypass_token' => 'bypass'
    ]);

    get('/?bypass_token=bypass')
        ->assertOk();
});

it('auto bypasses for 1 hour after initial bypass', function () {
    config()->set([
        'site-redirect.enabled' => true,
        'site-redirect.location' => 'https://c6digital.io',
        'site-redirect.bypass_token' => 'bypass'
    ]);

    get('/?bypass_token=bypass')
        ->assertOk();

    travelTo(now()->addMinutes(30));

    get('/')
        ->assertOk();

    travelTo(now()->addHours(2));

    get('/')
        ->assertRedirect('https://c6digital.io');
});
