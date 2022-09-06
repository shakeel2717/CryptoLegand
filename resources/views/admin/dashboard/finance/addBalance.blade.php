@extends('admin.layout.app')
@section('title', 'Pricing Plans')
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-8  mx-auto">
                <div class="card border-theme bg-theme bg-opacity-5 mb-3">
                    <div class="card-header border-theme fw-bold small text-white">HEADER</div>
                    <div class="card-body">
                        <form action="{{ route('admin.addBalance.store') }}" method="POST">
                            @csrf
                            <h2 class="content-heading pt-0">
                                <i class="fa fa-fw fa-user-circle text-muted me-1"></i> Add Balance
                            </h2>
                            <div class="row push">
                                <div class="col-lg-4">
                                    <p class="text-muted">
                                        Add Balance in User Account for Plan Activation or Withdarwal Request
                                    </p>
                                </div>
                                <div class="col-lg-8 col-xl-5">
                                    <div class="mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" name="username" id="username" placeholder="User Username"
                                            class="form-control">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="type">Type</label>
                                        <select name="type" id="type" class="form-select">
                                            <option value="in">In</option>
                                            <option value="out">Out</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="method">Mehod</label>
                                        <select name="method" id="method" class="form-select">
                                            <option value="balance">Balance</option>
                                            <option value="roi">Roi</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="amount">Amount</label>
                                        <input type="text" name="amount" id="amount" placeholder="Amount"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row push">
                                <div class="col-lg-8 col-xl-5 offset-lg-4">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-outline-theme btn-lg active">
                                            <i class="fa fa-check-circle opacity-50 me-1"></i> Add Balance
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
