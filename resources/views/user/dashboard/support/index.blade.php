@extends('user.layout.app')
@section('title', 'Pricing Plans')
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-8  mx-auto">
                <div class="card border-theme bg-theme bg-opacity-5 mb-3">
                    <div class="card-header border-theme fw-bold small text-white">HEADER</div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($supports as $support)
                                <div class="col-md-12">
                                    <div class="block block-rounded d-flex justify-content-around align-items-center">
                                        <div class="">
                                            <h3>{{ $support->subject }}</h3>
                                            <p>{{ $support->message }}</p>
                                            <p>{{ $support->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="support-button mr-4">
                                            <a href="#" class="btn btn-theme"><i class="fa fa-eye"></i>
                                                View</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @empty
                                <div class="col-md-12">
                                    <div class="block block-rounded">
                                        <div class="block-content">
                                            <h2>NO Ticekt Found</h2>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
