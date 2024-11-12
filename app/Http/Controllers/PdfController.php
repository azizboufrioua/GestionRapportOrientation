<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Activity;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use SebastianBergmann\Type\Exception;


class PdfController extends Controller
{
    //
   

    function generate_pdf($id) {
      $activity =  (array)  Activity::findOrFail($id);

      $pdf = FacadePdf::loadView('admin.show_activity_pdf', $activity);
      
      return $pdf->download('invoice.pdf');;
    }
    
    public function view_activity_pdf($id){

       // Session::put('id', $id);

        try{

            $dompdf = new Dompdf();
            $options = $dompdf->getOptions();
            $options->setDefaultFont('Courier');
            $dompdf->setOptions($options);
            $pdf = App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html($id));

            return $pdf->stream();
        }
        catch(Exception $e){
            return redirect('/show_activity/'.$id)->with('error', $e->getMessage());
        }
    }

    public function convert_orders_data_to_html($id){

         $activity = Activity::findOrFail($id);

     


        $output = '<!DOCTYPE html>

        <html>
          <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

          <link rel="stylesheet" href="admin/css/rapportstyle.css">
          </head>
          <body>
            <table border="1">
              <tr>
                <th>Mois</th>
                <th>Data</th>
              </tr>
              <tr>
                <td>Janvier</td>
                <td>10.01.2014</td>
              </tr>
              <tr>
                <td>مارس</td>
                <td>10.01.2014</td>
              </tr>
            </table>
          </body>
        </html>          
        
         ';


        return $output;
 
    }
    public function convert_orders_data_to_html1($id){

         $activity = Activity::findOrFail($id);

     


        $output = '<link rel="stylesheet" href="frontend/css/style.css">
                      
        <table class="table table-bordered text-center">
        <tbody>
         <tr>
           <td colspan="5">
             <img src="{{ asset(\'/admin/images/logo.png\')}}" style="height : 100px; width : 400px">

           </td>
         </tr>
          <tr>
           <th colspan="5">
               <ul class="nolist">
                   <li>'.$activity->school->district->directorate->academy->academy_name.'</li>
                   <li> '.$activity->school->district->directorate->directorate_name.' </li>
                   <li>مصلحة تأطير المؤسسات التعليمية والتوجيه  </li>

               </ul>

           </th>
         </tr>
         <tr>
           <th  colspan="5">بطاقة زيارة </th>
         </tr>
         <tr>
           <th>اسم المستشار في التوجيه :عزيز بوفريوا</th>
           <th> '.$activity->school->district->district_name.' </th>
           <th> '.$activity->school->school_name.' </th>
           <th>'.$activity->activity_date.'</th>
           <th> الموسم الدراسي :  '. date('m') >=9  ? date('Y') .'-'. date('Y')+1  : date('Y')-1 .'-'. date('Y') .' </th>
         </tr>
       </tbody>
     </table>


     <table class="table table-bordered text-center">
      <tbody>
       <tr>
         <th>المحور </th>
         <th> موضوع الزيارة/ النشاط  </th>
         <th> الفئة المستهدفة</th>
         <th> عدد المستفيدين </th>
         <th>  المتدخلون</th>
       </tr> 
       <tr>
         <td> '.$activity->axe->axe_name.' </td>
         <td> '. nl2br(e($activity->activity_subject)) .'</td>
         <td> '.$activity->activity_classes.' </td>
         <td> '.$activity->activity_effectif.'</td>
         <td> '.$activity->activity_contributor .'</td>
       </tr>
       <br>
       <tr>
        <th  colspan="5">توصيف النشاط</th>
      </tr>
      <tr>
        <td  colspan="5">  '. nl2br(e($activity->activity_description)) .' </td>
      </tr>
       <tr>
        <th  colspan="5">الصعوبات و الإكراهات</th>
      </tr>
      <tr>
        <td  colspan="5">  
       '. nl2br(e($activity->activity_constraint)) .' 

        </td>
      </tr>

     </tbody>
   </table>
 

   <table class="table table-bordered text-center">
    <tbody>
     <tr>
      <th  > توقيع إطار التوجيه التربوي</th>  
      <th > توقيع رئيس المؤسسة  </th> 
     </tr> 
   <tr>
  <td> <br> </td>
  <td> <br><br> </td>
 
                       
  </tr> 

  
  </tbody>
   </table>';


        return $output;
 
    }
}
