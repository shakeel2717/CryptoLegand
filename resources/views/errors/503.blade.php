@extends('errors.layout.app')
@section('title', '404')
@section('content')
    <div class="error-page">
        <!-- BEGIN error-page-content -->
        <div class="error-page-content">
            <div class="card mb-5 mx-auto" style="max-width: 320px;">
                <div class="card-body">
                    <div class="card">
                        <div class="error-code">503</div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </div>
                </div>
                <div class="card-arrow">
                    <div class="card-arrow-top-left"></div>
                    <div class="card-arrow-top-right"></div>
                    <div class="card-arrow-bottom-left"></div>
                    <div class="card-arrow-bottom-right"></div>
                </div>
            </div>
            <h1>Website Under Maintenance!</h1>
            <h3>Whlile this webite under maintenance, You can Visit our Alt Server on <a
                    href="https://cryptsence.net/">Cryptsence.net</a> Version</h3>
            <hr />
            <a href="https://cryptsence.net/" class="btn btn-outline-theme px-3 rounded-pill"><i
                    class="fa fa-arrow-left me-1 ms-n1"></i> Go to .net Version</a>
        </div>
        <!-- END error-page-content -->
    </div>
@endsection
