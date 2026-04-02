<?php

use Concept7\Health\Checks\DuplicateIdsCheck;
use Spatie\Health\Enums\Status;

beforeEach(function () {
    $this->makeUser();

    $this->makeCollection('articles', 'Articles');
});

afterEach(function () {
    $this->clearEntries('articles');
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
