<?php

namespace Concept7\Health;

use Concept7\Health\Checks\GitLockCheck;
use Spatie\Health\Facades\Health;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HealthServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('statamic-health')
            ->hasConfigFile();
    }

    public function packageBooted()
    {
        Health::checks([
            GitLockCheck::new(),
        ]);
    }
}
