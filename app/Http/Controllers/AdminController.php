<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        $schools = School::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('school_name','id');

        return view('admin.dashboard')->with('schools',$schools);
    } 



    
}
