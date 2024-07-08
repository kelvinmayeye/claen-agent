@extends('index')
@section('extra-css')
    <style>
        .custom-checkbox-lg {
            width: 20px;
            height: 20px;
        }

        .custom-checkbox-label {
            width: 20px;
            height: 20px;
            display: inline-block;
            position: relative;
            top: -10px; /* Adjust the alignment as needed */
            left: -10px; /* Adjust the alignment as needed */
        }

        .custom-checkbox-success .form-check-input {
            width: 40px;
            height: 40px;
            border: 2px solid #198754; /* Bootstrap's success color */
        }

        .custom-checkbox-success .form-check-input:checked {
            background-color: #198754; /* Bootstrap's success color for the checked state */
            border-color: #198754; /* Ensure the border remains the same color when checked */
        }
    </style>
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
                            <div><a href="{{route('customer.bookings')}}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-arrow-left"></i> back</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="vstack gap-1">
                                    <div class="fs-5"><span class="fw-semibold">Booking Number</span> <span
                                            class="text-info" id="booking_number">{{$booking->id}}</span></div>
                                    <!-- booking number is here watch out -->
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
                                        <span
                                            class="text-info">{{\Carbon\Carbon::parse($booking->created_at)->format('Y-m-d H:i:s')}}</span>
                                    </div>
                                    @if($booking->booking_status == 'cancelled')
                                        <div class="fs-5"><span class="fw-semibold">Cancelled At</span> <span
                                                class="text-info">{{\Carbon\Carbon::parse($booking->canceled_at)->format('Y-m-d H:i:s')}}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><p class="pt-1 fs-4 fw-bold text-center">Booked Service List</p>
                            </div>
                            <div class="col-md-12">
                                @php($no=1)
                                <table class="table table-bordered table-sm table-hover">
                                    <tr class="bg-dark-subtle">
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
                                                @if($booking->status == 'pending')
                                                    <div class="btn-group dropdown-menu-right">
                                                        <button type="button"
                                                                class="btn btn-secondary btn-sm dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <i class="fa fa-list"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item text-primary"
                                                               data-bs-target="#change-booked-service-modal"
                                                               data-bs-toggle="modal"
                                                               data-service="{{$bs->agent_service_id}}"
                                                               data-service-name="{{$bs->service_name}}"
                                                               data-agent-name="{{$bs->agent_name}}">
                                                                <i class="fa fa-random"></i> Change</a>

                                                            <a class="dropdown-item text-danger"
                                                               href="{{route('customer.delete.service',$bs->agent_service_id)}}"
                                                               data-confirm-delete="true"><i class="fa fa-trash"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                @endif
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
    @include('modals.customers.change-booked-service')

@endsection

@section('script')
    <script>
        let change_booked_service_modal = $('#change-booked-service-modal');
        change_booked_service_modal.on('show.bs.modal', function (e) {
            let source = $(e.relatedTarget);
            let selected_service = source.data('service');
            let selected_service_name = source.data('service-name');
            let agent_name = source.data('agent-name');
            // paste to the modal
            $('#agent_name').html(agent_name);
            $('#service_name').html(selected_service_name);
            let book_number = $('#booking_number').text() || '';
            console.log(selected_service);

            // for ajax
            $('#booking_id_update').val('').val(book_number || null);
            $('#service_id_update').val('').val(selected_service || null);
            getAgentServices(book_number, selected_service);
        })

        function getAgentServices(book_number, selected_service) {

            $.post(`{{ route('ajax.get.agent.service.change') }}`, {
                _token: '{{ csrf_token() }}',
                book_number: book_number,
                selected_service: selected_service
            }, (result) => {
                if (result.status === 'success') {
                    let service = result.data;
                    $('.service-holder').empty();
                    if (result.data.length > 0) {
                        $.each(service, function (i, val) {
                            let row = `<li class="list-group-item">
                                    <div class="d-flex align-items-center">
                                      <div class="form-check form-check-lg me-3 custom-checkbox-success">
                                        <input type="hidden" value="" name="">
                                         <input class="form-check-input" value="${val.id}" type="checkbox" name="bookedservice[${val.id}]">
                                           <label class="form-check-label" for="exampleCustomCheckbox12"></label>
                                      </div>
                                        <div>
                                          <div class="fw-bold">${val.service_name}
                                        </div>
                                    <div class="text-muted"><i>${val.agent_name}</i></div>
                                  </div>
                                 </div>
                                </li>`;
                            $('.service-holder').append(row);

                        });
                    } else {
                        let row = `
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="form-check form-check-lg me-3 custom-checkbox-success">
                                    <label class="form-check-label" for="exampleCustomCheckbox12"></label>
                                </div>
                                <div>
                                    <div class="fw-bold">No service other than the selected one</div>
                                </div>
                            </div>
                        </li>`;
                        $('.service-holder').append(row);
                    }
                    // $('#agent-id').val('').val(agent_id);

                }
            });
        }
    </script>
@endsection
