<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\UI\API\Transformers\UserResource;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;

class GetUserResourceCollectionTask extends ParentTask
{
    public function run(Collection $teamMembers): AnonymousResourceCollection
    {
        $users = collect();

        $teamMembers->each(function ($teamMember) use ($users) {
            $users->push($teamMember->user);
        });

        return UserResource::collection($users);
    }
}
