@extends('user.layout.app')
@section('title', 'Dashboard')
@section('head')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection
@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex fw-bold small mb-3">
                            <span class="flex-grow-1">Earning Balance</span>
                            <a href="#" data-toggle="card-expand"
                                class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-7">
                                <h3 class="mb-0">
                                    ${{ number_format(balance(auth()->user()->id), 2) }}</h3>
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
                            <span class="flex-grow-1">Overall Income</span>
                            <a href="#" data-toggle="card-expand"
                                class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-7">
                                <h3 class="mb-0">
                                    ${{ number_format(inBalance(auth()->user()->id), 2) }}</h3>
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
                            <span class="flex-grow-1">Overall Withdraw</span>
                            <a href="#" data-toggle="card-expand"
                                class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-7">
                                <h3 class="mb-0">
                                    ${{ number_format(withdraw(auth()->user()->id), 2) }}</h3>
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
            <div class="col-md-6">
                <a href="{{ route('user.statement.tour.malaysia') }}" class="card text-decoration-none">
                    <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                        <div class="flex-fill">
                            <div class="text-center">
                                <img src="{{ asset('assets/img/malaysia-tour.jpg') }}" alt="Dubai Tour" width="100%">
                                <h1 id="timer" class="mt-2"></h1>
                            </div>
                        </div>
                    </div>
                    <!-- card-arrow -->
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('user.roi.withdraw.roiWithdraw') }}" class="card text-decoration-none">
                            <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                                <div class="flex-fill">
                                    <div class="mb-1">Daily Profit</div>
                                    <h2>{{ number_format(roiBalance(auth()->user()->id), 2) }}</h2>
                                    <div>${{ number_format(roiBalanceDelivered(auth()->user()->id), 2) }}</div>
                                </div>
                                <div class="opacity-5">
                                    <i class="fa fa-dollar fa-4x"></i>
                                </div>
                            </div>
                            <!-- card-arrow -->
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('user.statement.direct') }}" class="card text-decoration-none">
                            <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                                <div class="flex-fill">
                                    <div class="mb-1">Direct Commission</div>
                                    <h2>{{ number_format(directCommission(auth()->user()->id), 2) }}</h2>
                                    <div>{{ now() }}</div>
                                </div>
                                <div class="opacity-5">
                                    <i class="fa fa-dollar fa-4x"></i>
                                </div>
                            </div>
                            <!-- card-arrow -->
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('user.statement.inDirect') }}" class="card text-decoration-none">
                            <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                                <div class="flex-fill">
                                    <div class="mb-1">In-Direct Team Comm.</div>
                                    <h2>{{ number_format(inDirectTotalCommission(auth()->user()->id), 2) }}</h2>
                                    <div>{{ now() }}</div>
                                </div>
                                <div class="opacity-5">
                                    <i class="fa fa-dollar fa-4x"></i>
                                </div>
                            </div>
                            <!-- card-arrow -->
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('user.statement.passive') }}" class="card text-decoration-none">
                            <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                                <div class="flex-fill">
                                    <div class="mb-1">Team Invested Earning</div>
                                    <h2>{{ number_format(passive(auth()->user()->id), 2) }}</h2>
                                    <div>{{ now() }}</div>
                                </div>
                                <div class="opacity-5">
                                    <i class="fa fa-dollar fa-4x"></i>
                                </div>
                            </div>
                            <!-- card-arrow -->
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('user.statement.passive') }}" class="card text-decoration-none">
                            <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                                <div class="flex-fill">
                                    <div class="mb-1">Invested Profit Estimate</div>
                                    <h2>{{ number_format(userGotRoi(auth()->user()->id), 2) }} /
                                        {{ number_format(userWillGetRoi(auth()->user()->id), 2) }}</h2>
                                    <div>{{ now() }}</div>
                                </div>
                                <div class="opacity-5">
                                    <i class="fa fa-dollar fa-4x"></i>
                                </div>
                            </div>
                            <!-- card-arrow -->
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('user.statement.passive') }}" class="card text-decoration-none">
                            <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                                <div class="flex-fill">
                                    <div class="mb-1">Overall Sales</div>
                                    <h2>${{ number_format(overallSale(auth()->user()->id), 2) }}
                                    </h2>
                                    <div>{{ now() }}</div>
                                </div>
                                <div class="opacity-5">
                                    <i class="fa fa-dollar fa-4x"></i>
                                </div>
                            </div>
                            <!-- card-arrow -->
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header fw-bold small">Direct Business</div>
                    <div class="card-body">
                        <h5 class="card-title">Direct Business Detail</h5>
                        <div>
                            <h3 class="text-uppercase font-size-h3 font-w400 ">Direct Business</h3>
                            <hr>
                            <h2>${{ number_format(directBusiness(auth()->user()->id), 2) }}</h2>
                            <h2 class="mb-3 text-theme">{{ directAward(auth()->user()->id) }}</h2>
                            <hr>
                            <h3 class="text-uppercase ">Reward: <span> $
                                    {{ number_format(directBusinessAward(auth()->user()->id), 2) }}</span>
                            </h3>
                        </div>
                    </div>

                    <!-- arrow -->
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header fw-bold small">In-Direct Business</div>
                    <div class="card-body">
                        <h5 class="card-title">In-Direct Business Detail</h5>
                        <div>
                            <h3 class="text-uppercase font-size-h3 font-w400 ">In-Direct Business</h3>
                            <hr>
                            <h2>${{ number_format(inDirectBusiness(auth()->user()->id), 2) }}</h2>
                            <h2 class="mb-3 text-theme">{{ inDirectAwardWithoutName(auth()->user()->id) }}
                            </h2>
                            <hr>
                            <h3 class="text-uppercase">Reward: <span> $
                                    {{ number_format(InDirectBusinessAward(auth()->user()->id), 2) }}</span>
                            </h3>
                        </div>
                    </div>

                    <!-- arrow -->
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header fw-bold small">Active investment</div>
                    <div class="card-body">
                        <h5 class="card-title">Active investment Detail</h5>
                        <div>
                            <h3 class="text-uppercase font-size-h3 font-w400 ">
                                {{ number_format(myPlanCount(auth()->user()->id), 2) }}</h3>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div id="chart_div"></div>
                                </div>
                                <div class="col-5">
                                    <table class="table table-striped">
                                        <thead class="text-left">
                                            <tr>
                                                <th>Total</th>
                                                <td>${{ number_format(networkCapReach(auth()->user()->id), 2) }}/-
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody class="text-left">
                                            <tr>
                                                <th>Remaining</th>
                                                <td>${{ number_format(networkCapReach(auth()->user()->id) + networkCapRemovedBalance(auth()->user()->id) - networkCap(auth()->user()->id), 2) }}/-
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Achieve</th>
                                                <td>${{ number_format(networkCap(auth()->user()->id) - networkCapRemovedBalance(auth()->user()->id), 2) }}/-
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- arrow -->
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
            <div class="col-md-8">
                <div class="card p-2">
                    <div class=" text-center">
                        {{-- <a class="img-link" href="be_pages_generic_profile.html">
                        <img class="img-avatar img-avatar96 img-avatar-thumb"
                            src="{{ asset('assets/profile/' . auth()->user()->profile) }}" alt="">
                    </a> --}}
                        {{-- <h2 class="fw-bold my-2 text-white">Refer Your Friends and Earn.</h2> --}}
                        <form class="d-flex align-items-center" action="be_pages_jobs_dashboard.html" method="POST"
                            onclick="return false;" _lpchecked="1">
                            <div class="flex-grow-1">
                                <input type="text" class="form-control form-control-lg form-control-alt"
                                    id="referInput" name="referInput"
                                    value="{{ route('register', ['refer' => auth()->user()->username]) }}" readonly>
                            </div>
                            <div class="flex-grow-0 ms-2">
                                <button onclick="copyClipBoard()" type="submit" class="btn btn-lg btn-primary">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-around align-items-center mt-2">
                            <div class="px-2">
                                <p class="fs-3 text-light mb-0">{{ count($refers) }}</p>
                                <p class="text-muted text-white mb-0">
                                    Total Referrals
                                </p>
                            </div>
                            <div class="px-2 border-start">
                                <p class="fs-3 text-light mb-0">
                                    {{ $refers->where('status', 'active')->count() }}
                                </p>
                                <p class="text-muted text-white mb-0">
                                    Active Referrals
                                </p>
                            </div>
                            <div class="px-2 border-start">
                                <p class="fs-3 text-light mb-0">
                                    {{ $refers->where('status', 'pending')->count() }}
                                </p>
                                <p class="text-muted text-white mb-0">
                                    Pending Referrals
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- arrow -->
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <a href="{{ route('user.statement.passive') }}" class="card text-decoration-none">
                    <div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
                        <div class="flex-fill">
                            <div class="mb-1">Online Active User now</div>
                            <h2>{{ number_format(OnlineUserCheck(), 2) }}</h2>
                            <div>{{ now() }}</div>
                        </div>
                        <div class="opacity-5">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                    </div>
                    <!-- card-arrow -->
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block block-rounded block-themed">
                            <div class="block-header bg-theme">
                                <h3 class="block-title">Level wise Business</h3>
                                <div class="block-options">
                                    <a href="{{ route('user.statement.ranks.indirect') }}" class="btn-block-option">
                                        <i class="si si-settings"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Level</th>
                                            <th>Business</th>
                                            <th>Commission</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1st</td>
                                            <td>${{ number_format(IndirectBusinessL1(auth()->user()->id), 2) }}
                                            </td>
                                            <td>${{ number_format(inDirectCommission1(auth()->user()->id), 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2nd</td>
                                            <td>${{ number_format(IndirectBusinessL2(auth()->user()->id), 2) }}
                                            </td>
                                            <td>${{ number_format(inDirectCommission2(auth()->user()->id), 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3rd</td>
                                            <td>${{ number_format(IndirectBusinessL3(auth()->user()->id), 2) }}
                                            </td>
                                            <td>${{ number_format(inDirectCommission3(auth()->user()->id), 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4th</td>
                                            <td>${{ number_format(IndirectBusinessL4(auth()->user()->id), 2) }}
                                            </td>
                                            <td>${{ number_format(inDirectCommission4(auth()->user()->id), 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5th</td>
                                            <td>${{ number_format(IndirectBusinessL5(auth()->user()->id), 2) }}
                                            </td>
                                            <td>${{ number_format(inDirectCommission5(auth()->user()->id), 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6th</td>
                                            <td>${{ number_format(IndirectBusinessL6(auth()->user()->id), 2) }}
                                            </td>
                                            <td>${{ number_format(inDirectCommission6(auth()->user()->id), 2) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="block block-rounded block-themed">
                            <div class="block-header bg-theme">
                                <h3 class="block-title">Team Earning State</h3>
                                <div class="block-options">
                                    <a href="{{ route('user.statement.passive') }}" class="btn-block-option">
                                        <i class="si si-settings"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Level</th>
                                            <th>Profit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Direct</td>
                                            <td>${{ number_format($teamDirect, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>1st Level</td>
                                            <td>${{ number_format($teamInDirect1, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>2nd Level</td>
                                            <td>${{ number_format($teamInDirect2, 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <!-- BEGIN col-6 -->
                    <div class="col-xl-12">
                        <!-- BEGIN card -->
                        <div class="card mb-3">
                            <!-- BEGIN card-body -->
                            <div class="card-body">
                                <!-- BEGIN title -->
                                <div class="d-flex fw-bold small mb-3">
                                    <span class="flex-grow-1">Recent Transaction</span>
                                    <a href="#" data-toggle="card-expand"
                                        class="text-white text-opacity-50 text-decoration-none"><i
                                            class="bi bi-fullscreen"></i></a>
                                </div>
                                <!-- END title -->
                                <!-- BEGIN table -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-borderless mb-2px small text-nowrap">
                                        <tbody>
                                            @forelse ($transactions as $transaction)
                                                <tr>
                                                    <td>
                                                        <span class="d-flex align-items-center">
                                                            <i
                                                                class="bi bi-circle-fill fs-6px text-{{ $transaction->sum == 'in' ? 'success' : 'theme' }} me-2"></i>
                                                            {{ $transaction->type }}
                                                        </span>
                                                    </td>
                                                    <td><small>{{ $transaction->sum == 'in' ? '+' : '-' }}
                                                            ${{ number_format($transaction->amount, 4) }}</small></td>
                                                    <td>
                                                        <span
                                                            class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px"
                                                            style="min-height: 18px">{{ $transaction->status }}</span>
                                                    </td>
                                                    <td>{{ $transaction->reference }}</td>
                                                    <td>{{ $transaction->created_at }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>
                                                        <span class="d-flex align-items-center">
                                                            <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                                            NO Transaction Found
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END table -->
                            </div>
                            <!-- END card-body -->

                            <!-- BEGIN card-arrow -->
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                            <!-- END card-arrow -->
                        </div>
                        <!-- END card -->
                    </div>
                    <div class="col-xl-12">
                        <!-- BEGIN card -->
                        <div class="card mb-3">
                            <!-- BEGIN card-body -->
                            <div class="card-body">
                                <!-- BEGIN title -->
                                <div class="d-flex fw-bold small mb-3">
                                    <span class="flex-grow-1">Dubai Tour Videos</span>
                                    <a href="#" data-toggle="card-expand"
                                        class="text-white text-opacity-50 text-decoration-none"><i
                                            class="bi bi-fullscreen"></i></a>
                                </div>
                                <!-- END title -->
                                <!-- BEGIN table -->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-4 ">
                                            <iframe class="" src="https://www.youtube.com/embed/7IHg5DGB6N4"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="col-md-4">
                                            <iframe class="" src="https://www.youtube.com/embed/DXChOjf9Ej8"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="col-md-4">
                                            <iframe class="" src="https://www.youtube.com/embed/FrvV_DxROkI"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <!-- END table -->
                            </div>
                            <!-- END card-body -->

                            <!-- BEGIN card-arrow -->
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                            <!-- END card-arrow -->
                        </div>
                        <!-- END card -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-opacity-25 mb-3">
                        <div class="card-header fw-bold small text-white">HEADER</div>
                        <div class="card-body">
                            <canvas id="doughnutChart"></canvas>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-opacity-25 mb-3">
                        <div class="card-header fw-bold small text-white">HEADER</div>
                        <div class="card-body">
                            <canvas id="doughnutChart01"></canvas>
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

    </div>
    </div>
    <!-- END #content -->

    <!-- BEGIN btn-scroll-top -->
    <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
    <!-- END btn-scroll-top -->
    <!-- BEGIN theme-panel -->
    <div class="app-theme-panel">
        <div class="app-theme-panel-container">
            <a href="javascript:;" data-toggle="theme-panel-expand" class="app-theme-toggle-btn"><i
                    class="bi bi-sliders"></i></a>
            <div class="app-theme-panel-content">
                <div class="small fw-bold text-white mb-1">Theme Color</div>
                <div class="card mb-3">
                    <!-- BEGIN card-body -->
                    <div class="card-body p-2">
                        <!-- BEGIN theme-list -->
                        <div class="app-theme-list">
                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-pink"
                                    data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a>
                            </div>
                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-red"
                                    data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
                            <div class="app-theme-list-item"><a href="javascript:;"
                                    class="app-theme-list-link bg-warning" data-theme-class="theme-warning"
                                    data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-yellow"
                                    data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a>
                            </div>
                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-lime"
                                    data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a>
                            </div>
                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-green"
                                    data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a>
                            </div>
                            <div class="app-theme-list-item active"><a href="javascript:;"
                                    class="app-theme-list-link bg-teal" data-theme-class="" data-toggle="theme-selector"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                    data-bs-title="Default">&nbsp;</a></div>
                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-info"
                                    data-theme-class="theme-info" data-toggle="theme-selector" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan">&nbsp;</a>
                            </div>
                            <div class="app-theme-list-item"><a href="javascript:;"
                                    class="app-theme-list-link bg-primary" data-theme-class="theme-primary"
                                    data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-purple"
                                    data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a>
                            </div>
                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-indigo"
                                    data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a>
                            </div>
                            <div class="app-theme-list-item"><a href="javascript:;"
                                    class="app-theme-list-link bg-gray-100" data-theme-class="theme-gray-200"
                                    data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-container="body" data-bs-title="Gray">&nbsp;</a></div>
                        </div>
                        <!-- END theme-list -->
                    </div>
                    <!-- END card-body -->

                    <!-- BEGIN card-arrow -->
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                    <!-- END card-arrow -->
                </div>

                <div class="small fw-bold text-white mb-1">Theme Cover</div>
                <div class="card">
                    <!-- BEGIN card-body -->
                    <div class="card-body p-2">
                        <!-- BEGIN theme-cover -->
                        <div class="app-theme-cover">
                            <div class="app-theme-cover-item active">
                                <a href="javascript:;" class="app-theme-cover-link"
                                    style="background-image: url(assets/img/cover/cover-thumb-1.jpg);"
                                    data-theme-cover-class="" data-toggle="theme-cover-selector" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a>
                            </div>
                            <div class="app-theme-cover-item">
                                <a href="javascript:;" class="app-theme-cover-link"
                                    style="background-image: url(assets/img/cover/cover-thumb-2.jpg);"
                                    data-theme-cover-class="bg-cover-2" data-toggle="theme-cover-selector"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                    data-bs-title="Cover 2">&nbsp;</a>
                            </div>
                            <div class="app-theme-cover-item">
                                <a href="javascript:;" class="app-theme-cover-link"
                                    style="background-image: url(assets/img/cover/cover-thumb-3.jpg);"
                                    data-theme-cover-class="bg-cover-3" data-toggle="theme-cover-selector"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                    data-bs-title="Cover 3">&nbsp;</a>
                            </div>
                            <div class="app-theme-cover-item">
                                <a href="javascript:;" class="app-theme-cover-link"
                                    style="background-image: url(assets/img/cover/cover-thumb-4.jpg);"
                                    data-theme-cover-class="bg-cover-4" data-toggle="theme-cover-selector"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                    data-bs-title="Cover 4">&nbsp;</a>
                            </div>
                            <div class="app-theme-cover-item">
                                <a href="javascript:;" class="app-theme-cover-link"
                                    style="background-image: url(assets/img/cover/cover-thumb-5.jpg);"
                                    data-theme-cover-class="bg-cover-5" data-toggle="theme-cover-selector"
                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                    data-bs-title="Cover 5">&nbsp;</a>
                            </div>
                        </div>
                        <!-- END theme-cover -->
                    </div>
                    <!-- END card-body -->

                    <!-- BEGIN card-arrow -->
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                    <!-- END card-arrow -->
                </div>
            </div>
        </div>
    </div>
    <!-- END theme-panel -->
    </div>
@endsection
@section('footer')
    <script>
        function copyClipBoard() {
            var copyText = document.getElementById("referInput");
            copyText.select();
            document.execCommand("copy");
        }
    </script>
    <script src="https://www.bootstrapdash.com/demo/libertyui/template/vendors/c3/c3.js"></script>
    <script src="{{ asset('assets/plugins/chart.js/dist/chart.min.js') }}"></script>
    <script>
        var ctx6 = document.getElementById('doughnutChart');
        var doughnutChart = new Chart(ctx6, {
            type: 'doughnut',
            data: {
                labels: ['Profit', 'Direct Commission', 'In-Direct Commission', 'Direct Business Reward',
                    'In-Direct Business Reward'
                ],
                datasets: [{
                    data: [{{ totalRoiBalanceIn(auth()->user()->id) }},
                        {{ directCommission(auth()->user()->id) }},
                        {{ inDirectTotalCommission(auth()->user()->id) }},
                        {{ directBusiness(auth()->user()->id) }},
                        {{ inDirectBusiness(auth()->user()->id) }}
                    ],
                    backgroundColor: ['rgba(' + app.color.themeRgb + ', .1)', 'rgba(' + app.color.themeRgb +
                        ', .5)', 'rgba(' + app.color.themeRgb + ', .10)', app.color.theme, app.color
                        .white, app.color.gray900
                    ],
                    hoverBackgroundColor: [app.color.theme, app.color.white, app.color.gray900],
                    borderWidth: 0
                }]
            }
        });
    </script>
    <script>
        var ctx6 = document.getElementById('doughnutChart01');
        var doughnutChart01 = new Chart(ctx6, {
            type: 'doughnut',
            data: {
                labels: ['Income Recieved', 'income Remaining'],
                datasets: [{
                    data: [
                        {{ inBalance(auth()->user()->id) + totalRoiBalanceIn(auth()->user()->id) }},
                        {{ (myPlan(auth()->user()->id) + totalRoiBalanceIn(auth()->user()->id)) * 7 - inBalance(auth()->user()->id) }}
                    ],
                    backgroundColor: [app.color.theme, app.color.gray900],
                    hoverBackgroundColor: [app.color.theme, app.color.gray900],
                    borderWidth: 0
                }]
            }
        });

        google.charts.load('current', {
            'packages': ['gauge']
        });
        google.charts.setOnLoadCallback(drawChart02);

        function drawChart02() {
            var data = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['7x Cap', {{ networkCapProgress(auth()->user()->id) }}],
            ]);
            var options = {
                width: 400,
                height: 150,
                redFrom: 90,
                redTo: 100,
                yellowFrom: 75,
                yellowTo: 90,
                minorTicks: 10
            };
            var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
            chart.draw(data, options);
        }


        // make a timer countdown function for the timer
        var countDownDate = new Date("{{ date('M d, Y H:i:s', strtotime('2022-07-13 12:59:59')) }}").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("timer").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds +
                "s ";
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endsection
