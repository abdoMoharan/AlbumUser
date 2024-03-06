<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTimeLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = $request->session()->get('start_time');
        $endTime = $request->session()->get('end_time');
        $currentTime = Carbon::now();

        if ($currentTime->gt($endTime)) {
            return redirect()->route('assgnment.index')->with('error', 'Time limit exceeded.');
        }
        return $next($request);
    }
}
