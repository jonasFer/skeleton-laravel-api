<?php

namespace App\Adapter\Http\Actions\Security;

use App\Infrastructure\Services\Security\LogoutPostServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

readonly class LogoutPostAction
{
    public function __construct(
        private LogoutPostServiceInterface $service
    ) {
    }

    public function __invoke(): JsonResponse
    {
        ($this->service)();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
