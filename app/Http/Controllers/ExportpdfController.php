<?php

namespace App\Http\Controllers;

use view;
use App\Models\Setting;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ExportpdfController extends Controller
{
    //

    public function ExportpdfActivity($id) 
	{
		$activity =Activity::findOrFail($id);
		$setting = Setting::all()->where('user_id', '=', Auth::user()->id)->first();
		 $pdf = PDF::loadView('pdf.activity',  ['activity' => $activity, 'setting'=>$setting],
		 [
			'mode'                 => '',
			'format'               => 'A4',
			'default_font_size'    => '12',
			'default_font'         => 'Arial',
			'margin_left'          => 10,
			'margin_right'         => 10,
			'margin_top'           => 10,
			'margin_bottom'        => 10,
			'margin_header'        => 0,
			'margin_footer'        => 0,
			'orientation'          => 'P',
			'title'                => 'Laravel mPDF',
			'author'               => '',
			'watermark'            => '',
			'show_watermark'       => false,
			'watermark_font'       => 'Arial',
			'display_mode'         => 'fullpage',
			'watermark_text_alpha' => 0.1,
			'custom_font_dir'      => '',
			'custom_font_data' 	   => [],
			'auto_language_detection'  => false,
			'temp_dir'               => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
			'pdfa' 			=> false,
				'pdfaauto' 		=> false,
		]);
		 return $pdf->stream('activity.pdf');
	}    //

    public function ExportpdfReport(Request $request) 
	{
		

		$activitiesByAxe = Activity::all()->where('user_id', '=', Auth::user()->id)
											->where('year', '=', $request->year)
											->where('month', '=', '0'.$request->month)
											->groupBy('axe_id');


		$setting = Setting::all()->where('user_id', '=', Auth::user()->id)->first();
		 $pdf = PDF::loadView('pdf.report_axe',  ['activitiesByAxe' => $activitiesByAxe, 'setting'=>$setting]);
		//  dd($activitiesByAxe); 
		 return $pdf->stream('activity.pdf');
	}

    public function ExportpdfReportCommun(Request $request) 
	{
		$activitiesByAxe = Activity::all()->where('user_id', '=', Auth::user()->id)
											->where('year', '=', $request->year)
											->where('month', '=', '0'.$request->month)
											->groupBy('axe_id');
		$setting = Setting::all()->where('user_id', '=', Auth::user()->id)->first();

		 $pdf = PDF::loadView('pdf.report_axe_commun',    ['activitiesByAxe' => $activitiesByAxe, 'setting'=>$setting]);
		 return $pdf->stream('activity.pdf');
	}

    public function ExportpdfActivityDay(Request $request) 
	{
		list($year, $month, $day) = explode("-", $request->activity_date);
		$activities = Activity::all()->where('user_id', '=', Auth::user()->id)
											->where('year', '=', $year)
											->where('month', '=', $month)
											->where('day', '=', $day)
											->where('school_id', '=', $request->school_id);
		$setting = Setting::all()->where('user_id', '=', Auth::user()->id)->first();

		 $pdf = PDF::loadView('pdf.activityDay',    ['activities' => $activities, 'setting'=>$setting]);
		 return $pdf->stream('activity.pdf');
	}

    public function voirpdfActivity($id) 
	{
		$activity =Activity::findOrFail($id);
		 return view('pdf.activity');
	}
}
