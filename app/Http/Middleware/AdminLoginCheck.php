<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AdminLoginCheck
{
    public const AdminIdKey = 'adminID';
    public const AdminKey = 'admin';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $loggedInUserId = session(AdminLoginCheck::AdminIdKey);
        if(empty($loggedInUserId)){
            return redirect(env('R_ADMIN_LOGIN'));
        }
        
        $loggedInUser = User::find($loggedInUserId);
        
        if($loggedInUser == null || $loggedInUser['role']!='admin'){
            return redirect(env('R_ADMIN_LOGIN'));
        }
        
        $request->attributes->add([AdminLoginCheck::AdminKey => $loggedInUser]);
                
        return $next($request);
    }
}
