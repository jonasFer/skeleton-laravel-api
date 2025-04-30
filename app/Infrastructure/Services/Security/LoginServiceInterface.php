<?php

namespace App\Infrastructure\Services\Security;

use App\Adapter\Presentation\Security\LoginUserRequest;

interface LoginServiceInterface
{
    public function __invoke(LoginUserRequest $userRequest): string;
}
