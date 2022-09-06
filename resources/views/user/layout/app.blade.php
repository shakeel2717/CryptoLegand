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
                            href="{{ route('user.profile.password.change') }}">Change Password <i
                                class="bi bi-gear ms-auto text-theme fs-16px my-n1"></i></a>
                        @if (auth()->user()->power == 'network')
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ route('user.network.index') }}">Network Panel <i
                                    class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i></a>
                        @endif
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
                        <a href="{{ route('user.dashboard') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </div>
                    <div class="menu-header">Investments</div>
                    <div class="menu-item">
                        <a href="{{ route('user.deposit.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Add Balance</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('user.plan.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Packages</span>
                        </a>
                    </div>
                    <div class="menu-header">Withdraw Request</div>
                    <div class="menu-item">
                        <a href="{{ route('user.withdraw.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Withdraw</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('user.roi.withdraw.roiWithdraw') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Profit Withdraw</span>
                        </a>
                    </div>
                    <div class="menu-header">Ranks Detail</div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-pie-chart"></i></span>
                            <span class="menu-text">Ranks Detail</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu" style="display: none;">
                            <div class="menu-item">
                                <a href="{{ route('user.statement.ranks') }}" class="menu-link">
                                    <span class="menu-text">Direct Rank</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.ranks.indirect') }}" class="menu-link">
                                    <span class="menu-text">In-Direct Rank</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="" class="menu-link">
                                    <span class="menu-text"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-header">Affiliate Detail</div>
                    @if (auth()->user()->power == 'network')
                        <div class="menu-item">
                            <a href="{{ route('user.network.index') }}" class="menu-link">
                                <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                                <span class="menu-text">Network Panel</span>
                            </a>
                        </div>
                    @endif
                    <div class="menu-item">
                        <a href="{{ route('user.team.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">My Team</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('user.statement.direct.team') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Direct Team</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('user.statement.inDirect.team') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">In-Direct Team</span>
                        </a>
                    </div>
                    <div class="menu-header">My InDirect Comm.</div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-pie-chart"></i></span>
                            <span class="menu-text">InDirect Statement</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu" style="display: none;">
                            <div class="menu-item">
                                <a href="{{ route('user.statement.indirect.level1') }}" class="menu-link">
                                    <span class="menu-text">Level 1 Commission</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.indirect.level2') }}" class="menu-link">
                                    <span class="menu-text">Level 2 Commission</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.indirect.level3') }}" class="menu-link">
                                    <span class="menu-text">Level 3 Commission</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.indirect.level4') }}" class="menu-link">
                                    <span class="menu-text">Level 4 Commission</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.indirect.level5') }}" class="menu-link">
                                    <span class="menu-text">Level 5 Commission</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.indirect.level6') }}" class="menu-link">
                                    <span class="menu-text">Level 6 Commission</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-header">Malaysia Tour Winner</div>
                    <div class="menu-item">
                        <a href="{{ route('user.statement.tour.malaysia') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Malaysia Tour</span>
                        </a>
                    </div>
                    <div class="menu-header">Account Statement</div>
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-pie-chart"></i></span>
                            <span class="menu-text">Account Statement</span>
                            <span class="menu-caret"><b class="caret"></b></span>
                        </a>
                        <div class="menu-submenu" style="display: none;">
                            <div class="menu-item">
                                <a href="{{ route('user.statement.deposits') }}" class="menu-link">
                                    <span class="menu-text">All Deposits</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.plan.active.index') }}" class="menu-link">
                                    <span class="menu-text">All Investment</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.withdrawals') }}" class="menu-link">
                                    <span class="menu-text">All Withdawals</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.roi') }}" class="menu-link">
                                    <span class="menu-text">Daily Profits</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.roi.withdrawals') }}" class="menu-link">
                                    <span class="menu-text">Daily Profits Withdrawals</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.passive') }}" class="menu-link">
                                    <span class="menu-text">All Team Earning</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.direct') }}" class="menu-link">
                                    <span class="menu-text">Direct Commission</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.inDirect') }}" class="menu-link">
                                    <span class="menu-text">In-Direct Team Comm.</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.reward') }}" class="menu-link">
                                    <span class="menu-text">Direct Business Reward</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.indirect.award') }}" class="menu-link">
                                    <span class="menu-text">In-Direct Business Reward</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('user.statement.global.share') }}" class="menu-link">
                                    <span class="menu-text">Global Share Reward</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-header">Refund</div>
                    <div class="menu-item">
                        <a href="{{ route('user.plan.active.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Capital Refund Request</span>
                        </a>
                    </div>
                    <div class="menu-header">My Account</div>
                    <div class="menu-item">
                        <a href="{{ route('user.profile.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">My Profile</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('user.profile.password.change') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Change Password</span>
                        </a>
                    </div>
                    <div class="menu-header">Help \ Support</div>
                    <div class="menu-item">
                        <a href="{{ route('user.support.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Support Section</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('user.support.create') }}" class="menu-link">
                            <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                            <span class="menu-text">Create new Ticket</span>
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
        <script>
            // sending ajax request with logged in user id post request run every 5 seconds
            setInterval(function() {
                $.ajax({
                    url: "{{ route('user.live.user', ['id' => Auth::user()->id]) }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        // alert(data);
                    },
                    error: function(data) {
                        alert(data);
                    }
                });
            }, 10000);
        </script>
</body>

</html>
