<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ScheduleController;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Geolocation;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;

class UserRegistrationController extends Controller
{
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

    public function userFill(Request $request, $id){

        $user=User::find($id);
        $user->name=$request->input('name');
        $user->save();
        return response($user);
    }
    
    public function validation($id,Request $request){

        $user=User::find($id);
        $user->operator_id=$request->input('operator_id');
        $user->status='verified';
        $user->save();

        $course=Course::find($request->input('course_id'));
        //dd($request->input('course_id'));
        $course->user()->attach($user,['link'=>'Link belum dikerjakan']);

        return response([$user,"status verified"]);
    }

    
}
