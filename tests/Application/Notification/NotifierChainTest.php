<?php

declare(strict_types=1);

namespace App\Tests\Application\Notification;

use App\Application\Notification\DummyEmailNotifier;
use App\Application\Notification\NotifierChain;
use App\Domain\Notification\Notification;
use App\Domain\User\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class NotifierChainTest extends KernelTestCase
{
    /**
     * @group task2
     */
    public function testNotificationIsSent()
    {
        self::bootKernel();
        $container = static::getContainer();

        /**
         * @var NotifierChain $chain
         */
        $chain = $container->get(NotifierChain::class);
        /**
         * @var DummyEmailNotifier $dummyNotifier
         */
        $dummyNotifier = $container->get(DummyEmailNotifier::class);
        $notification = new Notification('Test notification', 'Just a dummy notification', new User(1, 'test', 'test@accesto.com'));

        $chain->send($notification);

        self::assertCount(1, $dummyNotifier->getSentMessages());
        self::assertSame($notification, $dummyNotifier->getSentMessages()[0]);
    }
}
