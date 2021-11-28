<?php

namespace App\Domain\User\Service;

use App\Domain\User\Data\UserListerResult;
use App\Domain\User\Repository\UserListerRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class UserLister
{
    /**
     * @var UserListerRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserListerRepository $repository The repository
     */
    public function __construct(UserListerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Read a user by the given user id.
     *
     * @param int $userId The user id
     *
     * @throws ValidationException
     *
     * @return UserListerResult The user data
     */
    public function getUserList()
    {

        $userRows = $this->repository->getUserList();

        return $userRows;
    }

    
}