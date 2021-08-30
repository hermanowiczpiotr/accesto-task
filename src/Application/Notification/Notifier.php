<?php

declare(strict_types=1);

namespace App\Application\Notification;

use App\Domain\Notification\Notification;

interface Notifier
{
    public function send(Notification $notification);
}
