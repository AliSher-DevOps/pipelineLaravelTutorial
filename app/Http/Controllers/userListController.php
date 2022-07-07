<?php

namespace App\Http\Controllers;

use App\Filters\CountryFilter;
use App\Filters\RoleFilter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class userListController extends Controller
{
    public function __invoke(Request $request){

        $users = app(Pipeline::class)
        ->send(User::query())
        ->through([
            RoleFilter::class,
            CountryFilter::class,
        ])
        ->thenReturn()->paginate(20);

        return view('users',compact('users'));

    }
 
}
