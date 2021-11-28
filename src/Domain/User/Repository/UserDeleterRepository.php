<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Data\UserDeleterResult;
use DomainException;
use PDO;

/**
 * Repository.
 */
class UserDeleterRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get user by the given user id.
     *
     * @param int $userId The user id
     *
     * @throws DomainException
     *
     * @return int The user row
     */
    public function deleteUserById(int $userId): int
    {
        $sql = "DELETE FROM users WHERE id = :id;";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $userId]);

        $row = $statement->rowCount();

        return $row;
    }
}
