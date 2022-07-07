<?php


namespace App\Filters;

use Closure;


class CountryFilter{

public function handle($query, Closure $next){

if(request()->has('country')){
    $query->where('country',request()->input('country'));
}
return $next($query);

}


}