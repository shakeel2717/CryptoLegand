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
                            <form ACTION="https://perfectmoney.is/api/step1.asp" METHOD="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="PAYMENT_AMOUNT" class="form-label">Amount</label>
                                    <input type="text" name="PAYMENT_AMOUNT" id="PAYMENT_AMOUNT" placeholder="Enter Amount" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <P>
                                        <input type="hidden" name="PAYEE_ACCOUNT" value="{{ env('PERFECT_MONEY_ACCOUNT') }}">
                                        <input type="hidden" name="PAYEE_NAME" value="{{ env('APP_NAME') }}">
                                        <input type="hidden" name="STATUS_URL" value="{{ route('payment.success') }}">
                                        <input type="hidden" name="PAYMENT_URL" value="{{ route('payment.success') }}">
                                        <input type="hidden" name="NOPAYMENT_URL" value="{{ route('payment.failed') }}">
                                        <input type="hidden" name="PAYMENT_UNITS" value="USD">
                                        <input type="hidden" name="PAYMENT_BATCH_NUM" value="680">
                                        <input type="hidden" name="ORDER_NUM" value="9801121">
                                        <input type="hidden" name="CUST_NUM" value="2067609">
                                        <input type="hidden" name="PAYMENT_ID" value="{{ auth()->user()->id }}">
                                    </P>
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