<?php

namespace App\Http\Middleware;

use App\Models\Patient;
use Closure;
use App\Models\Admin;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            session()->has('user') &&
            (Admin::where('user_id', session()->get('user')->id)->exists() ||
                Patient::where('user_id', session()->get('user')->id)->exists())
        ) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
