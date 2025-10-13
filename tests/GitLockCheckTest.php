<?php

use Concept7\Health\Checks\GitLockCheck;
use Spatie\Health\Enums\Status;

it('checks if the lock file doesnt exist', function () {
    $result = GitLockCheck::new()->run();

    expect($result)
        ->status->toBe(Status::ok());
});

it('checks if the lock file exists', function () {

    $path = base_path('.git/index.lock');
    $file = fopen($path, 'w');

    fwrite($file, '');
    fclose($file);

    $result = GitLockCheck::new()->run();

    expect($result)
        ->status->toBe(Status::failed());

    unlink($path);
});
