<?php


use Concept7\Health\Checks\DuplicateIdsCheck;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Result;
use Spatie\Health\Enums\Status;
use Statamic\Facades\Entry;

beforeEach(function () {
    $this->makeUser();

    $this->makeCollection('articles', 'Articles');
});

afterEach(function () {
    $this->clearEnrties('articles');
});

it('has no duplicates in stache', function () {
    $entry = $this->makeEntry('articles');
    $entry = $this->makeEntry('articles');

    $result = DuplicateIdsCheck::new()->run();

    expect($result)
        ->status->toBe(Status::ok());
});

it('has duplicates in stache', function () {
    $entry = $this->makeEntry('articles');
    $entry1 = $this->makeEntry('articles');

    $entry1
        ->set('id', $entry->id)
        ->save();

    $result = DuplicateIdsCheck::new()
        ->run();

    expect($result)
        ->status->toBe(Status::failed());
});
