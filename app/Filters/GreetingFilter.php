<?php 

namespace App\Filters;


use closure;


class GreetingFilter{

public function handle_words($word,Closure $next){

    $greetingWord = "Hello and Welcome ".$word;
    return $next($greetingWord);
}

}
