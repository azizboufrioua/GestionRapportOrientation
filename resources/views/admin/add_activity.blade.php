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
                           <th>
                            {{ Form::label('advisor_id', 'اسم المستشار في التوجيه :')}}
                            {{ Form::label('advisor_id', Auth::user()->name,['class'=>'form-control'])}}
                            {{-- {{Form::text('advisor_name', ,['class'=>'form-control'])}} --}}

                           </th>
                           <th> 
                                <div class="form-group">
                                  {{ Form::label('school_id', ' المؤسسة :')}}
                                  {{ Form::select('school_id', $schools, null, ['class' => 'form-control select2'])}}
                                </div>
                             </th>
                           <th>
                                <div class="form-group">
                                  {{ Form::label('activity_date', ' تاريخ الزيارة :')}}
                                  {{ Form::date('activity_date', Carbon\Carbon::now(), ['class' => 'form-control']) }}
                                </div>
                           </th>
                           <th>  
                            {{ Form::label('activity_effectif', 'عدد المستفيدين')}}
                            {{Form::text('activity_effectif','',['placeholder'=>'  عدد المستفيدين  ','class'=>'form-control'])}}
                          </th>
                         </tr>
                       </tbody>
                     </table>


                     <table class="table table-bordered text-center">
                      <tbody>
                       <tr>
                         <th>المحور </th>
                         <th> موضوع الزيارة/ النشاط  </th>
                         <th> الفئة المستهدفة</th>
                         <th>  المتدخلون</th>
                       </tr> 
                       <tr>
                         <td>
                          
                          {{ Form::select('axe_id', $axes, null, ['class' => 'form-control select2'])}}
                        
                        </td>
                         <td> 
                          {!! Form::textarea('activity_subject',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                          </td>

                         <td>
                          {!! Form::textarea('activity_classes',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                        </td>

                         <td> 
                            {!! Form::textarea('activity_contributor',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                         </td>

                       </tr>
                       <br>
                       <tr>
                        <th  colspan="4">توصيف النشاط</th>
                      </tr>
                      <tr>
                        <td  colspan="4">
                          
                          {!! Form::textarea('activity_description',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}

                        </td>
                      </tr>
                       <tr>
                        <th  colspan="4">الصعوبات و الإكراهات</th>
                      </tr>
                      <tr>
                        <td  colspan="4">  

                         {!! Form::textarea('activity_constraint',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}

                        </td>
                      </tr>
                     </tbody>
                   </table>

                     

                        </div>
                   </div>

                   <!-- /.card-body -->
                   <div class="card-footer ">
                     <div class="col-md-12 bg-right text-right">
                      {{Form::submit('حفظ',['class'=>'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}
                   </div>
                   </div>
               </div>
               <!-- /.card -->
               </div>
         
           </div>
           <!-- /.row -->
       
     </div><!-- /.container-fluid -->


 
 
 <br>
     <div class="container-fluid">
   
       <div class="row">
         <div class="col-12">
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">  لائحة أنشطة الشهرية لشهر- {{ date('m') }} </h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>رقم.</th>
                   <th>المحور </th>
                   <th>موضوع النشاط </th>
                   <th> المؤسسة</th>
                   <th> القطاع</th>
                   <th>أجراءات</th>
                 </tr>
                 </thead>
                 <tbody>
                  {{Form::hidden('invisible', $increment =1) }}
        
                  
                  @foreach ($activities as $activity)
                 <tr>
                  <td>{{$increment}}</td>
                  <td>{{$activity->axe->axe_name}}</td>
                  <td> {!! nl2br(e($activity->activity_subject)) !!}</td>
                  <td>{{$activity->school->school_name}}</td>
                  <td>{{$activity->school->district->district_name}}</td>
                   <td>
                    <a href="{{url('/edit_activity/'.$activity->id)}}" class="btn btn-primary "><i class="nav-icon fas fa-edit">  </i></a>
                    <a href="{{url('/show_activity/'.$activity->id)}}" class="btn  btn-success "><i class="nav-icon fas fa-eye"></i></a>
                    <a href="{{url('/view_activity_pdf/'.$activity->id)}}" class="btn  btn-info "><i class="nav-icon fas fa-print"></i></a>
                    <a href="{{url('/delete_activity/'.$activity->id)}}" id="delete" class="btn btn-danger " ><i class="nav-icon fas fa-trash">  </i></a>
                  </td>
                 </tr>

                 @php
                 $increment +=1;
               
               @endphp
              
              @endforeach
                 </tbody>
                 <tfoot>
                 <tr>
                  <th>رقم.</th>
                   <th>إسم الأكاديمية</th>
                   <th>أجراءات</th>
                 </tr>
                 </tfoot>
               </table>
            
        
        
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
     </div>
     <!-- /.container-fluid -->
   </section>



 <div class="container-fluid">
       <div class="row">
         <div class="col-12">
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">    التقرير الشهري لشهر  - {{ date('m') }} </h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">

   <div class="table-responsive">

    <table class="table table-striped custom-table table-bordered">
      <thead>
        <tr>
          <th scope="col" style="width: 15%" >محور النشاط</th>
          <th scope="col"  style="width: 33%">عنوان النشاط</th>
          <th scope="col"  style="width: 15%">المؤسسة</th>
          <th scope="col"  style="width: 9%">تاريخ الانجاز</th>
          <th scope="col" style="width: 13%">الفئة المستهدفة</th>
          <th scope="col" style="width: 10%"> عدد المستفيدين </th>
        </tr>
      </thead>
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
                    <td  rowspan="{{count($activityByAxe)}}">{{$activity->axe->axe_name}}</td>
                    <td> {!! nl2br(e($activity->activity_subject)) !!}</td>
                    <td>{{$activity->school->school_name}}</td>
                    <td>{{$activity->activity_date}}</td>
                    <td>{{$activity->activity_classes}}</td>
                    <td>{{$activity->activity_effectif}}</td>
                    @php
                    $first = false;
                    @endphp
                    @else
                    <td> {!! nl2br(e($activity->activity_subject)) !!}</td>
                    <td>{{$activity->school->school_name}}</td>
                    <td>{{$activity->activity_date}}</td>
                    <td>{{$activity->activity_classes}}</td>
                    <td>{{$activity->activity_effectif}}</td>
                    @endif
              
                    
                  </tr>
                  @endforeach

                
            
                  
          @endforeach

                
      </tbody>
    </table>



  </div>
  </div>
  </div>
  </div>
  </div>

	
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

