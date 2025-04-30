<?php

namespace App\Infrastructure\Services\Security;

use App\Adapter\Presentation\Security\LoginUserRequest;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginService implements LoginServiceInterface
{
    public function __invoke(LoginUserRequest $userRequest): string
    {
        try {
            $credentials = $userRequest->only('email', 'password');

            if (!JWTAuth::attempt($credentials)) {
                throw new JWTException('Invalid credentials');
            }

            $user = auth()->user();
            return JWTAuth::claims(['role' => $user->role])->fromUser($user);
        } catch (\Throwable $exception) {
            throw new \Exception($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }

    }
}
