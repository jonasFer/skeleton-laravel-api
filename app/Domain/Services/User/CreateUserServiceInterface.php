<?php

namespace App\Domain\Services\User;

use App\Adapter\Presentation\User\UserRequest;

interface CreateUserServiceInterface
{
    public function __invoke(UserRequest $userRequest): array;
}
