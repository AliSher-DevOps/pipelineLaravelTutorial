<?php

namespace App\Filters;

use Closure;


class RoleFilter{

public function handle($query,Closure $next){

    if(request()->has('role')){

        $query->where('role',request()->input('role'));
    }

    return $next($query);
}



}