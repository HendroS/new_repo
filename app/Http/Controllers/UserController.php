<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Geolocation;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    //

    public function index()
    {
        $user = User::all();
        return  response($user);
    }
    
    public function regUser(Request $request)
    {  

        $location=request()->only(['latitude','longitude','altitude']);
        $usr=request()->only(['email','password']);

        $geoloc = new Geolocation();
        $geoloc->fill($location);
        $geoloc->save();

        $id=$geoloc->id;

        $usr['geolocation_id']=$id;
        $usr['password']=bcrypt($usr['password']);
        $user = new User();
        $user -> fill($usr);
        $user -> save();

        return response($user);
    }
}
