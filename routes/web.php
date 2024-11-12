<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AxeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\AcademyController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ExportpdfController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\DirectorateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route Admin part

// Route::get('/', function () {
//     return  view('auth.login');
// });

Route::redirect('/', '/dashboard');


Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard')
->middleware(['auth','verified']);


Route::view('/profile/edit', 'profile.edit')->name('profile_edit')->middleware('auth');
Route::view('/profile/password', 'profile.password')->name('profile_password')->middleware('auth');

Route::get('/settings',[SettingController::class,'addsettings'])->name('settings')->middleware(['auth','verified']);
Route::post('/saveSetting',[SettingController::class,'saveSetting'])->name('saveSetting')->middleware(['auth','verified']);

//profile.settings
//Route Admin part academies

Route::get('/addacademy',[AcademyController::class,'addacademy'])->name('addacademy')->middleware(['auth','verified']);
Route::post('/saveAcademy',[AcademyController::class,'saveAcademy'])->name('saveAcademy')->middleware(['auth','verified']);
Route::get('/edit_academy/{id}',[AcademyController::class,'edit'])->name('edit_academy')->middleware(['auth','verified']);
Route::post('/editAcademy/{id}',[AcademyController::class,'editAcademy'])->name('editAcademy')->middleware(['auth','verified']);
Route::get('/activer_academy/{id}',[AcademyController::class,'activerAcademy'])->name('activerAcademy')->middleware(['auth','verified']);
Route::get('/delete_academy/{id}',[AcademyController::class,'deleteAcademy'])->name('deleteAcademy')->middleware(['auth','verified']);



//Route Admin part directorate

//Route Admin part directorate
Route::get('/adddirectorate',[DirectorateController::class,'adddirectorate'])->name('adddirectorate')->middleware(['auth','verified']);
Route::post('/saveDirectorate',[DirectorateController::class,'saveDirectorate'])->name('saveDirectorate')->middleware(['auth','verified']);
Route::get('/edit_directorate/{id}',[DirectorateController::class,'edit'])->name('edit_directorate')->middleware(['auth','verified']);
Route::post('/editdirectorate/{id}',[DirectorateController::class,'editDirectorate'])->name('editdirectorate')->middleware(['auth','verified']);
Route::get('/delete_directorate/{id}',[DirectorateController::class,'deleteDirectorate'])->name('deleteDirectorate')->middleware(['auth','verified']);
Route::get('/activer_directorate/{id}',[DirectorateController::class,'activerDirectorate'])->name('activerDirectorate')->middleware(['auth','verified']);


//Route Admin part District
Route::get('/adddistrict',[DistrictController::class,'adddistrict'])->name('adddistrict')->middleware(['auth','verified']);
Route::post('/saveDistrict',[DistrictController::class,'saveDistrict'])->name('saveDistrict')->middleware(['auth','verified']);
Route::get('/edit_district/{id}',[DistrictController::class,'edit'])->name('edit_district')->middleware(['auth','verified']);
Route::post('/editdistrict/{id}',[DistrictController::class,'editDistrict'])->name('editdistrict')->middleware(['auth','verified']);
Route::get('/delete_district/{id}',[DistrictController::class,'deleteDistrict'])->name('deleteDistrict')->middleware(['auth','verified']);
Route::get('/activer_district/{id}',[DistrictController::class,'activerDistrict'])->name('activerDistrict')->middleware(['auth','verified']);



Route::get('/adddiscipline',[DisciplineController::class,'adddiscipline'])->name('adddiscipline')->middleware(['auth','verified']);
Route::get('/saveDiscipline',[DisciplineController::class,'saveDiscipline'])->name('saveDiscipline')->middleware(['auth','verified']);



Route::get('/addSchool',[SchoolController::class,'addSchool'])->name('addSchool')->middleware(['auth','verified']);
Route::post('/saveSchool',[SchoolController::class,'saveSchool'])->name('saveSchool')->middleware(['auth','verified']);
Route::get('/delete_school/{id}',[SchoolController::class,'deleteSchool'])->name('deleteSchool')->middleware(['auth','verified']);
Route::get('/activer_school/{id}',[SchoolController::class,'activerSchool'])->name('activerSchool')->middleware(['auth','verified']);
Route::get('/edit_school/{id}',[SchoolController::class,'edit'])->name('edit_school')->middleware(['auth','verified']);
Route::post('/editschool/{id}',[SchoolController::class,'editSchool'])->name('editSchool')->middleware(['auth','verified']);



Route::get('/addAxe',[AxeController::class,'addAxe'])->name('addAxe')->middleware(['auth','verified']);
Route::post('/saveAxe',[AxeController::class,'saveAxe'])->name('saveAxe')->middleware(['auth','verified']);
Route::get('/delete_axe/{id}',[AxeController::class,'deleteAxe'])->name('deleteAxe')->middleware(['auth','verified']);
Route::get('/activer_axe/{id}',[AxeController::class,'activerAxe'])->name('activerAxe')->middleware(['auth','verified']);
Route::get('/edit_axe/{id}',[AxeController::class,'edit'])->name('edit_axe')->middleware(['auth','verified']);
Route::post('/editAxe/{id}',[AxeController::class,'editAxe'])->name('editAxe')->middleware(['auth','verified']);


Route::get('/addActivity',[ActivityController::class,'addActivity'])->name('addActivity')->middleware(['auth','verified']);
Route::post('/saveActivity',[ActivityController::class,'saveActivity'])->name('saveActivity')->middleware(['auth','verified']);
Route::get('/delete_activity/{id}',[ActivityController::class,'deleteActivity'])->name('deleteActivity')->middleware(['auth','verified']);
Route::get('/activer_activity/{id}',[ActivityController::class,'activerActivity'])->name('activerActivity')->middleware(['auth','verified']);
Route::get('/edit_activity/{id}',[ActivityController::class,'edit'])->name('edit_Activity')->middleware(['auth','verified']);
Route::post('/editActivity/{id}',[ActivityController::class,'editActivity'])->name('editActivity')->middleware(['auth','verified']);
Route::get('/show_activity/{id}',[ActivityController::class,'showActivity'])->name('show_activity')->middleware(['auth','verified']);


//Route::get('/view_activity_pdf/{id}',[PdfController::class,'generate_pdf'])->name('view_activity_pdf')->middleware(['auth','verified']);
Route::get('/view_activity_pdf/{id}',[ExportpdfController::class,'ExportpdfActivity'])->name('view_activity_pdf')->middleware(['auth','verified']);
Route::post('/view_activity_day_pdf/',[ExportpdfController::class,'ExportpdfActivityDay'])->name('view_activity_day_pdf')->middleware(['auth','verified']);
Route::post('/view_report_pdf',[ExportpdfController::class,'ExportpdfReport'])->name('view_report_pdf')->middleware(['auth','verified']);
Route::post('/view_report_commun_pdf/',[ExportpdfController::class,'ExportpdfReportCommun'])->name('view_report_commun_pdf')->middleware(['auth','verified']);
Route::post('/view_report_commun_from_to_pdf/',[ExportpdfController::class,'ExportpdfReportCommunFromTo'])->name('view_report_commun_from_to_pdf')->middleware(['auth','verified']);


Route::get('/show_report/{id}',[ReportController::class,'showReport'])->name('show_report')->middleware(['auth','role:admin']);
// Route::get('/show_report/{id}',[ReportController::class,'showReport'])->name('show_report')->middleware(['auth','verified']);






