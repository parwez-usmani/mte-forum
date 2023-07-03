<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
      /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role, $permission = null)
    {
        if(!$request->user()->hasRole($role)){
            // return  abort(403,"This User role can't perform this action"); //restricted urls
            // session()->flash('error', "This User role can't perform this action.");
            return redirect()->to('/accessdenied');
        }

        if($permission != null && !$request->user()->can($permission)){
            // return abort(403,"User has no permission to perform this actions");
            return redirect()->to('/accessdenied');
        }
        return $next($request);
    }
}
