@extends('user.layout.app')
@section('title', 'All In-Direct Level 1')
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-12" >
                <div class="card border-theme bg-theme bg-opacity-5 mb-3">
                    <div class="card-header border-theme fw-bold small text-white">All In-Direct Level 1</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 80px;">#</th>
                                    <th>Plan Name</th>
                                    <th>Plan Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Capital Refund</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($statement as $transaction)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center text-capitalize">{{ $transaction->plan->name }} Plan</td>
                                        <td class="text-center text-capitalize">
                                            {{ number_format($transaction->plan->price, 2) }}
                                        </td>
                                        <td class="text-center text-capitalize">{{ $transaction->status }}</td>
                                        <td class="text-center text-capitalize">{{ $transaction->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user.plan.active.refund', ['id' => $transaction->id]) }}"
                                                class="btn btn-outline-theme btn-md active">Refund</a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No Record Found</p>
                                @endforelse
                            </tbody>
                        </table>
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
