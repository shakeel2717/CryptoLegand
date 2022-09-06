@extends('user.layout.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content">
        <div class="content content-full text-center">
            <h1 class="h1 mt-3">
                Add Balance in to your account
            </h1>
            <div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-body text-left">
                                <form action="{{ route('user.plan.activate') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="method" class="form-label">Select Payment Method</label>
                                        <select name="method" id="method" class="form-control bg-dark">
                                            <option value="BTC">BTC</option>
                                            <option value="BUSD.BEP20">BUSD (BEP20)</option>
                                            <option value="USDT.TRC20">USDT (TRC20)</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" name="amount" id="amount" placeholder="Enter Amount"
                                            class="form-control">
                                    </div>
                                    <input class="btn btn-outline-theme btn-lg" type="submit" value="Deposit Now">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
