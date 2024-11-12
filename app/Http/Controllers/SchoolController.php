<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\District;
use App\Models\Directorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    //

    public function addSchool()
    {
        $schools = School::all()->where('user_id', '=', Auth::user()->id);
        $districts = District::all()->where('user_id', '=', Auth::user()->id)->pluck('district_name','id');
        $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
           return view('admin.add_school')
           ->with('schools',$schools)
           ->with('directorates',$directorates)
           ->with('districts',$districts);
    }

    public function saveSchool(Request $request)
    {
       //methode 1 save
       $this->validate($request,['school_name'=>'required','school_effectif'=>'required','school_classes'=>'required']);

       // school_name	status	school_qual	school_coll	school_classes	school_effectif	district_id	directorate_id
       $school = new School();
       $school->school_name =  $request->school_name;
       $school->status = 1;
       $school->school_qual = ($request->has('school_qual')) ? 1 : 0;    
       $school->school_coll = ($request->has('school_coll')) ? 1 : 0;    
       $school->school_classes = $request->school_classes;
       $school->school_effectif = $request->school_effectif;
       $school->district_id = $request->district_id;
       $school->directorate_id = $request->directorate_id;
       $school->user_id = Auth::user()->id;
       $school->save();


        $schools = School::all()->where('user_id', '=', Auth::user()->id);
        $districts = District::all()->where('user_id', '=', Auth::user()->id)->pluck('district_name','id');
        $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');

        return view('admin.add_school')
        ->with('status', ' لقد تم إضافة  المؤسسة رقم  '.$request->school_name.' نجاح')
           ->with('schools',$schools)
           ->with('directorates',$directorates)
           ->with('districts',$districts);
    }


    public function edit($id) 
    {
         //recherche par id pour l'affichage
         $school = School::findOrFail($id);

        $schools = School::all()->where('user_id', '=', Auth::user()->id);
        $districts = District::all()->where('user_id', '=', Auth::user()->id)->pluck('district_name','id');
        $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
           return view('admin.edit_school')
           ->with('schools',$schools)
           ->with('directorates',$directorates)
           ->with('districts',$districts)
           ->with('school',$school);
    } 
    
    public function editSchool(Request $request, $id)
    {
         //recherche par id pour l'affichage
         $school = School::findOrFail($id);

          $school->school_name =  $request->school_name;
          $school->status = 1;
          $school->school_qual = ($request->has('school_qual')) ? 1 : 0;    
          $school->school_coll = ($request->has('school_coll')) ? 1 : 0;    
          $school->school_classes = $request->school_classes;
          $school->school_effectif = $request->school_effectif;
          $school->district_id = $request->district_id;
          $school->directorate_id = $request->directorate_id;
          $school->update();
   
   
           $schools = School::all()->where('user_id', '=', Auth::user()->id);
           $districts = District::all()->where('user_id', '=', Auth::user()->id)->pluck('district_name','id');
           $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
   
           return back()
           ->with('status', ' لقد تم إضافة  المؤسسة رقم  '.$request->school_name.' نجاح')
              ->with('schools',$schools)
              ->with('directorates',$directorates)
              ->with('districts',$districts);
    }


    public function activerSchool($id)
    {
            $isactived = 'تفعيل' ;
            //recherche par id pour la suppression
            $school = School::findOrFail($id);
            if($school->status){
                $school->status = 0;
                $isactived = 'إلغاء' ;
            }else
            {
                $school->status = 1;
                $isactived = 'تفعيل' ;
            }
            $school->update();
         
 


            $schools = School::all()->where('user_id', '=', Auth::user()->id);
            $districts = District::all()->where('user_id', '=', Auth::user()->id)->pluck('district_name','id');
            $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');

            return view('admin.add_school')
            ->with('status', 'لقد تم '.$isactived.' المؤسسة '.$school->directorate_name.' نجاح')
            ->with('schools',$schools)
            ->with('directorates',$directorates)
            ->with('districts',$districts);

    }


    public function deleteSchool($id)
    {
            //recherche par id pour la suppression
            $school = School::findOrFail($id);
            $name = $school->district_name;
            $school->delete();
           
            $schools = School::all()->where('user_id', '=', Auth::user()->id);
            $districts = District::all()->where('user_id', '=', Auth::user()->id)->pluck('district_name','id');
            $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');

            return view('admin.add_school')
            ->with('status', 'لقد تم حدف المؤسسة '.$name.' نجاح')
           ->with('schools',$schools)
           ->with('directorates',$directorates)
           ->with('districts',$districts);


    }

}
