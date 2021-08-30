<?php

declare(strict_types=1);

namespace App\Domain\Notification;

use App\Domain\User\User;

class Notification
{
    private string $title;

    private string $content;

    private User $user;

    public function __construct(string $title, string $content, User $user)
    {
        $this->title = $title;
        $this->content = $content;
        $this->user = $user;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
