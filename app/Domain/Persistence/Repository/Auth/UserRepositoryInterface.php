<?php

namespace App\Domain\Persistence\Repository\Auth;

use App\Domain\Models\Auth\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;
}
