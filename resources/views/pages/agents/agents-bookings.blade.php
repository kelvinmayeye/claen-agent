@extends('theme')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-1">
                            <h4 class="card-title">Bookings From Customer</h4>
                        </div>
                        <div class="">
                            <table class="table table-sm">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Services</th>
                                    <th>Place</th>
                                    <th>Date/Time</th>
                                    <th>Booked At</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="border border-primary">
                                @foreach($bookings as $key=>$b)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$b->customer_name}}</td>
                                        <td>
                                            <button type="button"
                                                    class="btn btn-primary btn-sm btn-rounded"
                                                    data-bs-container="body"
                                                    data-bs-toggle="popover"
                                                    data-bs-placement="top"
                                                    data-bs-html="true"
                                                    data-bs-content='<div class="popover-content">
                                                <h5>Booked Services</h5>
                                                <p>{{$b->service_name}}.</p>
                                            </div>'>
                                            Services
                                            </button>
                                        </td>
                                        <td>{{$b->place}}</td>
                                        <td>{{$b->date.'-'.$b->time}}</td>
                                        <td>{{$b->created_at}}</td>
                                        <td>@if($b->booking_status == 'done')
                                                <span class="text-success">{{$b->status}}</span>
                                            @else
                                                <span class="text-danger">{{$b->status}}</span>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="btn-group dropright">
                                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                       href="{{route('agent.view.customer.booking',$b->id)}}"><i
                                                            class="fa fa-eye"></i> View </a>
                                                    <a class="dropdown-item"
                                                       href="{{route('agent.service.change.status',$b->id)}}"><i
                                                            class="fa fa-toggle-off"></i> Change status</a>
                                                    <a class="dropdown-item"
                                                       href="{{route('agent.service.delete',$b->id)}}"><i
                                                            class="fa fa-trash text-danger"></i> Delete</a>
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
@endsection
@section('script')
    <script>
        $(document).ready(function () {

        });

    </script>
@endsection
