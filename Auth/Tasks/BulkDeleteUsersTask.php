<?php

namespace App\Containers\AppSection\Auth\Tasks;

use App\Containers\AppSection\Auth\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\AppSection\Auth\Exceptions\FailedBulkDeleteUsersException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Throwable;

class BulkDeleteUsersTask extends ParentTask
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @throws FailedBulkDeleteUsersException
     */
    public function run(array $ids): void
    {
        try {
            $this->userRepository
                ->byIds($ids)
                ->forceDeleteByCriteria();
        } catch (Throwable $e) {
            throw new FailedBulkDeleteUsersException($e->getMessage());
        }
    }
}
