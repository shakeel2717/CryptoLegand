@extends('user.layout.app')
@section('title', 'Pricing Plans')
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            @forelse ($plans as $plan)
                <div class="col-md-6 col-xl-4">
                    <div class="card border-theme bg-theme bg-opacity-25 mb-3">
                        <div class="card-header border-theme fw-bold small text-white">{{ $plan->name }}</div>
                        <div class="card-body">
                            <h5 class="card-title">${{ number_format($plan->price, 2) }}</h5>
                            <p class="card-text text-white text-opacity-75">Min Withdarw: ${{ number_format(20, 2) }}</p>
                            <p class="card-text text-white text-opacity-75">Duration: {{ $plan->duration }} months</p>
                                <a href="{{ route('user.plan.show', ['plan' => $plan->id]) }}" class="btn btn-outline-theme btn-lg active">Select</a>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </div>
                </div>
            @empty
                <h2>NO Plan Found</h2>
            @endforelse
        </div>
    </div>
@endsection
