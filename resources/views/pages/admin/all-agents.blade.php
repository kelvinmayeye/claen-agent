@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4>All Agents</h4>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <table class="table table-sm">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Fullname</th>
                                    <th>Sex</th>
                                    <th>Age</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="border border-primary">
                                @foreach($agents as $key=>$agent)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$agent->fullname}}</td>
                                        <td>{{$agent->sex}}</td>
                                        <td>{{$agent->age}}</td>
                                        <td>{{$agent->email}}</td>
                                        <td>{{$agent->phone_number}}</td>
                                        <td>{{$agent->status}}</td>
                                        <td style="text-align: center;">
                                            <div class="btn-group dropright">
                                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('change.user.status',$agent->id)}}"><i class="fa fa-toggle-off"></i> Change status</a>
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
        $(document).ready(function() {

        });
    </script>
@endsection
