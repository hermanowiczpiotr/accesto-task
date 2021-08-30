<?php

declare(strict_types=1);

namespace App\Application\User\Repository;

use App\Domain\User\User;
use App\Application\User\Exception\UserNotFoundException;

interface UserRepository
{
    public function save(User $user);

    /**
     * @throws UserNotFoundException
     */
    public function get(int $id): User;
}
