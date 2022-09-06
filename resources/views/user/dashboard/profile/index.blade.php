@extends('user.layout.app')
@section('title', 'Pricing Plans')
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-8  mx-auto">
                <div class="card border-theme bg-theme bg-opacity-5 mb-3">
                    <div class="card-header border-theme fw-bold small text-white">HEADER</div>
                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row push">
                                <div class="col-lg-4">
                                    <p class="text-muted">
                                        Your account’s vital info. Your username will be publicly visible.
                                    </p>
                                </div>
                                <div class="col-lg-8 col-xl-5">
                                    <div class="mb-4">
                                        <label class="form-label">Your Picture</label>
                                        <div class="push">
                                            <img class="img-avatar"
                                                src="{{ asset('assets/profile/' . auth()->user()->profile) }}" alt=""
                                                width="150">
                                        </div>
                                        <label class="form-label" for="dm-profile-edit-avatar">Update New Picture</label>
                                        <input class="form-control" type="file" name="profile" id="dm-profile-edit-avatar">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="name">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter your Full Name.." value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Enter your Username.." value="{{ auth()->user()->username }}" readonly>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter your Email.." value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row push">
                                <div class="col-lg-8 col-xl-5 offset-lg-4">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-outline-theme btn-lg active">
                                            <i class="fa fa-check-circle opacity-50 me-1"></i> Update Profile
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
