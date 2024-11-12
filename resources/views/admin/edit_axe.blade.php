@extends('layout.layout_admin.admin')

@section('title')
تدبير مجالات التدخل
@endsection

@section('content')
    
	<!-- Main content -->
<h2 class="mb-4">تدبير مجالات التدخل</h2>

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
                   <h3 class="card-title">إضافة مجال أو محور التدخل</small></h3>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                   {!!Form::open(['action' => ['App\Http\Controllers\AxeController@editAxe',$axe->id],'method'=>'POST','class'=>'form-horizontal',
                   'enctype'=>'multipart/form-data'])!!}
                   {{csrf_field()}}
                   <div class="card-body">
                     <div class="form-group">

                      {{Form::label('','إسم المجال أو المجور')}}
                      {{Form::text('axe_name',$axe->axe_name,['placeholder'=>' أدخل المجال أوالمحور ','class'=>'form-control'])}}

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
               <h3 class="card-title">لائحة مجالات أو محاور التدخل</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>رقم.</th>
                   <th>إسم مجال أو محور التدخل</th>
                   <th>أجراءات</th>
                 </tr>
                 </thead>
                 <tbody>
                  {{Form::hidden('invisible', $increment =1) }}
                  
                  @foreach ($axes as $axe)
                 <tr>
                   <td>{{$increment}}</td>
                   <td>{{$axe->axe_name}} </td>
                   <td>
                    @if ($axe->status)
                    <a href="{{url('/activerAxe/'.$axe->id)}}" class="btn btn-success"><i class="nav-icon fa fa-power-off"></i></a>
                    @else
                    <a href="{{url('/activerAxe/'.$axe->id)}}" class="btn btn-danger"><i class="nav-icon fa fa-power-off"></i></a>
                    @endif
                     <a href="{{url('/edit_axe/'.$axe->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                     <a href="{{url('/delete_axe/'.$axe->id)}}" id="delete" class="btn btn-danger" onclick="ConfirmDelete()" ><i class="nav-icon fas fa-trash"></i></a>
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
                   <th>إسم مجال أو محور التدخل</th>
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

