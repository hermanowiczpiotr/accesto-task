<?php

declare(strict_types=1);

namespace App\Application\Notification;

use App\Domain\Notification\Notification;

class NotifierChain implements Notifier
{
    /**
     * @var array<Notifier>
     */
    private array $notifiers = [];

    public function __construct(iterable $notifiers)
    {
        $this->notifiers = iterator_to_array($notifiers);
    }

    public function send(Notification $notification)
    {
        foreach ($this->notifiers as $notifier) {
            $notifier->send($notification);
        }
    }

    /**
     * @return Notifier[]|array
     */
    public function getNotifiers(): array
    {
        return $this->notifiers;
    }
}
