<?php

namespace App\Adapter\Http\Actions;

class HealthAction
{
    public function __invoke()
    {
        return response('OK', 200);
    }
}
