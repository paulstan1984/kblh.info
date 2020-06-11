<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AdminLoginCheck
{
    private const UserIdKey = 'adminID';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $loggedInUserId = session(AdminLoginCheck::UserIdKey);
        if(empty($loggedInUserId)){
            return redirect(env('R_ADMIN_LOGIN'));
        }
        
        $loggedInUser = User::find($loggedInUserId);
        
        if($loggedInUser == null || $loggedInUser['role']!='admin'){
            return redirect(env('R_ADMIN_LOGIN'));
        }
        
        $request->attributes->add(['admin' => $loggedInUser]);
                
        return $next($request);
    }
}
