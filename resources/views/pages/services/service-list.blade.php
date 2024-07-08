@extends('index')
@section('content')
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-1">
                            <h4 class="card-title">All services</h4>
                            <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#success-header-modal">Add Service</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Description</th>
                                    <th style="width: 10%">Total Agents</th>
                                    <th style="width: 12%">Total Bookings</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody class="border border-primary">
                                @foreach($services as $key=>$s)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td class="fw-bolder">{{$s->name}}</td>
                                        <td>{{ \Illuminate\Support\Str::words($s->description, 6, '...') }}</td>
                                        <td class="text-center">{{totalAgentPerService($s->id)}}</td>
                                        <td class="text-center">{{totalBookingPerService($s->id)}}</td>
                                        <td class="text-center fw-bolder text-danger-emphasis">{{$s->status}}</td>
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
    @include('modals.add-service-modal')
@endsection
