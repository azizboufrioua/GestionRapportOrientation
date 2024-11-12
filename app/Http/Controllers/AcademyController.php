<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademyController extends Controller
{
    //

    public function addacademy()
    {

        $academies = Academy::all()->where('user_id', '=', Auth::user()->id);
      // $academies = Academy::orderBy('id', 'desc')->paginate(2);
        return view('admin.add_academy')->with('academies',$academies);
    } 
    
    public function saveAcademy(Request $request)
    {
          
        //Validation du formulaire 
        $this->validate($request,['academy_name'=>'required:academies']);

        //methode 1 save
       $academy = new Academy();
       $academy->academy_name =  $request->academy_name;
       $academy->status = 1;
       $academy->user_id = Auth::user()->id;
       $academy->save();

       //Message de succes 
     //  $request->session()->put('status','la catégorie '.$request->category_name.' a été ajouté avec succes');

     return back()->with('status', 'لقد تم إضافة الأكاديمية '.$request->academy_name.' نجاح');
    // view('admin.add_category');
    } 

    public function edit($id)
    {

           $academies = Academy::all()->where('user_id', '=', Auth::user()->id);

            //recherche par id pour l'affichage
            $academy = Academy::findOrFail($id);
            //retour de la vue edit avec l'object produit
            return view('admin.edit_academy')->with('academy',$academy )->with('academies',$academies);
    }


    public function editAcademy(Request $request, $id)
    {

            //recherche par id pour l'update
            $academy = Academy::findOrFail($id);
            $academy->academy_name =  $request->academy_name;
            $academy->update();
          //  return back()->with('status', 'la catégorie '.$request->category_name.' a été ajouté avec succes');
            //retour de la vue edit avec l'object produit
            $academies = Academy::all();
          //  return view('admin.table_categories')->with('categories',$categories)->with('status', 'la catégorie '.$request->category_name.' a été modifier avec succes');
          return back()->with('status', 'لقد تم تعديل الأكاديمية '.$request->academy_name.' نجاح')->with('academies',$academies);

    } 


    public function activerAcademy($id)
    {
            $isactived = 'تفعيل' ;
            //recherche par id pour la suppression
            $academy = Academy::findOrFail($id);
            if($academy->status){
                $academy->status = 0;
                $isactived = 'إلغاء' ;
            }else
            {
                $academy->status = 1;
                $isactived = 'تفعيل' ;
            }
            $academy->update();
            $academies = Academy::all()->where('user_id', '=', Auth::user()->id);
            return back()->with('status', 'لقد تم '.$isactived.' الأكاديمية '.$academy->academy_name.' نجاح')->with('academies',$academies);
    }


    public function deleteAcademy($id)
    {
            //recherche par id pour la suppression
            $academy = Academy::findOrFail($id);
            $name = $academy->academy_name;
            $academy->delete();
            $academies = Academy::all()->where('user_id', '=', Auth::user()->id);

            return view('admin.add_academy')->with('status', 'لقد تم حدف الأكاديمية '.$name.' نجاح')->with('academies',$academies);
   
    }

}
