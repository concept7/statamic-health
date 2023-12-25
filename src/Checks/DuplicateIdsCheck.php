<?php

namespace Concept7\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Statamic\Facades\Stache;
use Illuminate\Support\Str;

class DuplicateIdsCheck extends Check
{
    public function run(): Result
    {
        $stores = Stache::stores()->flatMap(function ($store) {
            return $store instanceof AggregateStore ? $store->discoverStores() : [$store];
        });

        $result = Result::make();

        $stores->each->clearCachedPaths();

        $duplicates = Stache::duplicates()->clear()->find()->all();

        if ($duplicates->isNotEmpty()) {
            $fails = [];

            $duplicates = $duplicates->flatMap(function ($duplicates) {
                return $duplicates;
            });

            foreach ($duplicates as $id => $paths) {
                $fails[] = "[✗] Duplicate ID $id";

                $fails = array_merge($fails, collect($paths)->map(function ($path) {
                    return '* ' . Str::after($path, base_path().'/');
                })->all());
            }

            $result->meta($fails);

            return $result->failed('Duplicate IDs detected. Check meta for more information.');
        }

        return $result->ok();
    }
}
