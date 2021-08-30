<?php

declare(strict_types=1);

namespace App\Tests\Integration;

use App\Application\Notification\DummyEmailNotifier;
use App\Application\Task\Command\AssignTask;
use App\Domain\Task\Task;
use App\Application\Task\Repository\TaskRepository;
use App\Application\User\Repository\UserRepository;
use App\Domain\User\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Messenger\MessageBusInterface;

class NotifyTaskAssignedTest extends KernelTestCase
{
    private UserRepository $userRepository;
    private TaskRepository $taskRepository;
    private MessageBusInterface $commandBus;
    private DummyEmailNotifier $dummyEmailNotifier;

    public function setUp(): void
    {
        $container = self::getContainer();
        $this->userRepository = $container->get(UserRepository::class);
        $this->taskRepository = $container->get(TaskRepository::class);
        $this->commandBus = $container->get('command.bus');
        $this->dummyEmailNotifier = $container->get(DummyEmailNotifier::class);
    }

    /**
     * @group task3
     */
    public function testNotificationSent()
    {
        $user = new User(1, 'testuser', 'test@accesto.com');
        $this->userRepository->save($user);
        $this->taskRepository->save(new Task(1, 'testtask'));

        $this->commandBus->dispatch(new AssignTask(1, 1));

        $messages = $this->dummyEmailNotifier->getSentMessages();

        self::assertCount(1, $messages);
        self::assertSame($user, $messages[0]->getUser());
    }
}
