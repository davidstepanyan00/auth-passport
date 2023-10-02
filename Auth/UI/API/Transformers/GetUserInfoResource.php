<?php

namespace App\Containers\AppSection\Auth\UI\API\Transformers;

use App\Ship\Parents\Resources\JsonResource as ParentJsonResource;

class GetUserInfoResource extends ParentJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'username' => $this->resource->username,
            'userId' => $this->resource->id,
            'teamId' => $this->resource->team->team_id,
            'roleInTeam' => $this->resource->roleInTeam,
        ];
    }
}
