<?php

namespace App\Http\Middleware;

use App\Models\Doctor;
use Closure;
use App\Models\Admin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isNotDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( session()->has('user') && Doctor::where('user_id', session()->get('user')->id)->exists() ) {
            return redirect()->route('doctorDashboard');
        }
        return $next($request);
    }
}
