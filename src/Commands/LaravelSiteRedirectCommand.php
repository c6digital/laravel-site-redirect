<?php

namespace C6Digital\LaravelSiteRedirect\Commands;

use Illuminate\Console\Command;

class LaravelSiteRedirectCommand extends Command
{
    public $signature = 'laravel-site-redirect';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
