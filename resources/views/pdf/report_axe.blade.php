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

        table, td, td,thead {
        
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
                <td colspan="3">
                  <img src="{{ asset('storage/admin/images/'.$setting->logo) }}"style="height : 90px; widtd : 210px">
    
                </td>
              </tr>
               <tr>
                <td colspan="3">
        
          

           @foreach ($activitiesByAxe as $activityByAxe)
              @if ($loop->first)
                   @foreach ($activityByAxe as $activity)

                       @if ($loop->first)
                       {{$setting->directorate->academy->academy_name}}<br>
                       {{$setting->directorate->directorate_name}} <br>
                       {{$setting->service_name }}<br>
                
                            </td>
                          </tr>
                      
                          
                            <tr class="background">
                              <td>إسم الإطار</td>
                              <td> القطاع رقم  </td>
                              <td> الموسم الدراسي </td>
                            </tr> 
                            <tr>
                            <tr>
                              <td>  {{ Auth::user()->name }}   </td>
                              <td> {{$activity->school->district->district_name}} </td>
                              <td>  {{ date('m',strtotime($activity->activity_date))  >=9  ? date('Y') .'-'. date('Y')+1  : date('Y')-1 .'-'. date('Y') }} </td>
                            </tr>
                        </tbody>
                      </table>
                      @endif
                @endforeach
          @endif
          @endforeach
          <br>

    	


    <table>
        <tr class="background">
          <td>محور النشاط</td>
          <td  >عنوان النشاط</td>
          <td >المؤسسة</td>
          <td  >تاريخ الانجاز</td>
          <td  >الفئة المستهدفة</td>
          <td > عدد المستفيدين </td>
        </tr>
      <tbody>
     


          @foreach ($activitiesByAxe as $activityByAxe)
          {{-- {{count($activityByAxe)}}         <td  rowspan="{{count($activityByAxe)}}">
                    الحور
                  </td>--}}
                  @php
                  $first = true;
                  @endphp
                  @foreach ($activityByAxe as $activity)
                  <tr scope="row">

                    @if ($first)
                    <td  class="WhiteSmoke" rowspan="{{count($activityByAxe)}}">{{$activity->axe->axe_name}}</td>
                    <td> {!! nl2br(e($activity->activity_subject)) !!}</td>
                    <td>{{$activity->school->school_name}}</td>
                    @php
                    $activity_date =  implode('-',array($activity->year,$activity->month,$activity->day)); 
                    @endphp
                    <td>{{$activity_date}}</td>
                    <td>{{$activity->activity_classes}}</td>
                    <td>{{$activity->activity_effectif}}</td>
                    @php
                    $first = false;
                    @endphp
                    @else
                    <td> {!! nl2br(e($activity->activity_subject)) !!}</td>
                    <td>{{$activity->school->school_name}}</td>
                    @php
                    $activity_date =  implode('-',array($activity->year,$activity->month,$activity->day)); 
                    @endphp
                    <td>{{$activity_date}}</td>
                    <td>{{$activity->activity_classes}}</td>
                    <td>{{$activity->activity_effectif}}</td>
                    @endif
              
                    
                  </tr>
                  @endforeach

                
            
                  
          @endforeach

                
      </tbody>
    </table>


    <br>
    <table class="center sizeTable">

   <tbody>

  <tr>
    
   <td colspan="6" > توقيع إطار التوجيه التربوي</td>  
  </tr> 
<tr>
<td colspan="6"> <br><br><br><br> </td>

                    
</tr> 


</tbody>
</table>
	
</body>
</html>
      