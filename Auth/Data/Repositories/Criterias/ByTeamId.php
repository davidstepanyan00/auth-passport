<?php

namespace App\Containers\AppSection\Auth\Data\Repositories\Criterias;

use App\Ship\Core\Abstracts\Repositories\Contracts\CriteriaInterface;
use App\Ship\Core\Abstracts\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class ByTeamId implements CriteriaInterface
{
    private string $field = 'team_id';
    private string $relation = 'teams';
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereHas($this->relation, function (Builder $query) {
            $query->where($this->field, $this->value);
        });
    }
}
