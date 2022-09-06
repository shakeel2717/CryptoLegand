@extends('user.layout.app')
@section('title')
Dashboard
@endsection

@section('content')
<div class="content">
    <div class="content content-full text-center">
        <br>
        <br>
        <h1 class="h1 mt-3">
            Payment Failed. Please try again or Contact Support Center.
        </h1>
        <div class="my-3">
            <a href="{{ route('user.dashboard') }}" class="btn btn-theme">Go To Dashboard</a>
        </div>
    </div>
</div>
@endsection