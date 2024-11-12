<?php

namespace App\Http\Controllers;

use App\Models\Axe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AxeController extends Controller
{
    
    
    public function addAxe()
    {

        $axes = Axe::all()->where('user_id', '=', Auth::user()->id);
        return view('admin.add_axe')->with('axes',$axes);
    }     
    
    public function saveAxe(Request $request)
    {
          
        //Validation du formulaire 
        $this->validate($request,['axe_name'=>'required']);

        //methode 1 save
       $axe = new Axe();
       $axe->axe_name =  $request->axe_name;
       $axe->status = 1;
       $axe->user_id = Auth::user()->id;

       $axe->save();

       //Message de succes 
     //  $request->session()->put('status','la catégorie '.$request->category_name.' a été ajouté avec succes');
     $axes = Axe::all()->where('user_id', '=', Auth::user()->id);

     return view('admin.add_axe')->with('axes',$axes)->with('status', 'لقد تم إضافة مجال التدخل '.$request->axe_name.' نجاح');
    // view('admin.add_category');
    } 

    public function edit($id)
    {

             $axes = Axe::all()->where('user_id', '=', Auth::user()->id);

            //recherche par id pour l'affichage
            $axe = Axe::findOrFail($id);
            //retour de la vue edit avec l'object produit
            return view('admin.edit_axe')->with('axe',$axe )->with('axes',$axes);
    }


    public function editAxe(Request $request, $id)
    {

            //recherche par id pour l'update
            $axe = axe::findOrFail($id);
            $axe->axe_name =  $request->axe_name;
            $axe->update();
          //  return back()->with('status', 'la catégorie '.$request->category_name.' a été ajouté avec succes');
            //retour de la vue edit avec l'object produit
            $axes = Axe::all()->where('user_id', '=', Auth::user()->id);
          //  return view('admin.table_categories')->with('categories',$categories)->with('status', 'la catégorie '.$request->category_name.' a été modifier avec succes');
          return back()->with('status', 'لقد تم تعديل مجال التدخل '.$request->axe_name.' نجاح')->with('axes',$axes);

    } 


    public function activerAxe($id)
    {
            $isactived = 'تفعيل' ;
            //recherche par id pour la suppression
            $axe = Axe::findOrFail($id);
            if($axe->status){
                $axe->status = 0;
                $isactived = 'إلغاء' ;
            }else
            {
                $axe->status = 1;
                $isactived = 'تفعيل' ;
            }
            $axe->update();
            $axes = Axe::all()->where('user_id', '=', Auth::user()->id);
            return view('admin.add_axe')->with('status', 'لقد تم '.$isactived.' مجال التدخل '.$axe->axe_name.' نجاح')->with('axes',$axes);
    }


    public function deleteAxe($id)
    {
            //recherche par id pour la suppression
            $axe = Axe::findOrFail($id);
            $name = $axe->axe_name;
            $axe->delete();
            $axes = Axe::all()->where('user_id', '=', Auth::user()->id);

            return view('admin.add_axe')->with('status', 'لقد تم حدف مجال التدخل '.$name.' نجاح')->with('axes',$axes);
   
    }




}
