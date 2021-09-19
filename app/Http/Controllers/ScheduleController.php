<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = Schedule::all();
        return  response($schedule);
    }

    // public static function createSchedule($userId,$courseId){
    //     //dd($userId);
    //     $schedule = Schedule::create(["user_id"=>$userId,'course_id'=>$courseId,'link'=>"Link belum tersedia"]);

    //     return $schedule;

    // }
}
