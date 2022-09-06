@extends('admin.layout.app')
@section('title', 'Pricing Plans')
@section('head')
    <link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-md-12" style="overflow: scroll;">
                <div class="card border-theme bg-theme bg-opacity-5 mb-3">
                    <div class="card-header border-theme fw-bold small text-white">HEADER</div>
                    <div class="card-body">
                        <table class="table text-nowrap w-100" id="datatableDefault">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 80px;">#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    {{-- <th>Delete</th> --}}
                                    <th>Email</th>
                                    <th>Balance</th>
                                    <th>ROI Bal</th>
                                    <th>Plans</th>
                                    <th>Upliner</th>
                                    <th>Status</th>
                                    <th>Network</th>
                                    <th>Verify</th>
                                    <th>Action</th>
                                    <th>ROI</th>
                                    <th>Sell Stop</th>
                                    <th>Passive</th>
                                    <th>Login</th>
                                    <th>Winner</th>
                                    <th>Net Pass</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center text-capitalize">{{ $user->name }}</td>
                                        <td class="text-center text-capitalize">{{ $user->username }}</td>
                                        {{-- <td class="text-center text-capitalize"><a href="{{ route('admin.history.user.delete',['id' => $user->id]) }}" class="btn btn-danger text-white">Delete</a></td> --}}
                                        <td class="text-center text-capitalize">{{ $user->email }}</td>
                                        <td class="text-center">${{ number_format(balance($user->id), 2) }}</td>
                                        <td class="text-center">${{ number_format(roiBalance($user->id), 2) }}</td>
                                        <td class="text-center">${{ number_format(myPlanCount($user->id), 2) }}</td>
                                        <td class="text-center text-capitalize">{{ $user->refer }}</td>
                                        <td class="text-center text-capitalize">{{ $user->status }}</td>
                                        <td class="text-center text-capitalize">{{ $user->network == 1 ? 'Yes' : 'No' }}
                                        </td>
                                        @if ($user->email_verified_at == null)
                                            <td><a href="{{ route('admin.user.verified', ['id' => $user->id]) }}"
                                                    class="btn btn-dark">Verify</a></td>
                                        @else
                                            <td>Verified</td>
                                        @endif
                                        <td class="text-center text-capitalize">
                                            @if ($user->network == 1)
                                                <a href="{{ route('admin.history.user.plan.unPin', ['id' => $user->id]) }}"
                                                    class="btn btn-sm btn-success">Make Normal</a>
                                        </td>
                                    @else
                                        <a href="{{ route('admin.history.user.plan.makePin', ['id' => $user->id]) }}"
                                            class="btn btn-sm btn-primary">Make PIN</a></td>
                                @endif
                                @if ($user->roi == 1)
                                    <td class="text-center"><a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.history.users.stop.ROi', ['user' => $user->id]) }}">Stop</a>
                                    </td>
                                @elseif ($user->roi == 0)
                                    <td class="text-center"><a class="btn btn-success btn-sm"
                                            href="{{ route('admin.history.users.start.ROi', ['user' => $user->id]) }}">Start</a>
                                    </td>
                                @endif
                                @if ($user->sale == 1)
                                    <td class="text-center"><a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.history.user.sale.stop', ['id' => $user->id]) }}">Sale
                                            Stop</a>
                                    </td>
                                @else
                                    <td class="text-center"><a class="btn btn-success btn-sm"
                                            href="{{ route('admin.history.user.sale.start', ['id' => $user->id]) }}">Start
                                            Sale</a>
                                    </td>
                                @endif

                                @if ($user->passive == 1)
                                    <td class="text-center"><a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.history.user.passive.stop', ['id' => $user->id]) }}">Passive
                                            Stop</a>
                                    </td>
                                @else
                                    <td class="text-center"><a class="btn btn-success btn-sm"
                                            href="{{ route('admin.history.user.passive.start', ['id' => $user->id]) }}">Passive
                                            Start</a>
                                    </td>
                                @endif


                                <td>
                                    <form action="{{ route('admin.login.user') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input class="btn btn-sm btn-dark" type="submit" value="Login" class="login">
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('admin.winner.user', ['user' => $user->id]) }}">Winner</a>
                                </td>
                                @if ($user->power == 'default')
                                    <td class="text-center"><a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.history.user.netowrk.access', ['id' => $user->id]) }}">Network
                                            Access</a>
                                    </td>
                                @else
                                    <td class="text-center"><a class="btn btn-success btn-sm"
                                            href="{{ route('admin.history.user.netowrk.denied', ['id' => $user->id]) }}">Remove
                                            Network Access</a>
                                    </td>
                                @endif
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
