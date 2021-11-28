<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserUpdaterRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class UserUpdater
{
    /**
     * @var UserUpdaterRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserUpdaterRepository $repository The repository
     */
    public function __construct(UserUpdaterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new user.
     *
     * @param array<mixed> $data The form data
     *
     * @return int The new user ID
     */
    public function updateUser(array $data): int
    {
        // Input validation
        // $this->validateNewUser($data);

        // Insert user
        $userId = $this->repository->updateUser($data);

        return $userId;
    }

    /**
     * Input validation.
     *
     * @param array<mixed> $data The form data
     *
     * @throws ValidationException
     *
     * @return void
     */
    private function validateNewUser(array $data): void
    {

        $errors = [];

        if ($errors) {
            throw new ValidationException('Please check your input', $errors);
        }
    }
}