<?php

declare(strict_types=1);

namespace App\Tests\Integration;

use App\Application\Task\Command\AssignTask;
use App\Domain\Task\Task;
use App\Application\Task\Repository\TaskRepository;
use App\Application\User\Repository\UserRepository;
use App\Domain\User\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Messenger\MessageBusInterface;

class AssignTaskTest extends KernelTestCase
{
    private UserRepository $userRepository;
    private TaskRepository $taskRepository;
    private MessageBusInterface $commandBus;

    public function setUp(): void
    {
        $container = self::getContainer();
        $this->userRepository = $container->get(UserRepository::class);
        $this->taskRepository = $container->get(TaskRepository::class);
        $this->commandBus = $container->get('command.bus');
    }

    public function testUserIsAssigned()
    {
        $user = new User(1, 'testuser', 'test@accesto.com');
        $this->userRepository->save($user);
        $this->taskRepository->save(new Task(1, 'testtask'));

        $this->commandBus->dispatch(new AssignTask(1, 1));

        self::assertSame($user, $this->taskRepository->get(1)->getAssignee());
    }
}
