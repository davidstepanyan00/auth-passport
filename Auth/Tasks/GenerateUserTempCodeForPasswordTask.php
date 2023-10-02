<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Ship\Parents\Support\Str;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GenerateUserTempCodeForPasswordTask extends ParentTask
{
    public const PARTS_LIMIT = 5;
    public const PARTS_PREVIOUS_INDEX = 4;
    public const CODE_SEPARATOR = '-';

    public function run(): string
    {
        $code = '';

        for ($i=0; $i < self::PARTS_LIMIT; $i++) {
            $code .= Str::random(5);

            if ($i !== self::PARTS_PREVIOUS_INDEX) {
                $code .= self::CODE_SEPARATOR;
            }
        }

        return $code;
    }
}
