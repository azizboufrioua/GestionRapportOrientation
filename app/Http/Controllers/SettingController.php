<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\Setting;
use App\Models\Directorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    
    public function addsettings()
    {

      $setting = Setting::all()->where('user_id', '=', Auth::user()->id)->first();

      $status = 'الإعدادات مثبة بنجاح';

      if (is_null($setting))
        {
          $setting = new Setting();
          $setting->service_name = null;
          $setting->academy_id = 2;
          $setting->directorate_id = null;
          $setting->logo = 'logo.png';
          $status = 'يجب تثبيت الإعدادات ';
        }

      $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
      $academies = Academy::all()->where('status',1)->where('user_id', '=', Auth::user()->id)->pluck('academy_name','id');
     
      return view('profile.settings')->with('status',  $status)
                                  ->with('academies',$academies)
                                  ->with('setting',$setting)
                                  ->with('directorates',$directorates);
                                  
    } 



    public function saveSetting(Request $request)
    {
           
      $setting = Setting::all()->where('user_id', '=', Auth::user()->id)->first();   
      if (is_null($setting))
      {
                
                $this->validate($request,['service_name'=>'required',
                'directorate_id'=>'required',
                'academy_id'=>'required',
                'logo'=>'image|nullable|max:1999']);
        
                if ($request->hasFile('logo')) {
                    
                            // dossier d'upload
                            $imageDirectory = 'public/admin/images/';
                            //le nom de l'image ou fichier avec extension
                            $fileNamewhitExt = $request->file('logo')->getClientOriginalName();
                            //l'extension du fichier ou image
                            $fileExt = $request->file('logo')->getClientOriginalExtension();
                            //extaire le nom uniquement
                            $fileName = pathinfo($fileNamewhitExt,PATHINFO_FILENAME);
        
                            //variable de nom a enregister dans la base de donnée
                            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
        
                            $path = $request->file('logo')->storeAs($imageDirectory, $fileNameToStore);
        
        
                            print('notre image : '. $fileNameToStore. ' d\'extension : '.$fileExt);
                } else {
                    # code...
                    print('image non seléctionné');
                     //variable de nom a enregister dans la base de donnée
                     $fileNameToStore = 'logo.png';
                }
                
              
              
                    $setting = new Setting();
                    $setting->user_id =  Auth::user()->id;
                    $setting->service_name = $request->service_name;
                    $setting->academy_id =  $request->academy_id;
                    $setting->directorate_id =  $request->directorate_id;
                    $setting->logo = $fileNameToStore;
                    $setting->save();
           
          
                    
                $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
                $academies = Academy::all()->where('status',1)->where('user_id', '=', Auth::user()->id)->pluck('academy_name','id');

                        return view('profile.settings')
                        ->with('academies',$academies)
                        ->with('setting',$setting)
                        ->with('directorates',$directorates)
                        ->with('status', 'تم تثبيت الإعدادات بنجاح');

        }else{
                
                $this->validate($request,['service_name'=>'required',
                'directorate_id'=>'required',
                'academy_id'=>'required',
                'logo'=>'image|nullable|max:1999']);

                print('edit '.$setting->id);

                $setting = Setting::findOrFail($setting->id);

                if ($request->hasFile('logo')) {
                

                  // dossier d'upload
                  $imageDirectory = 'public/admin/images/';
                  //suppression de l'encienne image
                   
                   if($setting->logo != 'logo.png')
                   {
                      Storage::delete($imageDirectory.'/'.$setting->logo);
                   }
                    
                            // dossier d'upload
                            $imageDirectory = 'public/admin/images/';
                            //le nom de l'image ou fichier avec extension
                            $fileNamewhitExt = $request->file('logo')->getClientOriginalName();
                            //l'extension du fichier ou image
                            $fileExt = $request->file('logo')->getClientOriginalExtension();
                            //extaire le nom uniquement
                            $fileName = pathinfo($fileNamewhitExt,PATHINFO_FILENAME);
        
                            //variable de nom a enregister dans la base de donnée
                            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
        
                            $path = $request->file('logo')->storeAs($imageDirectory, $fileNameToStore);
        
        
                            print('notre image : '. $fileNameToStore. ' d\'extension : '.$fileExt);
                } else {
                    # code...
                    print('image non seléctionné');
                     //variable de nom a enregister dans la base de donnée
                     $fileNameToStore = 'logo.png';
                }
                

                    $setting->user_id =  Auth::user()->id;
                    $setting->service_name = $request->service_name;
                    $setting->academy_id =  $request->academy_id;
                    $setting->directorate_id =  $request->directorate_id;
                    $setting->logo = $fileNameToStore;
                    $setting->update();
           
          
                    
            $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
            $academies = Academy::all()->where('status',1)->where('user_id', '=', Auth::user()->id)->pluck('academy_name','id');

                    return view('profile.settings')
                    ->with('academies',$academies)
                    ->with('setting',$setting)
                    ->with('directorates',$directorates)
                    ->with('status', 'تم تثبيت الإعدادات بنجاح');

        }
    }  


    
}
