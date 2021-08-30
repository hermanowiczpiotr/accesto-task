<?php

declare(strict_types=1);

namespace App\Application\Task\Command\Handler;

use App\Application\Task\Command\AssignTask;
use App\Application\Task\Repository\TaskRepository;
use App\Application\User\Repository\UserRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class AssignTaskHandler implements MessageHandlerInterface
{
    private UserRepository $userRepository;
    private TaskRepository $taskRepository;
    private MessageBusInterface $eventBus;

    public function __construct(UserRepository $userRepository, TaskRepository $taskRepository, MessageBusInterface $eventBus)
    {
        $this->userRepository = $userRepository;
        $this->taskRepository = $taskRepository;
        $this->eventBus = $eventBus;
    }

    public function __invoke(AssignTask $assignTask)
    {
        $user = $this->userRepository->get($assignTask->getUserId());
        $task = $this->taskRepository->get($assignTask->getTaskId());

        $task->assign($user);

        $this->taskRepository->save($task);
    }
}
