<?php

declare(strict_types=1);

namespace App\Tests\Application\Repository;

use App\Application\User\Exception\UserNotFoundException;
use App\Application\User\Repository\InMemoryUserRepository;
use App\Domain\User\User;
use PHPUnit\Framework\TestCase;

class InMemoryUserRepositoryTest extends TestCase
{

    public function testGetExistingUser()
    {
        $repository = new InMemoryUserRepository();
        $userId = 1;
        $user = new User($userId, 'testuser', 'test@accesto.com');
        $repository->save($user);

        self::assertSame($user, $repository->get($userId));
    }

    public function testGetNotExistingUser()
    {
        $repository = new InMemoryUserRepository();
        $userId = 1;
        $wrongUserId = 2;
        $task = new User($userId, 'testuser', 'test@accesto.com');
        $repository->save($task);

        $this->expectException(UserNotFoundException::class);

        $repository->get($wrongUserId);
    }
}
