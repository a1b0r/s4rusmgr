<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserDeleterRepository;

/**
 * Service.
 */
final class UserDeleter
{
    /**
     * @var UserDeleterRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserDeleterRepository $repository The repository
     */
    public function __construct(UserDeleterRepository $repository)
    {
        $this->repository = $repository;
    }


     /**
     * Delete a user.
     *
     * @param int $userId The user ID
     *
     * @return int The user ID
     */
    public function deleteUser(int $userId)
    {
        // Delete user
        $userId = $this->repository->deleteUserById($userId);

        return $userId;
    }
}