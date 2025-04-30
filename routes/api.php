<?php


use App\Adapter\Http\Actions\Security\LoginJWTPostAction;
use App\Adapter\Http\Actions\Security\LogoutPostAction;
use App\Adapter\Http\Actions\Security\UserLoggedAction;
use App\Adapter\Http\Actions\User\UserPostAction;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/health');

Route::get('/health', function () {
    return response('OK', Response::HTTP_OK);
});

Route::post('register', [UserPostAction::class, '__invoke']);
Route::post('login', [LoginJWTPostAction::class, '__invoke']);

Route::middleware([\App\Adapter\Http\Middleware\JWTMiddleware::class])->group(function () {
    Route::get('user', [UserLoggedAction::class, '__invoke']);
    Route::post('logout', [LogoutPostAction::class, '__invoke']);
});
