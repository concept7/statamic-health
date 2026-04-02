<?php

namespace Concept7\Health\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class UnconfiguredIndexesCheck extends Check
{
    public function run(): Result
    {
        $result = Result::make();

        return $result->ok();
    }
}
