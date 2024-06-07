<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center mb-1">
                <h4 class="card-title">Bookings</h4>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table no-wrap v-middle mb-0">
                    <thead>

                    <tr class="border-0">
                        <th class="border-0">#</th>
                        <th class="border-0 font-14 font-weight-medium text-muted">Customer
                        </th>
                        <th class="border-0 font-14 font-weight-medium text-muted">Services</th>
                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                            Date and Time
                        </th>
                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                            Place
                        </th>
                        <th class="border-0 font-14 font-weight-medium text-muted">Status</th>
                        <th class="border-0 font-14 font-weight-medium text-muted"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($no=1)
                    @foreach($agentBookings as $booking)
                        <tr>
                            <td class="border">{{$no++}}</td>
                            <td class="border-top-0 px-1 py-1">
                                <div class="d-flex no-block align-items-center">
                                    <div class="me-3"><img
                                            src="{{asset('assets/images/users/avtor.png')}}"
                                            alt="user" class="rounded-circle" width="45"
                                            height="45"/></div>
                                    <div class="">
                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">{{$booking->customer_name}} </h5>
                                    </div>
                                </div>
                            </td>
                            <td class="">
                                <div class="popover-icon">
                                    @foreach($booking->booked_services as $bbs)
                                        <a class="btn btn-primary btn-sm rounded-circle btn-circle font-12"
                                           href="javascript:void(0)">{{ getInitials($bbs->service_name) }}</a>
                                    @endforeach
                                </div>
                            </td>
                            <td class="text-center">{{$booking->date}} - {{$booking->time}}</td>
                            <td class="text-center font-weight-medium text-muted">
                                {{$booking->place}}
                            </td>
                            <td class="font-weight-medium text-center text-dark">{{$booking->booking_status}}</td>
                            <td class="font-weight-medium text-center text-dark">
                                <div class="btn-group dropright">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="fa fa-list"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="">
                                            <i class="fa fa-eye"></i> View </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
