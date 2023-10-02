<?php

namespace App\Containers\AppSection\Auth\UI\API\Transformers;

use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Resources\JsonResource as ParentJsonResource;

/**
 * @property string $access_token
 * @property string $refresh_token
 * @property string $token_type
 * @property string $expires_in
 * @property User $user
 */
class CredentialResource extends ParentJsonResource
{
    public function toArray($request): array
    {
        return [
            'access_token' => $this->resource->access_token,
            'refresh_token' => $this->resource->refresh_token,
            'token_type'   => $this->resource->token_type,
            'expires_in'   => $this->resource->expires_in,
            'user' => new UserResource($this->resource->user),
        ];
    }
}
