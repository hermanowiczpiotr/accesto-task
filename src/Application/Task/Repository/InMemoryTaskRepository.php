<?php

declare(strict_types=1);

namespace App\Application\Task\Repository;

use App\Application\Task\Exception\TaskNotFoundException;
use App\Domain\Task\Task;

class InMemoryTaskRepository implements TaskRepository
{
    /** @var Task[] */
    private array $tasks = [];

    public function save(Task $task): void
    {
        $this->tasks[$task->getId()] = $task;
    }

    public function get(int $id): Task
    {
        if (!isset($this->tasks[$id])) {
            throw new TaskNotFoundException($id);
        }

        return $this->tasks[$id];
    }

    public function findCurrent(): array
    {
        return array_values(array_filter($this->tasks, static function (Task $task) {
            return $task->isDone() !== true;
        }));
    }

    public function findDone(): array
    {
        return array_values(array_filter($this->tasks, static function (Task $task) {
            return $task->isDone() === true;
        }));
    }
}
