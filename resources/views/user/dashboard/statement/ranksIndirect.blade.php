@extends('user.layout.app')
@section('title', 'Indirect Rank')
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-theme bg-theme bg-opacity-5 mb-3">
                    <div class="card-header border-theme fw-bold small text-white">HEADER</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 80px;">#</th>
                                    <th>In-Direct Sale Required</th>
                                    <th>Award</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ranks as $rank)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rank->business_from }}</td>
                                        <td>{{ $rank->award }}</td>
                                        <td class="text-center">
                                            @if ($rank->business_from <= inDirectBusiness(auth()->user()->id))
                                                <i class="fa fa-check text-success" style="font-size:35px;"></i> @endif
                                        </td>
                                        {{-- {!! inDirectAward(auth()->user()->id) == $rank->name ? '>' : '' !!}</td> --}}
                                    </tr>
                                @empty
                                    <h3>NO Record</h3>
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
