<?php

namespace App\Containers\AppSection\Auth\Models;

use App\Ship\Parents\Models\Model as ParentModel;

/**
 * @property mixed $id
 * @property mixed $secret
 */
class OauthClient extends ParentModel
{
    protected $table = 'oauth_clients';
}
