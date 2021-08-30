<?php

declare(strict_types=1);

namespace App\Tests\Integration;

use App\Application\Notification\NotifierChain;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class NotifierChainConfigurationTest extends KernelTestCase
{
    private NotifierChain $notifierChain;

    public function setUp(): void
    {
        $container = self::getContainer();
        $this->notifierChain = $container->get(NotifierChain::class);
    }

    /**
     * @group task2
     */
    public function testNotifiersAdded()
    {
        $notifiers = $this->notifierChain->getNotifiers();

        self::assertCount(1, $notifiers);
    }
}
