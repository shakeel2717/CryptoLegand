@extends('user.layout.app')
@section('title', 'Pricing Plans')
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-8 text-center mx-auto">
                <h1 class="h1 mb-3">
                    {{ $plan->name }} Plan ${{ number_format($plan->price, 2) }}
                </h1>
                <p>You are about to activate {{ $plan->name }} with the Amount of
                    <b>${{ number_format($plan->price, 2) }}.</b> Plese click below Purchase now button to Confirm your
                    investment.
                </p>
                <div>
                    <form action="{{ route('user.plan.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                        <input class="btn btn-outline-theme btn-lg active" type="submit" value="Purchase now">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
