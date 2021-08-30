<?php

declare(strict_types=1);

namespace App\Tests\Application\Repository;

use App\Application\Task\Exception\TaskNotFoundException;
use App\Application\Task\Repository\InMemoryTaskRepository;
use App\Domain\Task\Task;
use PHPUnit\Framework\TestCase;

class InMemoryTaskRepositoryTest extends TestCase
{
    /**
     * @group task1
     */
    public function testGetExistingTask()
    {
        $repository = new InMemoryTaskRepository();
        $taskId = 1;
        $task = new Task($taskId, 'Test task');
        $repository->save($task);

        self::assertSame($task, $repository->get($taskId));
    }

    /**
     * @group task1
     */
    public function testGetNotExistingTask()
    {
        $repository = new InMemoryTaskRepository();
        $taskId = 1;
        $wrongTaskId = 2;
        $task = new Task($taskId, 'Test task');
        $repository->save($task);

        $this->expectException(TaskNotFoundException::class);

        $repository->get($wrongTaskId);
    }

    /**
     * @group task1
     */
    public function testGetCurrentTasks()
    {
        $repository = new InMemoryTaskRepository();
        $currentTask = new Task(1, 'Current task');
        $repository->save($currentTask);
        $finishedTask = new Task(2, 'Finished task', true);
        $repository->save($finishedTask);

        $currentTasks = $repository->findCurrent();

        self::assertCount(1, $currentTasks);
        self::assertEquals('Current task', $currentTasks[0]->getName());
    }

    /**
     * @group task1
     */
    public function testGetFinishedTasks()
    {
        $repository = new InMemoryTaskRepository();
        $currentTask = new Task(1, 'Current task');
        $repository->save($currentTask);
        $finishedTask = new Task(2, 'Finished task', true);
        $repository->save($finishedTask);

        $finishedTask = $repository->findDone();

        self::assertCount(1, $finishedTask);
        self::assertEquals('Finished task', $finishedTask[0]->getName());
    }
}
