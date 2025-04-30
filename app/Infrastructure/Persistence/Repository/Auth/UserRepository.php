<?php

namespace App\Infrastructure\Persistence\Repository\Auth;

use App\Domain\Models\Auth\User;
use App\Domain\Persistence\Repository\Auth\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create($data);
    }
}
