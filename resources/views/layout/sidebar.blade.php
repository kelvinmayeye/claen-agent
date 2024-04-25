<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{url('home')}}" aria-expanded="false">
                        <i class="fa fa-home"></i>
                        <span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"></span></li>

                @if(auth()->user()->role == 'customer')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('service.offered')}}" aria-expanded="false">
                            <i class="fa fa-tags">
                            </i><span class="hide-menu">Services Offered </span></a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('customer.bookings')}}" aria-expanded="false">
                            <i class="fa fa-box-open">
                            </i><span class="hide-menu">My Bookings </span></a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-clock">
                            </i><span class="hide-menu">History </span></a>
                    </li>
                @endif

                @if(auth()->user()->role == 'agent')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#bookings" aria-expanded="false">
                            <i data-feather="tag" class="feather-icon">
                            </i><span class="hide-menu">Bookings </span></a>
                    </li>
                @endif
                @if(auth()->user()->role == 'admin')
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="{{route('all.agents')}}" aria-expanded="false">
                            <i class="fa fa-user-circle"></i>
                            <span class="hide-menu">Agents</span></a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="{{route('all.customers')}}" aria-expanded="false">
                            <i class="fa fa-users"></i>
                            <span class="hide-menu">Customers</span></a>
                    </li>
                @endif
{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link sidebar-link" href="#history" aria-expanded="false">--}}
{{--                        <i data-feather="calendar" class="feather-icon"></i>--}}
{{--                        <span class="hide-menu">History</span></a>--}}
{{--                </li>--}}

                @if(auth()->user()->role != 'customer')
                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu"></span></li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="file-text" class="feather-icon"></i>
                            <span class="hide-menu">Services </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            @if(auth()->user()->role == 'agent')
                                <li class="sidebar-item"><a href="{{route('agent.get.services')}}" class="sidebar-link">
                                        <span class="hide-menu">My Services </span></a>
                                </li>
                            @endif
                            @if(auth()->user()->role == 'admin')
                                <li class="sidebar-item"><a href="{{route('services')}}" class="sidebar-link">
                                        <span class="hide-menu">Services </span></a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <li class="list-divider"></li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('logout')}}" aria-expanded="false">
                        <i class="fa fa-power-off"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
