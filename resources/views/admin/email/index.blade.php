@extends('admin.layout.app')
@section('title', 'Pricing Plans')
@section('head')
    <link href="/assets/plugins/summernote/dist/summernote-lite.css" rel="stylesheet" />
@endsection
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-8  mx-auto">
                <div class="card border-theme bg-theme bg-opacity-5 mb-3">
                    <div class="card-header border-theme fw-bold small text-white">HEADER</div>
                    <div class="card-body">
                        <form action="{{ route('admin.email.store') }}" method="POST">
                            @csrf
                            <h2 class="content-heading pt-0">
                                <i class="fa fa-fw fa-user-circle text-muted me-1"></i> Send Emails to All Users
                            </h2>
                            <div class="row push">
                                <div class="col-lg-12">
                                    <p class="text-muted">
                                        Send Emails to All Active Users, Currently in the System, there's
                                        {{ $users }} Users in the System.
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label class="form-label" for="message">Messsage</label>
                                        <textarea name="message" id="message" cols="30" rows="10" class="form-control summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row push">
                                <div class="col-lg-8 col-xl-5 offset-lg-4">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-outline-theme btn-lg active">
                                            <i class="fa fa-check-circle opacity-50 me-1"></i> Send Mail to All Active Users
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
@section('footer')
    <script src="/assets/plugins/summernote/dist/summernote-lite.min.js"></script>
    <script>
        $('.summernote').summernote({
            height: 300
        });
    </script>
@endsection
