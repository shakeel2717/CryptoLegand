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
                            <form action="{{ route('user.support.store') }}" method="POST">
                                @csrf
                                <h2 class="content-heading pt-0">
                                    <i class="fa fa-fw fa-user-circle text-muted me-1"></i> Support Center
                                </h2>
                                <div class="row push">
                                    <div class="col-lg-4">
                                        <p class="text-muted">
                                            Our Support Team will reply you within 12 hours.
                                        </p>
                                    </div>
                                    <div class="col-lg-8 col-xl-5">
                                        <div class="mb-4">
                                            <label class="form-label" for="subject">Subject</label>
                                            <select name="subject" id="subject" class="form-select">
                                                <option value="Technical Issue">Technical Issue</option>
                                                <option value="General Question">General Question</option>
                                                <option value="Withdraw Issue">Withdraw Issue</option>
                                                <option value="Plan Upgrade">Plan Upgrade</option>
                                                <option value="Other">Other</option>

                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="message">Message</label>
                                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row push">
                                    <div class="col-lg-8 col-xl-5 offset-lg-4">
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-outline-theme btn-lg active">
                                                <i class="fa fa-check-circle opacity-50 me-1"></i> Send Message
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
