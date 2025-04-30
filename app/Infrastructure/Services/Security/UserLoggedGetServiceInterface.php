<?php

namespace App\Infrastructure\Services\Security;

use App\Domain\Models\Auth\User;

interface UserLoggedGetServiceInterface
{
    public function __invoke(): User;
}
