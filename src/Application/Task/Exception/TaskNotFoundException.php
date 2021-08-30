<?php

declare(strict_types=1);

namespace App\Application\Task\Exception;

class TaskNotFoundException extends \Exception
{
    public function __construct(int $id)
    {
        parent::__construct(sprintf('Task %d not found', $id));
    }
}
