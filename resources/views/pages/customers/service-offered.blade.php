@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead class="bg-danger-subtle text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Description</th>
                                    <th>Total Agents</th>
                                    <th>Total Bookings</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody class="border border-primary">
                                @foreach($services as $key=>$s)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$s->name}}</td>
                                        <td>{{$s->description}}</td>
                                        <td>{{''}}</td>
                                        <td>{{''}}</td>
                                        <td>Status</td>
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
