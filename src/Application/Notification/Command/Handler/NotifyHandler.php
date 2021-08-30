<?php

declare(strict_types=1);

namespace App\Application\Notification\Command\Handler;

use App\Application\Notification\Command\Notify;
use App\Application\Notification\Notifier;
use App\Application\User\Repository\UserRepository;
use App\Domain\Notification\Notification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class NotifyHandler implements MessageHandlerInterface
{
    private UserRepository $userRepository;
    private Notifier $notifier;

    public function __construct(UserRepository $userRepository, Notifier $notifier)
    {
        $this->userRepository = $userRepository;
        $this->notifier = $notifier;
    }

    public function __invoke(Notify $notify)
    {
        $user = $this->userRepository->get($notify->getUserId());

        $notification = new Notification('', '', $user);

        $this->notifier->send($notification);
    }
}
