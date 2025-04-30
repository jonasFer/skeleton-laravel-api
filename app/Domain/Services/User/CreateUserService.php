<?php

namespace App\Domain\Services\User;

use App\Adapter\Presentation\User\UserRequest;
use App\Domain\Persistence\Repository\Auth\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class CreateUserService implements CreateUserServiceInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ){
    }

    public function __invoke(UserRequest $userRequest): array
    {
        $user = $this->userRepository->create([
            'name' => $userRequest->get('name'),
            'email' => $userRequest->get('email'),
            'password' => Hash::make($userRequest->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return compact('user','token');
    }
}
