@extends("auth.common.index")
@section("body")

<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
    <a><b>Sex Material</b>Nepal</a>
    </div>

                <div class="card">

                    <div class="card-body register-card-body">
                        <div class="login-box-msg">{{ __('Register') }}</div>                            
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                                <div class="form-group has-feedback">
                                    <input id="name" type="text" placeholder="Full name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    <span class="fa fa-user form-control-feedback"></span>
                                    
                                </div>


                                <div class="form-group has-feedback">
                                    <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    <span class="fa fa-envelope form-control-feedback"></span>
                                    
                                </div>


                                <div class="form-group has-feedback">
                                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <span class="fa fa-lock form-control-feedback"></span>                                    
                                </div>


                                <div class="form-group has-feedback">
                                    <input id="password-confirm" type="password" placeholder="Retype Password" class="form-control" name="password_confirmation" required>
                                    <span class="fa fa-lock form-control-feedback"></span>                                    
                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <a class="btn btn-link" href="/admin/admins">
                                        Back to Admin Management
                                    </a>
                            </div>
                        </form>
                    </div>
                </div>
</div>

@endsection