@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            @include('inc.logo')
        </div>
        <h1 class="text-center">Sign In</h1>
        <div class="text-white text-opacity-50 text-center mb-4">
            For your protection, please verify your identity.
        </div>
        <div class="mb-3">
            <label class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" name="username" class="form-control form-control-lg bg-white bg-opacity-5"
                value="{{ old('username') }}" placeholder="Enter your username">
        </div>
        <div class="mb-3">
            <div class="d-flex">
                <label class="form-label">Password <span class="text-danger">*</span></label>
                <a href="{{ route('password.request') }}"
                    class="ms-auto text-white text-decoration-none text-opacity-50">Forgot
                    password?</a>
            </div>
            <input type="password" id="password" name="password" class="form-control form-control-lg bg-white bg-opacity-5" value=""
                placeholder="Type your Password" />
            <div class="text-end mt-2">
                <a href="javascript:void();" id="showPassword" class="ms-auto text-white text-decoration-none text-opacity-50">Show
                    Password</a>
            </div>

        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="customCheck1" />
                <label class="form-check-label" for="customCheck1">Remember me</label>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Sign
            In</button>
        <div class="text-center text-white text-opacity-50">
            Don't have an account yet? <a href="{{ route('register') }}">Sign up</a>.
        </div>
    </form>
@endsection
@section('footer')
    <script>
        $('#showPassword').click(function () {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        });
    </script>
@endsection
