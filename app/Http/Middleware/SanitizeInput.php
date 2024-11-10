<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanitizeInput
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $input = $request->all();

        // Apply strip_tags() to all input fields
        array_walk_recursive($input, function (&$input) {
            $input = strip_tags($input); // Remove HTML tags
        });

        // Merge sanitized input back into the request
        $request->merge($input);

        return $next($request);
    }
}
