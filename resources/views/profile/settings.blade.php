@extends('layout.layout_admin.admin')

@section('title')
تدبير الأشطة
@endsection

@section('content')
	<!-- Main content -->

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

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ترويسة بطائق الزيارة و التقارير ') }}</div>

          

                <div class="card-body">
                <!-- form start -->
                {!!Form::open(['action' => 'App\Http\Controllers\SettingController@saveSetting','method'=>'POST','class'=>'form-horizontal',
                'enctype'=>'multipart/form-data'])!!}
                {{csrf_field()}}

                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __(' إسم المصلحة ') }}</label>

                            <div class="col-md-6">
                                {{Form::text('service_name',$setting->service_name,['placeholder'=>'أدخل إسم مديرية','class'=>'form-control'])}}

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __(' المديرية الإقليمية  ') }}</label>

                            <div class="col-md-6">
                                {{ Form::select('directorate_id', $directorates, $setting->directorate_id, ['class' => 'form-control select2'])}}

                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('الأكاديمية') }}</label>

                            <div class="col-md-6">
                                {{ Form::select('academy_id', $academies, $setting->academy_id, ['class' => 'form-control select2'])}}

                            
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('شعار الوزارة ') }}</label>

                            <div class="col-md-6">
                                {{Form::label('','اختر شعارا',['class'=>'custom-file-label'])}}
                                {{Form::file('logo',['class'=>'custom-file-input'])}}
        
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __(' شعار الوزارة المعتمد حاليا ') }}</label>

                            <div class="col-md-6">
                                <img src="{{ asset('storage/admin/images/'.$setting->logo) }}" class="form-control" style="height : 90px; widtd : 210px">

                            
                            </div>
                        </div>



                        <div class="mb-0 form-group row">
                            <div class="col-md-8 offset-md-4">
                                {{Form::submit('تثبيت ',['class'=>'btn btn-primary'])}}
                            </div>
                        </div>

                   {!! Form::close() !!}
                   

                </div>
            </div>
        </div>
    </div>
</div>



@endsection