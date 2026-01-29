<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTimeAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $start = '07:00:00';
        $end = '16:00:00';
        
        if ($currentTime >= $start && $currentTime <= $end) {
            return $next($request);
        }
        
        return response()->json([
            'message' => 'Access dinied',
            'time' => $currentTime
        ], 403);
    }
}