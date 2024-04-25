@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="text-primary">My Bookings</h3>
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
                                        <td>{{$b->service_name}}</td>
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
                                                    <a class="dropdown-item text-primary" href="javascript:void(0)"><i
                                                            class="fa fa-circle"></i> Change Service </a>
                                                    <a class="dropdown-item text-danger">
                                                        <i class="fa fa-bookmark"></i> Cancel</a>
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

    </script>
@endsection
