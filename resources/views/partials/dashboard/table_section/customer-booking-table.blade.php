<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center mb-1">
                <h4 class="card-title">My Bookings</h4>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-sm no-wrap v-middle mb-0">
                    <thead>

                    <tr class="border-0 bg-primary-subtle text-danger-emphasis">
                        <th class="border-0">#</th>
                        <th class="border-0 font-14 font-weight-medium">Total Services</th>
                        <th class="border-0 font-14 font-weight-medium text-center">
                            Date and Time
                        </th>
                        <th class="border-0 font-14 font-weight-medium text-center">
                            Place
                        </th>
                        <th class="border-0 font-14 font-weight-medium">Status</th>
                        <th class="border-0 font-14 font-weight-medium"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($no=1)
                    @foreach($customerBookings as $booking)
                        <tr>
                            <td class="border">{{$no++}}</td>
                            <td class="text-primary">{{$booking->booked_services_count}} Services
                            </td>
                            <td class="text-center">{{$booking->date}} - {{$booking->time}}</td>
                            <td class="text-center font-weight-medium text-muted">
                                {{$booking->place}}
                            </td>
                            <td class="font-weight-medium text-center text-dark">{{$booking->booking_status}}</td>
                            <td style="text-align: center;">
                                <div class="btn-group dropright">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-primary"
                                           href="{{route('agent.view.customer.booking',$booking->id)}}"><i
                                                class="fa fa-eye"></i> View </a>
                                        <a class="dropdown-item text-success"
                                           href="#" data-agentid="{{$booking->agent_id}}" data-bs-target="#add-review-modal" data-bs-toggle="modal"><i class="fa fa-edit" title="add review"></i> Review </a>
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
