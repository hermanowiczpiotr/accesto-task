<?php

declare(strict_types=1);

namespace App\Application\Task\Repository;

use App\Application\Task\Exception\TaskNotFoundException;
use App\Domain\Task\Task;

class InMemoryTaskRepository implements TaskRepository
{
    public function save(Task $task): void
    {
        // implement this
    }

    public function get(int $id): Task
    {
        // implement this - one task by id
    }

    public function findCurrent(): array
    {
        // implement this - return all pending tasks (not done)

        return [];
    }

    public function findDone(): array
    {
        // implement this - list of done tasks

        return [];
    }
}
