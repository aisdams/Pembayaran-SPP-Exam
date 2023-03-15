@extends('auth.layoutauth')
@section('content')
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="login-form-head">
                    <h4>Sign In</h4>
                    <p>Hello there, Sign in and start managing your Admin Template</p>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" id="exampleInputEmail1" name="username">
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="exampleInputPassword1" name="password">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        @if (!auth()->user() || (auth()->user() && auth()->user()->level != 'siswa'))
                            <p class="text-muted">Don't have an account? <a href="{{ url('auth/register') }}">Sign up</a></p>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection