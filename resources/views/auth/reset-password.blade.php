@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <h1 class="text-center">Sign In</h1>
    <div class="text-white text-opacity-50 text-center mb-4">
        For your protection, please verify your identity.
    </div>
    <div class="mb-3">
        <label class="form-label">Email <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                        value="{{ old('email', $request->email) }}">
    </div>
    <div class="mb-3">
        <div class="d-flex">
            <label class="form-label">Password <span class="text-danger">*</span></label>
        </div>
        <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
    </div>
    <div class="mb-3">
        <div class="d-flex">
            <label class="form-label">Password Confirm <span class="text-danger">*</span></label>
        </div>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm new Password">
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="customCheck1" />
            <label class="form-check-label" for="customCheck1">Remember me</label>
        </div>
    </div>
    <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Reset Password</button>
    <div class="text-center text-white text-opacity-50">
        Don't have an account yet? <a href="{{ route('register') }}">Sign up</a>.
    </div>
</form>
@endsection
