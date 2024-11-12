@extends('layout.layout_auth.layout_auth')

@section('content')
<div class="container-fluid">
    <div class="card-body">
    </div>

</div>


                
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="admin/images/bg.png" class="img-fluid card-img-top" alt="alt text">
                <div class="card-header center">{{ __('تسجيل الدخول') }}</div>

                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>               
                
                
                
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="admin/images/bg.png" class="img-fluid card-img-top" alt="alt text">
                <div class="card-header center">{{ __('تسجيل الدخول') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        


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

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('القن السري') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('    تذكرني') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('تسجيل الدخول') }}

                                </button> 
                        </div>

                        <div class="row mb-5">
                                
                                <button class="btn">
                                    <a href="{{url('/register/')}}" >
                                     {{ __('تسجيل بالتطبيق') }}
                                    </a>
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('نسيت القن السري') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection