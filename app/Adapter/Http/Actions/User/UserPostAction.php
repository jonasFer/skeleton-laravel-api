<?php

namespace App\Adapter\Http\Actions\User;

use App\Adapter\Presentation\User\UserRequest;
use App\Domain\Services\User\CreateUserServiceInterface;
use Illuminate\Http\JsonResponse;

class UserPostAction
{
    public function __construct(
        protected CreateUserServiceInterface $service
    ) {
    }

    public function __invoke(UserRequest $request): JsonResponse
    {
        return response()->json(($this->service)($request));
    }
}
