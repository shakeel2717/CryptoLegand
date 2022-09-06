<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') | {{ env('APP_DESC') }}</title>
    <meta name="description" content="{{ env('APP_DESC') }}">
    <meta name="author" content="Asan Webs Development">
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.css') }}" rel="stylesheet" />
    @yield('head')
</head>

<body>
    <!-- BEGIN #app -->
    <div id="app" class="app">
        <!-- BEGIN #header -->
        <div id="header" class="app-header">
            <!-- BEGIN desktop-toggler -->
            <div class="desktop-toggler">
                <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed"
                    data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>
            <!-- BEGIN desktop-toggler -->

            <!-- BEGIN mobile-toggler -->
            <div class="mobile-toggler">
                <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled"
                    data-toggle-target=".app">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>
            <!-- END mobile-toggler -->

            <!-- BEGIN brand -->
            <div class="brand">
                <a href="index.html" class="brand-logo">
                    <span class="brand-img">
                        <span class="brand-img-text text-theme">C</span>
                    </span>
                    <span class="brand-text">{{ env('APP_NAME') }}</span>
                </a>
            </div>
            <!-- END brand -->

            <!-- BEGIN menu -->
            <div class="menu">
                <div class="menu-item dropdown dropdown-mobile-full">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                        <div class="menu-icon"><i class="bi bi-bell nav-icon"></i></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end mt-1 w-300px fs-11px pt-1">
                        <h6 class="dropdown-header fs-10px mb-1">NOTIFICATIONS</h6>
                        <div class="dropdown-divider mt-1"></div>

                        <hr class="bg-white-transparent-5 mb-0 mt-2" />
                        <div class="py-10px mb-n2 text-center">
                            <a href="#" class="text-decoration-none fw-bold">SEE ALL</a>
                        </div>
                    </div>
                </div>
                <div class="menu-item dropdown dropdown-mobile-full">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                        <div class="menu-img online">
                            <img src="{{ asset('assets/profile/' . auth()->user()->profile) }}" alt="Profile"
                                height="60" />
                        </div>
                        <div class="menu-text d-sm-block d-none">{{ auth()->user()->username }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ route('user.profile.index') }}">PROFILE <i
                                class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i></a>
                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ route('user.profile.password.change') }}">ACCOUNT <i
                                class="bi bi-gear ms-auto text-theme fs-16px my-n1"></i></a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" class="dropdown-item d-flex align-items-center" value="LOGOUT">
                        </form>
                    </div>
                </div>
            </div>
            <!-- END menu -->
        </div>
        <!-- END #header -->

        <!-- BEGIN #sidebar -->
        <div id="sidebar" class="app-sidebar">
            <!-- BEGIN scrollbar -->
            <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
                <!-- BEGIN menu -->
                <div class="menu">
                    <div class="menu-header">Navigation</div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.dashboard') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.addBalance') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Add Balance</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.withdrawals.pending') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Pending Withdrawals</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.withdrawals') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All Withdrawals</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.withdrawals.hidden') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Hidden Withdrawals</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.withdrawals.profit') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All Profit Withdarw</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.withdrawals.pending.profit') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Pend. Withdraw Profit</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.withdrawals.pending.profit.hidden') }}"
                            class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Withdraw Profit Hidden</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.email.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Send E-Mails</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.users') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All Users</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.users.online') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Online Users</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.users.rewards') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All Users Rewards</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.user.plan') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">User's Plans</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.user.plan.refund') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Refund Request</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.deposits') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Deposits</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.rois') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All Roi's</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.passive') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All Passive TID</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.global.share') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All Global Share</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.direct.commission') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All Direct Commission</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.indirect.commission') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All Indirect Commission</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.direct.reward') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Direct Rewards</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.indirect.reward') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">In-Direct Rewards</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.tour.dubai') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Dubai Tour Winner</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.networkcap') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All 7x Cap</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.coinpayment') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Comp. Coin Payments</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.coinpayment.other') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Other Coin Payments</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.history.user.support.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">All Support Req</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.winner.self') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Self Sell Winner</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.winner.direct') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Direct Sell Winner</span>
                        </a>
                    </div>
                    <div class="menu-item active">
                        <a href="{{ route('admin.winner.levels') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Levels Sell Winner</span>
                        </a>
                    </div>
                </div>
                <!-- END menu -->
                <div class="p-3 px-4 mt-auto">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="btn d-block btn-outline-theme" type="submit" value="LOGOUT">
                    </form>
                </div>
            </div>
            <!-- END scrollbar -->
        </div>
        <!-- END #sidebar -->

        <!-- BEGIN mobile-sidebar-backdrop -->
        <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app"
            data-toggle-class="app-sidebar-mobile-toggled"></button>
        <!-- END mobile-sidebar-backdrop -->

        @yield('content')

        <!-- ================== BEGIN core-js ================== -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <!-- ================== END core-js ================== -->

        <!-- ================== BEGIN page-js ================== -->
        <script src="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jvectormap-content/world-mill.js') }}"></script>
        <script src="{{ asset('assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/demo/dashboard.demo.js') }}"></script>
        <x-alert />
        @yield('footer')
</body>

</html>
