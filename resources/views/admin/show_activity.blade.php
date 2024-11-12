@extends('layout.layout_admin.admin')

@section('title')
تدبير الأشطة
@endsection

@section('content')
    
	<!-- Main content -->
<h2 class="mb-4">تدبير الأنشطة</h2>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
        @foreach ($errors->all() as $error )
        <li>{{$error}}</li>
        @endforeach
          

        </div>
        @endif

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
            {{ session()->put('status',null
            ) }}

        </div>
        @endif

		 <!-- Main content -->
     <section class="content">

      
	
      <div class="container-fluid">
           <div class="row">
             <!-- left column -->
             <div class="col-md-12">
               <!-- jquery validation -->
               <div class="card card-primary">
                 <div class="card-header">
                   <h3 class="card-title">إضافة نشاط</small></h3>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                  {!!Form::open(['action' => 'App\Http\Controllers\ActivityController@saveActivity','method'=>'POST','class'=>'form-horizontal',
                    'enctype'=>'multipart/form-data'])!!}
                   {{csrf_field()}}
                   <div class="card-body">
                     <div class="form-group">
                      <table class="table table-bordered text-center">
                        <tbody>
                         <tr>
                           <td colspan="5">
                             <img src="{{ asset('storage/admin/images/'.$setting->logo) }}" style="height : 180px; width : 400px">
               
                           </td>
                         </tr>
                          <tr>
                           <th colspan="5">
                               <ul class="nolist">
                                   <li> {{$setting->directorate->academy->academy_name}}</li>
                                   <li> {{$setting->directorate->directorate_name}} </li>
                                   <li>{{$setting->service_name }}</li>

                               </ul>
               
                           </th>
                         </tr>
                         <tr>
                           <th  colspan="5">بطاقة زيارة </th>
                         </tr>
                         <tr>
                           <th>اسم المستشار في التوجيه :عزيز بوفريوا</th>
                           <th> {{$activity->school->district->district_name}} </th>
                           <th> {{$activity->school->school_name}} </th>
                           <th>{{$activity->activity_date}}</th>
                           <th>  {{ date('m',strtotime($activity->activity_date))  >=9  ? date('Y') .'-'. date('Y')+1  : date('Y')-1 .'-'. date('Y') }}  </th>
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
                         <td> {{$activity->axe->axe_name}} </td>
                         <td> {!! nl2br(e($activity->activity_subject)) !!} </td>
                         <td> {{$activity->activity_classes}} </td>
                         <td> {{$activity->activity_effectif}}</td>
                         <td> {{$activity->activity_contributor }}</td>
                       </tr>
                       <br>
                       <tr>
                        <th  colspan="5">توصيف النشاط</th>
                      </tr>
                      <tr>
                        <td  colspan="5">  {!! nl2br(e($activity->activity_description)) !!} </td>
                      </tr>
                       <tr>
                        <th  colspan="5">الصعوبات و الإكراهات</th>
                      </tr>
                      <tr>
                        <td  colspan="5">  
                       {!! nl2br(e($activity->activity_constraint)) !!} 

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
                   </table>

                   <!-- /.card-body -->
                   <div class="card-footer ">
                     <div class="col-md-12 bg-right text-right">
                      
                      <button type="button" class="btn btn-primary btn-lg btn-block">
                        <a href="{{url('/view_activity_pdf/'.$activity->id)}}" class="btn  btn-info ">
                          <i class="nav-icon fas fa-print"></i>
                        </a>
                      </button>

                   </div>
                   </div>
               </div>
               <!-- /.card -->
               </div>
         
           </div>
           <!-- /.row -->
       
     </div><!-- /.container-fluid -->


     <!-- /.container-fluid -->
   </section>
	
@endsection

@section('scripts')

<script>
function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
}
</script>
@endsection

