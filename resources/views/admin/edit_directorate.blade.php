@extends('layout.layout_admin.admin')

@section('title')
تدبير المديريات
@endsection

@section('content')
    
	<!-- Main content -->
<h2 class="mb-4">تدبير المديريات الإقليمية</h2>

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
               <h3 class="card-title">إضافة مديريةإقليمية</small></h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             {!!Form::open(['action' => ['App\Http\Controllers\DirectorateController@editDirectorate',$directorate->id],'method'=>'POST','class'=>'form-horizontal',
                    'enctype'=>'multipart/form-data'])!!}

            {{csrf_field()}}
               <div class="card-body">
                 <div class="form-group">
                
                   {{Form::label('','إسم مديرية')}}
                   {{Form::text('directorate_name',$directorate->directorate_name,['placeholder'=>'أدخل إسم مديرية','class'=>'form-control'])}}
                 
                  <div class="row">
                    <div class="col-md-12 form-group mb-3">
                      {{ Form::label('academy_id', 'تابعة للأكاديمية :')}}
                      {{ Form::select('academy_id', $academies, $directorate->academy_id, ['class' => 'form-control select2'])}}
                    </div>
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
               <h3 class="card-title">لائحة المديريات</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>رقم.</th>
                   <th>إسم المديرية</th>
                   <th>إسم الأكاديمية</th>
                   <th>أجراءات</th>
                 </tr>
                 </thead>
                 <tbody>
                  {{Form::hidden('invisible', $increment =1) }}
                  
                  @foreach ($directorates as $directorate)
                 <tr>
                   <td>{{$increment}}</td>
                   <td>{{$directorate->directorate_name}}</td>
                   <td>{{$directorate->academy->academy_name}}</td>
                   <td>
                    @if ($directorate->status)
                    <a href="{{url('/activer_directorate/'.$directorate->id)}}" class="btn btn-success"><i class="nav-icon fa fa-power-off"></i></a>
                    @else
                    <a href="{{url('/activer_directorate/'.$directorate->id)}}" class="btn btn-danger"><i class="nav-icon fa fa-power-off"></i></a>
                    @endif
                     <a href="{{url('/edit_directorate/'.$directorate->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                     <a href="{{url('/delete_directorate/'.$directorate->id)}}" id="delete" class="btn btn-danger" onclick="ConfirmDelete()" ><i class="nav-icon fas fa-trash"></i></a>
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
                  <th>إسم المديرية</th>
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

@endsection