<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{url('home')}}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                @if(auth()->user()->role == 'customer')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('service.offerred')}}" aria-expanded="false">
                            <i data-feather="tag" class="feather-icon">
                            </i><span class="hide-menu">Services Offered </span></a>
                    </li>
                @endif

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#bookings" aria-expanded="false">
                        <i data-feather="tag" class="feather-icon">
                        </i><span class="hide-menu">Bookings </span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="#agents" aria-expanded="false">
                        <i data-feather="message-square" class="feather-icon"></i>
                        <span class="hide-menu">Agents</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="#history" aria-expanded="false">
                        <i data-feather="calendar" class="feather-icon"></i>
                        <span class="hide-menu">History</span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Agent</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Services </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        @if(auth()->user()->role == 'agent')
                            <li class="sidebar-item"><a href="{{route('agent.get.services')}}" class="sidebar-link">
                                    <span class="hide-menu">Agent Services </span></a>
                            </li>
                        @endif
                        @if(auth()->user()->role == 'admin')
                                <li class="sidebar-item"><a href="{{route('services')}}" class="sidebar-link">
                                        <span class="hide-menu">Services </span></a>
                                </li>
                        @endif
                    </ul>
                </li>

                <li class="list-divider"></li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{url('/')}}" aria-expanded="false">
                        <i data-feather="log-out" class="feather-icon"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
