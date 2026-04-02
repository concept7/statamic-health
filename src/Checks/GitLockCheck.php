<?php

namespace Concept7\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class GitLockCheck extends Check
{
    public function run(): Result
    {
        $result = Result::make();

        $lockFile = base_path('.git/index.lock');

        if (file_exists($lockFile)) {
            return $result->failed('Git Lock file detected. Fix this issue to enable sync.');
        }

        return $result->ok();
    }
}
