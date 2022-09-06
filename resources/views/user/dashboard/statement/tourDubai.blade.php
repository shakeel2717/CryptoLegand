@extends('user.layout.app')
@section('title', 'All In-Direct Level 1')
@section('head')
    <link href="/assets/plugins/lity/dist/lity.min.css" rel="stylesheet" />
    <script src="/assets/plugins/lity/dist/lity.min.js"></script>
@endsection
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center text-white">
                            <div class="flex-fill pe-3">
                                <div class="fw-bold">Dubai Tour Winner</div>
                                <div class="small text-white text-opacity-50">Recent Dubai Tour Winner</div>
                            </div>
                            <div>
                                <i class="fa fa-chevron-right fa-lg text-white text-opacity-50"></i>
                            </div>
                        </a>
                    </div>
                    <hr class="m-0" />
                    <div class="card-body">
                        <div class="widget-img-list">
                            @for ($i = 47; $i > 0; $i--)
                                <div class="widget-img-list-item"><a href="/assets/tour/{{ $i }}.jpg" data-lity>
                                        <span class="img m-2"
                                            style="background-image: url(/assets/tour/{{ $i }}.jpg)"></span>
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- card-arrow -->
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
