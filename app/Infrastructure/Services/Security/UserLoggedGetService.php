<?php

namespace App\Infrastructure\Services\Security;

use App\Domain\Models\Auth\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserLoggedGetService implements UserLoggedGetServiceInterface
{
    public function __invoke(): User
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'User not found'], 404);
            }

            return $user;
        } catch (JWTException $e) {

            return response()->json(['error' => 'Invalid token'], 400);
        }
    }
}
