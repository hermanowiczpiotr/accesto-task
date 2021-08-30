<?php

declare(strict_types=1);

namespace App\Application\Task\Command;

class AssignTask
{
    private int $taskId;

    private int $userId;

    public function __construct(int $taskId, int $userId)
    {
        $this->taskId = $taskId;
        $this->userId = $userId;
    }

    public function getTaskId(): int
    {
        return $this->taskId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
