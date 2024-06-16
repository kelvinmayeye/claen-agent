@extends('index')
@section('extra-css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="text-primary"></h3></div>
                                                        <div><a href="{{route('customer.bookings')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> back</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="vstack gap-1">
                                    <div class="fs-5"><span class="fw-semibold">Booked By</span> <span
                                            class="text-info">{{$booking->customer_name}}</span></div>
                                    <div class="fs-5"><span class="fw-semibold">Agent Name</span> <span
                                            class="text-info">{{$booking->agent_name}}</span></div>
                                    <div class="fs-5"><span class="fw-semibold">Place</span> <span
                                            class="text-info">{{$booking->place}}</span></div>
                                    <div class="fs-5"><span class="fw-semibold">Status</span> <span
                                            class="{{$booking->booking_status == 'cancelled'?'text-danger':'text-success'}}">{{$booking->booking_status}}</span>
                                    </div>
                                    @if($booking->booking_status == 'cancelled')
                                        <div class="fs-5"><span class="fw-semibold">By</span> <span
                                                class="text-info">{{$booking->cancellor_name}}</span></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="vstack gap-1">
                                    <div class="fs-5"><span class="fw-semibold">Date</span> <span
                                            class="text-info">{{$booking->date}}</span></div>
                                    <div class="fs-5"><span class="fw-semibold">Time</span> <span
                                            class="text-info">{{$booking->time}}</span></div>
                                    <div class="fs-5"><span class="fw-semibold">Booked At</span>
                                        <span class="text-info">{{\Carbon\Carbon::parse($booking->created_at)->format('Y-m-d H:i:s')}}</span></div>
                                    @if($booking->booking_status == 'cancelled')
                                        <div class="fs-5"><span class="fw-semibold">Cancelled At</span> <span
                                                class="text-info">{{\Carbon\Carbon::parse($booking->canceled_at)->format('Y-m-d H:i:s')}}</span></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><p class="pt-1 fs-4 fw-bold text-center">Booked Service List</p></div>
                            <div class="col-md-12">
                                @php($no=1)
                                <table class="table table-bordered table-sm table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    @foreach($booking->booked_services as $bs)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$bs->service_name}}</td>
                                            <td>{{$bs->status}}</td>
                                            <td style="text-align: center;">
                                                <div class="btn-group dropdown-menu-right">
                                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <i class="fa fa-list"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if($booking->status == 'pending')
                                                            <a class="dropdown-item text-primary" href="#">
                                                                <i class="fa fa-eye"></i> View </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

    </script>
@endsection
