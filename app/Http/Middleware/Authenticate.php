<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate extends \Illuminate\Auth\Middleware\Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $guards = [];
    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;
        return parent::handle($request, $next, ...$guards);
    }
    protected function redirectTo(Request $request)
    {
        if (in_array("admin", $this->guards)) {
            return "admin/login";
        }
        return "error/auth";
    }
}
