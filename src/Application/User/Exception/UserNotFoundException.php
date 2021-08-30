<?php

declare(strict_types=1);

namespace App\Application\User\Exception;

class UserNotFoundException extends \Exception
{
    public function __construct(int $id)
    {
        parent::__construct(sprintf('User %d not found', $id));
    }
}
