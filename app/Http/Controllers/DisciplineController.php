<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    //

    

    public function adddiscipline()
    {

        $academies = Discipline::all();
      // $academies = Academy::orderBy('id', 'desc')->paginate(2);
        return view('admin.add_discipline')->with('academies',$academies);
    } 

    public function saveDiscipline()
    {

        $academies = Discipline::all();
      // $academies = Academy::orderBy('id', 'desc')->paginate(2);
        return view('admin.add_discipline')->with('academies',$academies);
    } 
}
