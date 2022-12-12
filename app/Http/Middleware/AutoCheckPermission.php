<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Permission;
use Illuminate\Http\Request;

class AutoCheckPermission
{
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()->getName() ;  // user.create
        $permission = Permission::whereRaw(" FIND_IN_SET ('$routeName' , routes ) ")->get();

        if ($permission) {
            if (!$request->user()->hasPermission([$permission->name])) {
                abort(400) ;
            }
        } else {
            abort(300) ;
        }



        return $next($request);
    }
}
