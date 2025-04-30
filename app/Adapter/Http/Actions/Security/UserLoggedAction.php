<?php

namespace App\Adapter\Http\Actions\Security;

use App\Infrastructure\Services\Security\UserLoggedGetServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

readonly class UserLoggedAction
{
    public function __construct(
        private UserLoggedGetServiceInterface $service
    )
    {
    }

    public function __invoke(): JsonResponse
    {
        try {
            return response()->json(($this->service)());
        } catch (\Throwable $exception) {
            return response()->json(
                ['error' => $exception->getMessage()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
