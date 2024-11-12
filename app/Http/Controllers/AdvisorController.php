<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    //

    
    public function addAdvisor(){
                
        // $activities = Activity::all();
        // return view('admin.add_activity')->with('activities',$activities);
        return view('admin.add_advisor');
     }
}
