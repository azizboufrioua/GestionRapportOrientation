@extends('layout.layout_auth.layout_auth')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تسجيل الدخول') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                        @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('البريد الإلكتروني') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                
                        </div>

             

                        <div class="col mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('تحين القن السري ') }}

                                </button> 
                        </div>


                        <div class="row mb-5">
                                
                            <button class="btn">
                                <a href="{{url('/register/')}}" >
                                 {{ __('تسجيل الدخول') }}
                                </a>
                            </button> 
                            
                            <button class="btn">
                                <a href="{{url('/login/')}}" >
                                 {{ __('تسجيل بالتطبيق') }}
                                </a>
                            </button>


                   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection