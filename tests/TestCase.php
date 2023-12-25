<?php

namespace Concept7\Health\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as Orchestra;
use Statamic\Facades\Blueprint;
use Statamic\Facades\Collection;
use Statamic\Facades\Entry;
use Statamic\Facades\Stache;
use Statamic\Facades\User;
use Statamic\Statamic;

class TestCase extends Orchestra
{
    use WithFaker;

    // protected function setUp(): void
    // {
    //     parent::setUp();
    // }

    // protected function tearDown(): void
    // {
    //     Stache::clear();

    //     parent::tearDown();
    // }

    protected function getPackageProviders($app)
    {
        return [
            \Statamic\Providers\StatamicServiceProvider::class,
            \Spatie\Health\HealthServiceProvider::class,
            \Concept7\Health\HealthServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Statamic' => Statamic::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
    }

    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $configs = [
            'assets', 'cp', 'forms', 'routes', 'static_caching',
            'sites', 'stache', 'system', 'users',
        ];

        foreach ($configs as $config) {
            $app['config']->set("statamic.$config", require(__DIR__."/../vendor/statamic/cms/config/{$config}.php"));
        }

        $app['config']->set('statamic.users.repository', 'file');

        $app['config']->set('statamic.stache.stores.collections.directory', __DIR__.'/tmp/content/collections');
        $app['config']->set('statamic.stache.stores.entries.directory', __DIR__.'/tmp/content/collections');

        Statamic::booted(function () {
            Blueprint::setDirectory(__DIR__.'/tmp/resources/blueprints');
        });
    }

    protected function makeUser()
    {
        return User::make()
            ->id((new \Statamic\Stache\Stache())->generateId())
            ->email($this->faker->email)
            ->save();
    }

    protected function makeCollection(string $handle, string $name)
    {
        Collection::make($handle)
            ->title($name)
            ->pastDateBehavior('public')
            ->futureDateBehavior('private')
            ->save();

        return Collection::findByHandle($handle);
    }

    protected function makeEntry(string $collectionHandle)
    {
        $slug = $this->faker->slug;

        Entry::make()
            ->collection($collectionHandle)
            // ->blueprint('default')
            ->locale('default')
            ->published(true)
            ->slug($slug)
            ->data([
                'likes' => [],
            ])
            ->set('updated_by', User::all()->first()->id())
            ->set('updated_at', now()->timestamp)
            ->save();

        return Entry::query()
            ->where('collection', $collectionHandle)
            ->where('slug', $slug)
            ->first();
    }

    protected function clearEnrties(string $collectionHandle)
    {
        Entry::query()
            ->where('collection', $collectionHandle)
            ->get()
            ->each(fn ($entry) => $entry->delete());
    }
}
