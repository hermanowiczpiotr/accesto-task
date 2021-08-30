<?php

declare(strict_types=1);

namespace App\Application\User\Repository;

use App\Application\User\Exception\UserNotFoundException;
use App\Domain\User\User;

class InMemoryUserRepository implements UserRepository
{
    /**
     * @var array<User>
     */
    private array $users = [];

    public function save(User $user)
    {
        $this->users[$user->getId()] = $user;
    }

    public function get(int $id): User
    {
        if (array_key_exists($id, $this->users)) {
            return $this->users[$id];
        }

        throw new UserNotFoundException($id);
    }
}
