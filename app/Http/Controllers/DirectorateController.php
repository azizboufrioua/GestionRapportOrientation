<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\Directorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectorateController extends Controller
{
    //
    public function adddirectorate()
    {

        $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id);
        $academies = Academy::all()->where('status',1)->where('user_id', '=', Auth::user()->id)->pluck('academy_name','id');
        return view('admin.add_directorate')->with('academies',$academies)->with('directorates',$directorates);
    } 

    public function saveDirectorate(Request $request)
    {

        $this->validate($request,['directorate_name'=>'required',
        'academy_id'=>'required']);


          //methode 1 save
       $directorate = new Directorate();
       $directorate->directorate_name =  $request->directorate_name;
       $directorate->academy_id =  $request->academy_id;
       $directorate->status = 1;
       $directorate->user_id = Auth::user()->id;
       $directorate->save();

       //Message de succes 

     return back()->with('status', 'لقد تم إضافة المديرية الإقليمية '.$request->directorate_name.' نجاح');

    }


    public function edit($id) 
    {
         //recherche par id pour l'affichage
         $directorate = Directorate::findOrFail($id);

        $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id);
        $academies = Academy::all()->where('status',1)->where('user_id', '=', Auth::user()->id)->pluck('academy_name','id');
        
        //retour de la vue edit avec l'object direction et academies ...

        return view('admin.edit_directorate')->with('academies',$academies)->with('directorates',$directorates)->with('directorate',$directorate);
    }



    public function editDirectorate(Request $request, $id)
    {
            //recherche par id pour l'update
            $directorate = Directorate::findOrFail($id);
            $directorate->directorate_name =  $request->directorate_name;
            $directorate->academy_id =  $request->academy_id;
            $directorate->status = 1;
            $directorate->update();
            $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id);
            $academies = Academy::all()->where('status',1)
                                        ->where('user_id', '=', Auth::user()->id)
                                        ->pluck('academy_name','id');
            
            //retour de la vue edit avec l'object direction et academies ...
    
            return  back()->with('academies',$academies)->with('directorates',$directorates)->with('directorate',$directorate)->with('status', 'لقد تم تعديل المديرية  '.$request->directorate_name.' نجاح');

    } 


    
    public function activerDirectorate($id)
    {
            $isactived = 'تفعيل' ;
            //recherche par id pour la suppression
            $directorate = Directorate::findOrFail($id);
            if($directorate->status){
                $directorate->status = 0;
                $isactived = 'إلغاء' ;
            }else
            {
                $directorate->status = 1;
                $isactived = 'تفعيل' ;
            }
            $directorate->update();
            
            $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id);
            $academies = Academy::all()->where('status',1)
                                        ->where('user_id', '=', Auth::user()->id)
                                        ->pluck('academy_name','id');
            
            //retour de la vue edit avec l'object direction et academies ...
    
            return  back()->with('academies',$academies)
                          ->with('directorates',$directorates)
                          ->with('directorate',$directorate)
                          ->with('status', 'لقد تم '.$isactived.' المديرية '.$directorate->directorate_name.' نجاح');

    }


    public function deleteDirectorate($id)
    {
            //recherche par id pour la suppression
            $directorate = Directorate::findOrFail($id);
            $name = $directorate->directorate_name;
            $directorate->delete();
            $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id);
            $academies = Academy::all()->where('status',1)->where('user_id', '=', Auth::user()->id)->pluck('academy_name','id');

            return view('admin.add_directorate')->with('status', 'لقد تم حدف المديرية '.$name.' نجاح')
                                            ->with('directorates',$directorates)
                                            ->with('academies',$academies);
   
    }
}
