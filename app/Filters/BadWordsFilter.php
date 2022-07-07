<?php

namespace App\Filters;

use closure;

class BadWordsFilter{

    public function handle_words($words,Closure $next){
        
        $array_of_words = ['bad','lazy','kill'];

        if(in_array($words,$array_of_words)){
            return false;
        }
        

        return $next($words);
    }
}
