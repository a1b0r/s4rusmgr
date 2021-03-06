<?php

namespace App\Domain\User\Data;

final class UserReaderResult
{
    /**
     * @var int
     */
    public $id;

    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    /** @var string */
    public $active;
}