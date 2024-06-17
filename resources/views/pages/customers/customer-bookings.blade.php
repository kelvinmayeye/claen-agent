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
                                <h3 class="text-primary">My Bookings</h3></div>
                            <div><a href="" data-bs-target="#book-multiple-service-modal" data-bs-toggle="modal" class="btn btn-primary btn-sm">Create Booking</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <table id="zero_config"
                                   class="table border table-sm table-striped table-bordered text-nowrap">
                                <thead class="bg-primary text-light">
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Agent</th>
                                    <th>Phone number</th>
                                    <th>Booked At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="border border-primary">
                                @foreach($bookings as $key=>$b)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$b->bookingServices->count().' services'}}</td>
                                        <td>{{$b->agent_name}}</td>
                                        <td>{{$b->agent_phone}}</td>
                                        <td>{{ \Carbon\Carbon::parse($b->created_at)->diffForHumans() }}</td>
                                        <td>{{$b->status}}</td>
                                        <td style="text-align: center;">
                                            <div class="btn-group dropdown-menu-right">
                                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item text-primary" href="{{route('customer.view.booking',$b->id)}}">
                                                        <i class="fa fa-eye"></i> View </a>
                                                    @if($b->status == 'pending')
                                                        <a href="{{route('customer.cancel.bookings',$b->id)}}" class="dropdown-item text-danger" data-confirm-delete="true">
                                                            <i class="fa fa-times"></i> Cancel</a>
                                                    @endif
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
        </div>
    </div>
    @include('modals.customers.book-multiple-services-blade')

@endsection

@section('script')
    <script>

    </script>
@endsection
