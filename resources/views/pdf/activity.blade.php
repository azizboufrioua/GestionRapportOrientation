<!doctype html>
 <html dir="rtl" lang="ar">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <style>

      
      .background {
        background-color: Gainsboro;
        
      }

      .WhiteSmoke {
        background-color: WhiteSmoke;
        
      }

        table, td, td {
        
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        }

       .nolist{
         list-style: none;
        }

       .center{
          text-align: center;
        } 
        .sizeTable{
          width: 100%;
        }
      </style>
  </head>
  <body>

    
<!-- Main content -->


<div class="container-fluid">
  <!-- left column -->
  <div class="col-md-12">

        <div class="card-body">
          <div class="form-group">
           <table class="center">
             <tbody>
              <tr>
                <td colspan="5">
                  <img src="{{ asset('storage/admin/images/'.$setting->logo) }}" style="height : 100px; widtd : 400px">
    
                </td>
              </tr>
               <tr>
                <td colspan="5">
        
                   {{$setting->directorate->academy->academy_name}}<br>
                   {{$setting->directorate->directorate_name}} <br>
                  {{$setting->service_name }}<br>
                      
    
                </td>
              </tr>
              <tr>
                <td class="background" colspan="5">بطاقة زيارة </td>
              </tr>
              <tr>
                <tr class="WhiteSmoke">
                  <td>إسم الإطار</td>
                  <td> القطاع رقم  </td>
                  <td> إسم المؤسسة </td>
                  <td>التاريخ </td>
                  <td> الموسم الدراسي </td>
                </tr> 
                 <tr>
                <tr>
                  <td>  {{ Auth::user()->name }}  </td>
                  <td> {{$activity->school->district->district_name}} </td>
                  <td> {{$activity->school->school_name}} </td>
                  <td>{{$activity->activity_date}}</td>
                  <td>  {{ date('m',strtotime($activity->activity_date))  >=9  ? date('Y') .'-'. date('Y')+1  : date('Y')-1 .'-'. date('Y') }} </td>
                </tr>
            </tbody>
          </table>
          <br>
            <table class="sizeTable">
  
           <tbody>
            <tr class="center WhiteSmoke">
              <td>المحور </td>
              <td> موضوع الزيارة/ النشاط  </td>
              <td> الفئة المستهدفة</td>
              <td> عدد المستفيدين </td>
              <td>  المتدخلون</td>
            </tr> 
            <tr class="center">
              <td>
                {{$activity->axe->axe_name}}
             </td>
              <td>
                 {!! nl2br(e($activity->activity_subject)) !!} 
             </td>
         
              <td>
                {{$activity->activity_classes}}
             </td>
             <td>
              {{$activity->activity_effectif}}
             </td>
              <td>
                {{$activity->activity_contributor}}
             </td>
          
            </tr>
            <br>
            <tr>
             <td  colspan="5" class="center WhiteSmoke">توصيف النشاط</td>
           </tr>
           <tr>
             <td  colspan="5"> 
              
               {!! empty($activity->activity_description) ?  '<br><br><br>': nl2br(e($activity->activity_description)) !!}
             
             </td>
           </tr>
            <tr>
             <td  colspan="5" class="center WhiteSmoke">الصعوبات و الإكراهات</td>
           </tr>
           <tr>
             <td  colspan="5">  
              {!! empty($activity->activity_constraint) ?  '<br><br><br>': nl2br(e($activity->activity_constraint)) !!}
            
             </td>
           </tr>
          </table>
          <br>
            <table class="center sizeTable">
  
           <tbody>
  
          <tr class="WhiteSmoke">
            
           <td colspan="3" > توقيع إطار التوجيه التربوي</td>  
           <td colspan="2"> توقيع رئيس المؤسسة  </td> 
          </tr> 
        <tr>
       <td colspan="3"> <br><br><br><br> </td>
       <td colspan="2"> <br><br> </td>
      
                            
       </tr> 
   
       
       </tbody>
        </table>

  
    </div>
    <!-- /.card -->
    </div>

</div>
<!-- /.row -->

</div><!-- /.container-fluid -->


<!-- /.container-fluid -->
</section>


   

	
  </body>
</html>
      
	