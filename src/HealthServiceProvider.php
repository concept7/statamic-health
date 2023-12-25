<?php

namespace Concept7\Health;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Concept7\Health\Commands\HealthCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_statamic-health_table')
            ->hasCommand(HealthCommand::class);
    }
}
