@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="height: 70vh;">
                <!-- <div class="card-header">{{ __('Login') }}</div> -->

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6 bg-login-form">
                            <div class="" style="padding-top: 40px;">
                                <h6 style="text-align: center;font-size:12px;"> PLEASE ENTER YOUR CREDENTIALS </h6>
                                <form method="POST" action="{{ route('login') }}" style="margin-top: 25px;">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right label-log">{{ __('USERNAME') }}</label>

                                        <div class="col-md-4">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input-l1" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class=" label-log col-md-4 col-form-label text-md-right">{{ __('PASSWORD') }}</label>

                                        <div class="col-md-4">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-l1" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-left: 60px;">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember" style="font-size:12px;">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-4 offset-md-4">

                                            <button type="submit" class="btn btn-primary btn-login">
                                                {{ __('Login') }}
                                            </button>

                                        </div>

                                        <div class="col-md-4 offset-md-4">
                                            @if (Route::has('password.request'))
                                            <a style="font-size: 12px; color:#5F5F5F;" class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </div>




                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="hidesmall col-md-6 bg-login-form-2">

                        </div>
                    </div>



                </div>


                <!-- card body ends here -->
            </div>
        </div>
    </div>
</div>
@endsection