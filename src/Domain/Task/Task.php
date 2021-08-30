<?php

declare(strict_types=1);

namespace App\Domain\Task;

use App\Domain\User\User;

class Task
{
    private int $id;

    private string $name;

    private bool $done;

    private ?\DateTimeImmutable $deadline = null;

    private ?User $assignee = null;

    public function __construct(int $id, string $name, bool $done = false, ?\DateTimeImmutable $deadline = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->done = $done;
        $this->deadline = $deadline;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isDone(): bool
    {
        return $this->done;
    }

    public function getDeadline(): ?\DateTimeImmutable
    {
        return $this->deadline;
    }

    public function getAssignee(): ?User
    {
        return $this->assignee;
    }

    public function markDone(): void
    {
        $this->done = true;
    }

    public function assign(User $user)
    {
        $this->assignee = $user;
    }
}
