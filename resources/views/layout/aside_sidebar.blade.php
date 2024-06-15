<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('home')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @if(auth()->user()->role == 'customer')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('service.offered')}}">
                    <i class="bi bi-person"></i>
                    <span>Services Offered</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('customer.bookings')}}">
                    <i class="bi bi-question-circle"></i>
                    <span>My Bookings </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>History </span>
                </a>
            </li>
        @endif
        @if(auth()->user()->role == 'agent')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('agent.service.bookings')}}">
                    <i class="bi bi-envelope"></i>
                    <span>Bookings</span>
                </a>
            </li>
        @endif
        @if(auth()->user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('all.agents')}}">
                    <i class="bi bi-envelope"></i>
                    <span>Agents</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('all.customers')}}">
                    <i class="bi bi-envelope"></i>
                    <span>Customers</span>
                </a>
            </li>
        @endif
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

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    @if(auth()->user()->role == 'agent')
                        <li>
                            <a href="{{route('agent.get.services')}}">
                                <i class="bi bi-circle"></i><span>My services</span>
                            </a>
                        </li>
                    @endif
                    @if(auth()->user()->role == 'admin')
                        <li>
                            <a href="{{route('services')}}">
                                <i class="bi bi-circle"></i><span>Services</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('logout')}}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>

</aside>
