@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
<form action="{{ route('password.request') }}" method="POST">
    @csrf
    <div class="mb-3">
        @include('inc.logo')
    </div>
    <h1 class="text-center">Forgot Password!</h1>
    <div class="text-white text-opacity-50 text-center mb-4">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </div>
    <div class="mb-3">
        <label class="form-label">Username <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="email" name="email"
                        placeholder="Email" value="{{ old('email') }}">
    </div>
    <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Reset Password</button>
    <div class="text-center text-white text-opacity-50">
        <a href="{{ route('login') }}">Remember Password?</a>
    </div>
</form>
@endsection
