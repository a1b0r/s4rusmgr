<?php

namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository.
 */
class UserUpdaterRepository
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
     * update user row.
     *
     * @param array<mixed> $user The user
     *
     * @return int The new ID
     */
    public function updateUser(array $user): int
    {
        $row = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'active' => $user['active'],
        ];
        $sql = "UPDATE users 
                SET first_name=:first_name, last_name=:last_name, active=:active 
                WHERE id=:id";
        $this->connection->prepare($sql)->execute($row);

        return (int) $row['id'];
    }
}
