@extends('user.layout.app')
@section('title', 'Direct Team')
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-theme bg-theme bg-opacity-5 mb-3">
                    <div class="card-header border-theme fw-bold small text-white">Direct Team</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 80px;">#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Investment</th>
                                    <th>Status</th>
                                    <th>Join Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($statement as $transaction)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center text-capitalize">{{ $transaction->name }}</td>
                                        <td class="text-center text-capitalize">{{ $transaction->username }}</td>
                                        <td class="text-center">
                                            ${{ number_format(myPlanCount($transaction->id), 4) }}/-</td>
                                        <td class="text-center">{{ $transaction->status }}</td>
                                        <td class="text-center">{{ $transaction->created_at }}</td>
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
