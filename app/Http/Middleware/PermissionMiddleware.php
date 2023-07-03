<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

use Closure;

class PermissionMiddleware
{
    /** 
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$permission)
    {

        // echo"<pre>";print_r($request->user()->role->role_slug);echo"<pre>";exit;

        // $user_permission = $request->user()->permissions->first();
        // echo"<pre>";print_r($user_permission->slug);echo"<pre>";exit;

        $user_role = $request->user()->role->role_slug;
        if(!(in_array($user_role,$permission))){
            // return  abort(403,"User has no permission to perform this action"); //restricted urls
            return redirect()->to('/accessdenied');
        }
        return $next($request);
        
    }
}
