<?php

namespace App\Infrastructure\Services\Security;

use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutPostService implements LogoutPostServiceInterface
{
    public function __invoke(): void
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    }
}
