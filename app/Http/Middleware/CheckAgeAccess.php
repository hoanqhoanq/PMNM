<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAgeAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $age = $request->input('age') ?? session('age');
        
        if ($age === null || !is_numeric($age) || (int)$age < 18) {
            return response("Không được phép truy cập", 403);
        }
        
        if ($request->filled('age')) {
            session(['age' => (int)$age]);
        }
        
        return $next($request);
    }
}