@extends('layout.layout_admin.admin')

@section('title')
تدبير الشعب والمسالك
@endsection

@section('content')
    
	<!-- Main content -->
<h2 class="mb-4">تدبير الشعب و المسالك</h2>

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
                   <h3 class="card-title">إضافة شعبة أو مسلك</small></h3>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                  {!!Form::open(['action' => 'App\Http\Controllers\DisciplineController@saveDiscipline','method'=>'POST','class'=>'form-horizontal',
                    'enctype'=>'multipart/form-data'])!!}
                   {{csrf_field()}}
                   <div class="card-body">
                     <div class="form-group">

                      {{Form::label('','إسم الشعبة أو المسلك')}}
                      {{Form::text('discipline_name','',['placeholder'=>'أدخل إسم الشعبة أو المسلك ','class'=>'form-control'])}}

                        </div>
                     

                     <div class="form-group">
                      {{Form::label('','وسم الشعبة أو المسلك')}}
                      {{Form::text('discipline_slug','',['placeholder'=>'أدخل وسم الشعبة أو المسلك ','class'=>'form-control'])}}
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
               <h3 class="card-title">لائحة الشعب و المسالك</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>رقم.</th>
                   <th>إسم الشعبة أو المسلك</th>
                   <th>أجراءات</th>
                 </tr>
                 </thead>
                 <tbody>
                  {{Form::hidden('invisible', $increment =1) }}
                  
                  @foreach ($academies as $academy)
                 <tr>
                   <td>{{$increment}}</td>
                   <td>{{$academy->academy_name}} </td>
                   <td>
                    @if ($academy->status)
                    <a href="{{url('/activer_academy/'.$academy->id)}}" class="btn btn-success"><i class="nav-icon fa fa-power-off"></i></a>
                    @else
                    <a href="{{url('/activer_academy/'.$academy->id)}}" class="btn btn-danger"><i class="nav-icon fa fa-power-off"></i></a>
                    @endif
                     <a href="{{url('/edit_academy/'.$academy->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                     <a href="{{url('/delete_academy/'.$academy->id)}}" id="delete" class="btn btn-danger" onclick="ConfirmDelete()" ><i class="nav-icon fas fa-trash"></i></a>
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
                   <th>إسم الشعب أو المسلك</th>
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

