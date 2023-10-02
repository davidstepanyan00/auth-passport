<?php

namespace App\Containers\AppSection\Auth\Data\Seeders;

use App\Ship\Parents\Models\RoleModel;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class RoleSeeder extends ParentSeeder
{
    public function run()
    {
        $roles = [
            [
                'id' => Str::uuid(),
                'name' => RoleModel::ROLE_ADMIN,
                'guard_name' => 'api',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => RoleModel::ROLE_MODERATOR,
                'guard_name' => 'api',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => RoleModel::ROLE_USER,
                'guard_name' => 'api',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        RoleModel::query()->insert($roles);
    }
}
