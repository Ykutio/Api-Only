<?php

namespace App\Http\Middleware;

use App\Constants\ErrorResponse;
use App\Constants\StatusResponse;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CheckApiToken extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (empty($request->query('api_token'))) {
            return response()->json([
                'status'        => StatusResponse::ERROR,
                'error_message' => ErrorResponse::NO_ACCESS,
            ]);
        }

        $token = $request->query('api_token');

        if (empty($token)) {
            $token = $request->input('api_token');
        }
        if ($token === config('api.api_token')) {
            return $next($request);
        }

        return response()->json([
            'status'        => StatusResponse::ERROR,
            'error_message' => ErrorResponse::INVALID_TOKEN,
        ]);
    }
}
