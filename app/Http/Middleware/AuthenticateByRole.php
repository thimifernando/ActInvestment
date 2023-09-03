<?php

namespace App\Http\Middleware;

use App\Services\IncomeCalculationService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->check() && in_array(auth()->user()->user_role, explode("||", $role))) {
            if (Auth::user()->user_role !== 'ADMIN') {
                IncomeCalculationService::calculate(Auth::user()->id);
            }
            return $next($request);
        }
        return abort(403);
    }
}
