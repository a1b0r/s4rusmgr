<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Data\UserListerResult;
use DomainException;
use PDO;

/**
 * Repository.
 */
class UserListerRepository
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
     * Get users
     *
     *
     * @throws DomainException
     *
     * @return array The user rows
     */
    public function getUserList(): array
    {
        $sql = "SELECT id, first_name, last_name, active FROM users;";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
        if (!$rows) {
            throw new DomainException(sprintf('Users not found'));
        }

        return $rows;
    }
}
