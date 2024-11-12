<?php

namespace App\Http\Controllers;

use App\Models\Axe;
use App\Models\School;
use App\Models\Academy;
use App\Models\Advisor;
use App\Models\Setting;
use App\Models\Activity;
use App\Models\Directorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    //

    public function addActivity(){
           
       // $activitiesByAxe = Activity::whereMonth('activity_date', '=',  date('m'))->groupby('axe_id')->get()->pluck('activity_subject','activity_description', 'axe_id');
       $activitiesByAxe = Activity::all()->where('user_id', '=', Auth::user()->id)->groupBy('axe_id');


       // $activities = Activity::all()->where('user_id', '=', Auth::user()->id)->whereMonth('activity_date', '=', date('m'));
        $activities = Activity::all()->where('user_id', '=', Auth::user()->id)->where('month', '=', date('m'));
        $advisors = Advisor::all()->where('user_id', '=', Auth::user()->id)->pluck('advisor_name','id');

        $schools = School::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('school_name','id');
        $axes = Axe::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('axe_name','id');
         return view('admin.add_activity')
         ->with('activities',$activities)
         ->with('schools',$schools)
         ->with('advisors',$advisors)
         ->with('axes',$axes)
         ->with('activitiesByAxe',$activitiesByAxe);
    }

    



    public function saveActivity(Request $request)
    {
          
        //Validation du formulaire 
       $this->validate($request,['activity_subject'=>'required',
                                    'school_id'=>'required',
                                    'axe_id'=>'required',
                                    'activity_date'=>'required']);
        // id	activity_subject	activity_description	activity_classes
        //	activity_effectif	activity_contributor
        //	activity_constraint 	school_id	axe_id	activity_date

        // Exemple 2
            list($year, $month, $day) = explode("-", $request->activity_date);
        

        //methode 1 save
        $activity = new Activity();
        //$activity->activity_subject =  nl2br($request->activity_subject);
        $activity->activity_subject =  $request->activity_subject;
        $activity->activity_description =  $request->activity_description;
        // $activity->activity_classes =  $request->activity_classes;
        // $activity->activity_effectif =  $request->activity_effectif;
        $activity->activity_classes =  (is_null($request->activity_classes)) ?  0 : $request->activity_classes ;  
        $activity->activity_effectif =   (is_null($request->activity_effectif)) ?  0 : $request->activity_effectif; 
        $activity->activity_contributor =  $request->activity_contributor;
        $activity->activity_constraint =  $request->activity_constraint;
        $activity->school_id =  $request->school_id;
        $activity->axe_id =  $request->axe_id;
        $activity->year =  $year;
        $activity->month =  $month;
        $activity->day =  $day;
        $activity->user_id = Auth::user()->id;

        $activity->save();



           // $activitiesByAxe = Activity::whereMonth('activity_date', '=',  date('m'))->groupby('axe_id')->get()->pluck('activity_subject','activity_description', 'axe_id');
           $activitiesByAxe = Activity::all()->where('user_id', '=', Auth::user()->id)->groupBy('axe_id');


           // $activities = Activity::all()->where('user_id', '=', Auth::user()->id)->whereMonth('activity_date', '=', date('m'));
           $activities = Activity::all()->where('user_id', '=', Auth::user()->id)->where('month', '=', date('m'));
           $advisors = Advisor::all()->where('user_id', '=', Auth::user()->id)->pluck('advisor_name','id');
    
            $schools = School::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('school_name','id');
            $axes = Axe::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('axe_name','id');
             return view('admin.add_activity')
             ->with('status', 'لقد تم إضافة النشاط '.$request->activity_name.' نجاح')
             ->with('activities',$activities)
             ->with('schools',$schools)
             ->with('advisors',$advisors)
             ->with('axes',$axes)
              ->with('activity',$activity )
             ->with('activitiesByAxe',$activitiesByAxe);
    } 

    public function edit($id)
    {

        
            //recherche par id pour l'affichage
            $activity = activity::findOrFail($id);
            //retour de la vue edit avec l'object produit


            // $activitiesByAxe = Activity::whereMonth('activity_date', '=',  date('m'))->groupby('axe_id')->get()->pluck('activity_subject','activity_description', 'axe_id');
              $activitiesByAxe = Activity::all()->where('user_id', '=', Auth::user()->id)->groupBy('axe_id');


              $activities = Activity::all()->where('user_id', '=', Auth::user()->id)->where('month', '=', date('m'));

        $advisors = Advisor::all()->where('user_id', '=', Auth::user()->id)->pluck('advisor_name','id');

        $schools = School::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('school_name','id');
        $axes = Axe::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('axe_name','id');
         return view('admin.edit_activity')
         ->with('activities',$activities)
         ->with('schools',$schools)
         ->with('advisors',$advisors)
         ->with('axes',$axes)
          ->with('activity',$activity )
         ->with('activitiesByAxe',$activitiesByAxe);
    }


    public function editActivity(Request $request, $id)
    {
        list($year, $month, $day) = explode("-", $request->activity_date);
            //recherche par id pour l'update
            $activity = Activity::findOrFail($id);
            $activity->activity_subject =  $request->activity_subject;
            $activity->activity_description =  $request->activity_description;
            $activity->activity_classes =  ($request->has('activity_classes')) ? $request->activity_classes : 0;  
            $activity->activity_effectif =   ($request->has('activity_effectif')) ? $request->activity_effectif  : 0;  
            $activity->activity_contributor =  $request->activity_contributor;
            $activity->activity_constraint =  $request->activity_constraint;
            $activity->school_id =  $request->school_id;
            $activity->axe_id =  $request->axe_id;
            $activity->year =  $year;
            $activity->month =  $month;
            $activity->day =  $day;
            $activity->update();
         


                      // $activitiesByAxe = Activity::whereMonth('activity_date', '=',  date('m'))->groupby('axe_id')->get()->pluck('activity_subject','activity_description', 'axe_id');
                      $activitiesByAxe = Activity::all()->where('user_id', '=', Auth::user()->id)->groupBy('axe_id');


                      // $activities = Activity::all()->where('user_id', '=', Auth::user()->id)->whereMonth('activity_date', '=', date('m'));
                      $activities = Activity::all()->where('user_id', '=', Auth::user()->id)->where('month', '=', date('m'));
                      $advisors = Advisor::all()->where('user_id', '=', Auth::user()->id)->pluck('advisor_name','id');
               
                       $schools = School::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('school_name','id');
                       $axes = Axe::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('axe_name','id');
                       return back()->with('status', 'لقد تم تعديل النشاط '.$request->activity_name.' نجاح')
                        ->with('activities',$activities)
                        ->with('schools',$schools)
                        ->with('advisors',$advisors)
                        ->with('axes',$axes)
                         ->with('activity',$activity )
                        ->with('activitiesByAxe',$activitiesByAxe);

    } 


    public function activerActivity($id)
    {
            $isactived = 'تفعيل' ;
            //recherche par id pour la suppression
            $activity = Activity::findOrFail($id);
            if($activity->status){
                $activity->status = 0;
                $isactived = 'إلغاء' ;
            }else
            {
                $activity->status = 1;
                $isactived = 'تفعيل' ;
            }
            $activity->update();
            $activities = Activity::all()->where('user_id', '=', Auth::user()->id)->where('month', '=', date('m'));
            // $activitiesByAxe = Activity::whereMonth('activity_date', '=',  date('m'))->groupby('axe_id')->get()->pluck('activity_subject','activity_description', 'axe_id');
                $activitiesByAxe = Activity::all()->where('user_id', '=', Auth::user()->id)->groupBy('axe_id');


                // $activities = Activity::all()->where('user_id', '=', Auth::user()->id)->whereMonth('activity_date', '=', date('m'));
                 $activities = Activity::whereMonth('month', '=',  date('m'))->orderby('axe_id')->get();
                 $advisors = Advisor::all()->where('user_id', '=', Auth::user()->id)->pluck('advisor_name','id');
         
                 $schools = School::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('school_name','id');
                 $axes = Axe::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('axe_name','id');
                 return view('admin.add_activity')->with('status', 'لقد تم '.$isactived.' النشاط '.$activity->activity_name.' نجاح')
                  ->with('activities',$activities)
                  ->with('schools',$schools)
                  ->with('advisors',$advisors)
                  ->with('axes',$axes)
                   ->with('activity',$activity )
                  ->with('activitiesByAxe',$activitiesByAxe);

    }


    public function showActivity($id)
    { 

        $setting = Setting::all()->where('user_id', '=', Auth::user()->id)->first();

        if (is_null($setting))
        {
          $setting = new Setting();
          $setting->service_name = null;
          $setting->academy_id = 2;
          $setting->directorate_id = null;
          $setting->logo = 'logo.png';
          $status = 'يجب تثبيت الإعدادات ';
          $directorates = Directorate::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('directorate_name','id');
          $academies = Academy::all()->where('status',1)->where('user_id', '=', Auth::user()->id)->pluck('academy_name','id');
         
          return view('profile.settings')->with('status',  $status)
                                      ->with('academies',$academies)
                                      ->with('setting',$setting)
                                      ->with('directorates',$directorates);

        }else
        {
            
                //recherche par id pour la suppression
                $activity = Activity::findOrFail($id);
                return view('admin.show_activity')
                        ->with('setting',$setting)
                        ->with('activity',$activity );

        }


    }
    public function deleteActivity($id)
    {
            //recherche par id pour la suppression
            $activity = Activity::findOrFail($id);
            $name = $activity->activity_subject;
            $activity->delete();
            
            

                      // $activitiesByAxe = Activity::whereMonth('activity_date', '=',  date('m'))->groupby('axe_id')->get()->pluck('activity_subject','activity_description', 'axe_id');
                      $activitiesByAxe = Activity::all()->where('user_id', '=', Auth::user()->id)->groupBy('axe_id');


                      $activities = Activity::all()->where('user_id', '=', Auth::user()->id)->where('month', '=', date('m'));

                       $advisors = Advisor::all()->where('user_id', '=', Auth::user()->id)->pluck('advisor_name','id');
               
                       $schools = School::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('school_name','id');
                       $axes = Axe::all()->where('user_id', '=', Auth::user()->id)->where('status',1)->pluck('axe_name','id');

                      // return back()->with('status', 'لقد تم حدف النشاط '.$name.' نجاح');
                       return view('admin.add_activity')->with('status', 'لقد تم حدف النشاط '.$name.' نجاح')
                        ->with('activities',$activities)
                        ->with('schools',$schools)
                        ->with('advisors',$advisors)
                        ->with('axes',$axes)
                         ->with('activity',$activity )
                        ->with('activitiesByAxe',$activitiesByAxe);

   
    }


}
