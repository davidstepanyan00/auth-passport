<?php

namespace App\Containers\AppSection\Auth\Tests;

use App\Ship\Tests\TestCase as ParentTestCase;

abstract class TestCase extends ParentTestCase
{
    public function getUsersTableName(): string
    {
        return 'users';
    }
}
