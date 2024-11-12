@extends('layout.layout_admin.admin')

@section('title')
تدبير المؤسسات
@endsection

@section('content')
    
	<!-- Main content -->
<h2 class="mb-4">تدبير المؤسسات </h2>

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
		
<section class="content">
	
  <div class="container-fluid">
       <div class="row">
         <!-- left column -->
         <div class="col-md-12">
           <!-- jquery validation -->
           <div class="card card-primary">
             <div class="card-header">
               <h3 class="card-title">إضافة موسسة </small></h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             {!!Form::open(['action' => 'App\Http\Controllers\SchoolController@saveSchool','method'=>'POST','class'=>'form-horizontal',
                    'enctype'=>'multipart/form-data'])!!}
            {{csrf_field()}}


               <div class="card-body">
                 <div class="form-group">
                      <div class="form-group">
                          <div class="row mb-3">
                            <div class="col">
                              {{Form::label('','إسم المؤسسة')}}
                              {{Form::text('school_name','',['placeholder'=>'إسم المؤسسة','class'=>'form-control'])}}
                            </div>
                            
                            <div class="col">
                              {{ Form::label('category_id', 'نوع المؤسسة :')}}

                              <div class="form-check">
                                {{ Form::label('school_qual', 'تأهيلية  :')}}
                                {{Form::checkbox('school_qual',1,['placeholder'=>'إسم المؤسسة','class'=>'form-control'])}}
                              <!--/div>
                              <div class="form-check"-->
                                {{ Form::label('school_coll', 'إعدادية  :')}}
                                 {{Form::checkbox('school_coll',1,['placeholder'=>'إسم المؤسسة','class'=>'form-control'])}}
                              </div>
                            </div>
                        </div>                   
                    </div>

                    <div class="row">
                      <div class="col-md-12 form-group mb-3">
                        {{ Form::label('directorate_id', 'تابع للمديرية :')}}
                        {{ Form::select('directorate_id', $directorates, null, ['class' => 'form-control select2'])}}
                      </div>
                    </div>
     
                      <div class="form-group">
                        {{ Form::label('district_id', 'القطاع رقم :')}}
                        {{ Form::select('district_id', $districts, null, ['class' => 'form-control select2'])}}
                      </div>
                      <div class="form-group">         
                       {{Form::label('','عدد أقسام')}}
                       {{Form::number('school_classes','',['placeholder'=>'عدد أقسام','class'=>'form-control'])}}
                     </div>
                      <div class="form-group">       
                       {{Form::label('','عدد المتعلمين')}}
                       {{Form::number('school_effectif','',['placeholder'=>'عدد المتعلمين','class'=>'form-control'])}}
                     </div>
{{--              

                  {{Form::label('',' الشعب والمسالك')}}
                  {{Form::text('school_disciplines','',['placeholder'=>'أدخل رقم القطاع ','class'=>'form-control'])}} --}}
                  <div class="form-group">
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
               <h3 class="card-title">لائحة المؤسسات</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>رقم.</th>
                   <th>إسم المؤسسة</th>
                   <th>رقم القطاع </th>
                   <th>إسم المديرية</th>
                   <th>إعدادي - تأهيلي</th>
                   <th>عدد الأقسام</th>
                   <th>عدد التلاميذ</th>
                   <th>الشعب الخاصة</th>
                   <th>أجراءات</th>
                 </tr>
                 </thead>
                 <tbody>
                  {{Form::hidden('invisible', $increment =1) }}
                  
                  @foreach ($schools as $school)
                 <tr>
                   <td>{{$increment}}</td>
                   <td>{{$school->school_name}}</td>
                   <td>{{$school->district->district_name}}</td>
                   <td>{{$school->directorate->directorate_name}}</td>
                   <td>{{ $school->school_qual ? 'تأهيلي' : '' }} {{ $school->school_coll ? '-  إعدادي' : ' ' }} </td>
                   <td>{{$school->school_classes}}</td>
                   <td> {{$school->school_effectif}} </td>
                   <td>الشعب الخاصة</td>
                   <td>
                    @if ($school->status)
                    <a href="{{url('/activer_school/'.$school->id)}}" class="btn btn-success"><i class="nav-icon fa fa-power-off"></i></a>
                    @else
                    <a href="{{url('/activer_school/'.$school->id)}}" class="btn btn-danger"><i class="nav-icon fa fa-power-off"></i></a>
                    @endif
                     <a href="{{url('/edit_school/'.$school->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                     <a href="{{url('/delete_school/'.$school->id)}}" id="delete" class="btn btn-danger" onclick="ConfirmDelete()" ><i class="nav-icon fas fa-trash"></i></a>
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
                    <th>إسم المؤسسة</th>
                    <th>رقم القطاع </th>
                    <th>إسم المديرية</th>
                    <th>إعدادي - تأهيلي</th>
                    <th>عدد الأقسام</th>
                    <th>عدد التلاميذ</th>
                    <th>الشعب الخاصة</th>
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

@endsection