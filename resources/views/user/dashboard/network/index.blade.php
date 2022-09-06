@extends('user.layout.app')
@section('title', 'Dashboard')
@section('head')
    <link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h2 text-center">Network Super Access</h2>
                <hr>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex fw-bold small mb-3">
                            <span class="flex-grow-1">Overall Refers</span>
                            <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i
                                    class="bi bi-fullscreen"></i></a>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-7">
                                <h3 class="mb-0">
                                    {{ count($refers) }}</h3>
                            </div>
                            <div class="col-5">
                                <div class="mt-n2" data-render="apexchart" data-type="bar" data-title="Visitors"
                                    data-height="30"></div>
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
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex fw-bold small mb-3">
                            <span class="flex-grow-1">Active Refers</span>
                            <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i
                                    class="bi bi-fullscreen"></i></a>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-7">
                                <h3 class="mb-0">
                                    {{ $refers->where('status', 'active')->count() }}
                                </h3>
                            </div>
                            <div class="col-5">
                                <div class="mt-n2" data-render="apexchart" data-type="bar" data-title="Visitors"
                                    data-height="30"></div>
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
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex fw-bold small mb-3">
                            <span class="flex-grow-1">Pending Refers</span>
                            <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i
                                    class="bi bi-fullscreen"></i></a>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-7">
                                <h3 class="mb-0">
                                    {{ $refers->where('status', 'pending')->count() }}
                                </h3>
                            </div>
                            <div class="col-5">
                                <div class="mt-n2" data-render="apexchart" data-type="bar" data-title="Visitors"
                                    data-height="30"></div>
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="overflow: scroll;">
                <div class="card border-theme bg-theme bg-opacity-5 mb-3">
                    <div class="card-header border-theme fw-bold small text-white">Network Board</div>
                    <div class="card-body">
                        <table class="table text-nowrap w-100" id="datatableDefault">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 80px;">#</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Invest</th>
                                    {{-- <th>Direct Business</th> --}}
                                    {{-- <th>Direct Rank</th> --}}
                                    {{-- <th>In-Direct</th> --}}
                                    {{-- <th>In-Direct Rank</th> --}}
                                    <th>Status</th>
                                    <th>Join Date</th>
                                    <th>Login</th>
                                    <th>Tree</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($refers as $refer)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center text-capitalize">{{ $refer->name }}</td>
                                        <td class="text-center text-capitalize">{{ $refer->username }}</td>
                                        <td class="text-center text-capitalize">{{ $refer->email }}</td>
                                        <td class="text-center text-capitalize">${{ myPlanCount($refer->id, 2) }}</td>
                                        {{-- <td class="text-center text-capitalize">${{ directBusiness($refer->id, 2) }}</td> --}}
                                        {{-- <td class="text-center text-capitalize">{{ directAward($refer->id, 2) }}</td> --}}
                                        {{-- <td class="text-center text-capitalize"> --}}
                                            {{-- ${{ totalIndirectBusiness($refer->id, 2) }}</td> --}}
                                        {{-- <td class="text-center text-capitalize">{{ inDirectAward($refer->id, 2) }}</td> --}}
                                        <td class="text-center text-capitalize">{{ $refer->status }}</td>
                                        <td class="text-center text-capitalize">{{ $refer->created_at }}</td>
                                        <td>
                                            <form action="{{ route('user.login.user') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $refer->id }}">
                                                <input class="btn btn-sm btn-theme" type="submit" value="Login"
                                                class="login">
                                            </form>
                                        </td>
                                        <td class="text-center text-capitalize"><a href="{{ route('user.team.index',['id' => $refer->id]) }}" class="btn btn-sm btn-theme">Check Tree</a></td>
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

@section('footer')
    <script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script>
        $('#datatableDefault').DataTable({
            dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 text-end'<'d-flex justify-content-end'fB>>>t<'d-flex align-items-center'<'me-auto'i><'mb-0'p>>",
            lengthMenu: [10, 20, 30, 40, 50],
            responsive: true,
            buttons: [{
                    extend: 'print',
                    className: 'btn btn-default'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-default'
                }
            ]
        });
    </script>

@endsection
