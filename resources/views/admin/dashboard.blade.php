@extends('layout.layout_admin.admin')

@section('title')
تدبير التقارير الشهرية
@endsection

@section('content')
    
	<!-- Main content -->
<h2 class="mb-4"> تدبير التقارير الشهرية : - {{Auth::user()->name}}</h2>
		

<section class="content">

      <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">إنتاج بطاقة  الزيارة حسب المؤسسة </small></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
                 
        {!!Form::open(['action' => 'App\Http\Controllers\ExportpdfController@ExportpdfActivityDay','method'=>'POST','class'=>'form-horizontal',
        'enctype'=>'multipart/form-data'])!!}
        {{csrf_field()}}
            <div class="card-body">
              <div class="form-group">
                <div class="row">

                  <div class="form-group">
                    {{ Form::label('activity_date', ' تاريخ الزيارة :')}}
                    {{ Form::date('activity_date', Carbon\Carbon::now(), ['class' => 'form-control']) }}
                  </div>

                  <div class="form-group">
                    {{ Form::label('school_id', ' المؤسسة :')}}
                    {{ Form::select('school_id', $schools, null, ['class' => 'form-control select2'])}}
                  </div>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer ">
            <div class="col-md-12 bg-right text-right">
              <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
              <input  formtarget="_blank" type="submit" class="btn btn-primary btn-block" value="بحث" >
            </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.card -->
        </div>
  
    </div>
    <!-- /.row -->
    
</div><!-- /.container-fluid -->


<br>
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- jquery validation -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">إنتاج عن تقرير الشهري حسب المؤسسة </small></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        {!!Form::open(['action' => 'App\Http\Controllers\ExportpdfController@ExportpdfReport','method'=>'POST','class'=>'form-horizontal',
        'enctype'=>'multipart/form-data'])!!}
        {{csrf_field()}}
          <div class="card-body">
            <div class="form-group">
              <div class="row">

                <div class="form-group">
            
                  {{ Form::label('activity_date', ' الشهر  :')}}
                  {{Form::number('month', Carbon\Carbon::now()->month,['min'=>1,'max'=>12,'class' => 'form-control'])}}
                </div>

                <div class="form-group">

                  {{ Form::label('activity_date', ' السنة  :')}}
                  {{Form::number('year', Carbon\Carbon::now()->year,['min'=>1900,'max'=>2099,'class' => 'form-control'])}}

                
                </div>

              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer ">
          <div class="col-md-12 bg-right text-right">
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            <input  formtarget="_blank" type="submit" class="btn btn-primary btn-block" value="بحث" >
          </div>
          </div>
          {!! Form::close() !!}
      </div>
      <!-- /.card -->
      </div>

  </div>
  <!-- /.row -->
  
</div><!-- /.container-fluid -->

<br>

<br>
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- jquery validation -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">إنتاج عن تقرير الشهري  الموحد </small></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
        {!!Form::open(['action' => 'App\Http\Controllers\ExportpdfController@ExportpdfReportCommun','method'=>'POST','class'=>'form-horizontal',
        'enctype'=>'multipart/form-data'])!!}
        {{csrf_field()}}
          <div class="card-body">
            <div class="form-group">
              <div class="row">

                <div class="form-group">
            
                  {{ Form::label('activity_date', ' الشهر  :')}}
                  {{Form::number('month', Carbon\Carbon::now()->month,['min'=>1,'max'=>12,'class' => 'form-control'])}}
                </div>

                <div class="form-group">

                  {{ Form::label('activity_date', ' السنة  :')}}
                  {{Form::number('year', Carbon\Carbon::now()->year,['min'=>1900,'max'=>2099,'class' => 'form-control'])}}

                
                </div>

              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer ">
          <div class="col-md-12 bg-right text-right">
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            <input  formtarget="_blank" type="submit" class="btn btn-primary btn-block" value="بحث" >
          </div>
          </div>
          {!! Form::close() !!}
      </div>
      <!-- /.card -->
      </div>

  </div>
  <!-- /.row -->
  
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection