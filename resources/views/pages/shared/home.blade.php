@extends('index')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-10 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">{{auth()->user()->fullname}}</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-2">
                <div class="d-flex justify-content-end">
                    <span class="fw-bolder text-danger-emphasis">{{ucwords(auth()->user()->role)}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- info widgets -->
    @if(auth()->user()->role == 'agent')
        @include('partials.dashboard.info_widgets.agent-info-widgets')
    @endif
    @if(auth()->user()->role == 'customer')
        @include('partials.dashboard.info_widgets.customer-info-widgets')
    @endif
    @if(auth()->user()->role == 'admin')
        @include('partials.dashboard.info_widgets.admin-info-widgets')
    @endif
    <!-- Start Top Leader Table -->
        <!-- *************************************************************** -->
        <div class="row">
            @if(auth()->user()->role == 'admin')
                @include('partials.dashboard.table_section.admin-service-table')
            @endif
            @if(auth()->user()->role == 'agent')
                @include('partials.dashboard.table_section.agent-bookings-table')
            @endif
            @if(auth()->user()->role == 'customer')
                @include('partials.dashboard.table_section.customer-booking-table')
            @endif
        </div>
    </div>
    @include('modals.customers.add-review')
@endsection
