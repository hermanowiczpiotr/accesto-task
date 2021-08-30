<?php

declare(strict_types=1);

namespace App\Application\Task\Repository;

use App\Application\Task\Exception\TaskNotFoundException;
use App\Domain\Task\Task;

interface TaskRepository
{
    public function save(Task $task): void;

    /**
     * @throws TaskNotFoundException
     */
    public function get(int $id): Task;

    /**
     * @return array<Task>
     */
    public function findCurrent(): array;

    /**
     * @return array<Task>
     */
    public function findDone(): array;
}
