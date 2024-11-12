<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Directorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistrictController extends Controller
{
      //
        public function adddistrict()
        {
    
            $districts = District::all()->where('user_id', '=', Auth::user()->id);
            $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
            return view('admin.add_district')->with('districts',$districts)->with('directorates',$directorates);
        } 


        public function saveDistrict(Request $request)
        {
    
            $this->validate($request,['district_name'=>'required',
            'directorate_id'=>'required']);
    
    
              //methode 1 save
           $district = new District();
           $district->district_name =  $request->district_name;
           $district->directorate_id =  $request->directorate_id;
           $district->status = 1;
           $district->user_id = Auth::user()->id;
           $district->save();
    
            
           $districts = District::all()->where('user_id', '=', Auth::user()->id);
           $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
            //Message de succes
           return view('admin.add_district')->with('districts',$districts)->with('directorates',$directorates)
                                             ->with('status', ' لقد تم إضافة القطاع المدرسي رقم  '.$request->district_name.' نجاح');
    
        }



        public function edit($id) 
        {
             //recherche par id pour l'affichage
             $district = District::findOrFail($id);
    
            $districts = District::all()->where('user_id', '=', Auth::user()->id);
            $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
            
            //retour de la vue edit avec l'object direction et academies ...
    
            return view('admin.edit_district')->with('districts',$districts)
            ->with('directorates',$directorates)
            ->with('district',$district);
        }

 
        public function editDistrict(Request $request, $id)
        {
                //recherche par id pour l'update
                $district = District::findOrFail($id);
                $district->district_name =  $request->district_name;
                $district->directorate_id =  $request->directorate_id;
                $district->status = 1;
                $district->update();

                $districts = District::all()->where('user_id', '=', Auth::user()->id);
                $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
            
                //retour de la vue edit avec l'object direction et academies ...
        
                return  back()->with('districts',$districts)
                ->with('directorates',$directorates)
                ->with('district',$district)
                ->with('status', 'لقد تم تعديل القطاع  '.$request->directorate_name.' نجاح');     
        } 


         
        public function activerDistrict($id)
        {
                $isactived = 'تفعيل' ;
                //recherche par id pour la suppression
                $district = District::findOrFail($id);
                if($district->status){
                    $district->status = 0;
                    $isactived = 'إلغاء' ;
                }else
                {
                    $district->status = 1;
                    $isactived = 'تفعيل' ;
                }
                $district->update();
                
                $districts = District::all()->where('user_id', '=', Auth::user()->id);
                $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
                
                //retour de la vue edit avec l'object direction et academies ...
        
                return view('admin.add_district')->with('districts',$districts)
                            ->with('directorates',$directorates)
                            ->with('district',$district)
                            ->with('status', 'لقد تم '.$isactived.' القطاع '.$district->directorate_name.' نجاح');

        }


        public function deleteDistrict($id)
        {
                //recherche par id pour la suppression
                $district = District::findOrFail($id);
                $name = $district->district_name;
                $district->delete();
                $districts = District::all()->where('user_id', '=', Auth::user()->id);
                $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');

                return view('admin.add_district')->with('status', 'لقد تم حدف القطاع '.$name.' نجاح')
                                                ->with('directorates',$directorates)
                                                ->with('districts',$districts);
    
        }
}
