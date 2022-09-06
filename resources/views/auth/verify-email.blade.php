@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <div class="mb-2 text-center">
        @include('inc.logo')
        <div class="d-flex flex-column">
            <hr>
            <p class="text-uppercase font-w700 font-size-sm text-muted">Account Created Successfully</p>
            <p>Thanks for signing up! Before getting started, could you verify your email address by
                clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you
                another.</p>
        </div>
    </div>
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-theme">Resend Verification Email</button>
        <br>
    </form>
    <br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-theme">Sign Out</button>
        <br>
    </form>
@endsection
