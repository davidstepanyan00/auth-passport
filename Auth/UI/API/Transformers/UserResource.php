<?php

namespace App\Containers\AppSection\Auth\UI\API\Transformers;

use App\Ship\Parents\Resources\JsonResource as ParentJsonResource;

/**
 * @property int $id
 * @property string $username
 */
class UserResource extends ParentJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'username' => $this->resource->username,
            'displayName' => $this->resource->display_name,
            'properties' => $this->resource?->properties ?? null
        ];
    }
}
