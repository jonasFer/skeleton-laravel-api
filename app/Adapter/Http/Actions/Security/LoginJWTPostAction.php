<?php

namespace App\Adapter\Http\Actions\Security;

use App\Adapter\Presentation\Security\LoginUserRequest;
use App\Infrastructure\Services\Security\LoginServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

readonly class LoginJWTPostAction
{
    public function __construct(
        private LoginServiceInterface $service
    ) {
    }

    public function __invoke(LoginUserRequest $request): JsonResponse
    {
        try {
            return response()->json(
                ["token" => ($this->service)($request)],
                Response::HTTP_OK
            );
        } catch (\Throwable $exception) {
            return response()->json(
                ['error' => $exception->getMessage()],
                $exception?->getCode() ?? Response::HTTP_BAD_REQUEST
            );
        }
    }
}
