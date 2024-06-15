@extends('theme')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4>All Customers</h4>
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
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="border border-primary">
                                @foreach($customers as $key=>$customer)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$customer->fullname}}</td>
                                        <td>{{$customer->sex}}</td>
                                        <td>{{$customer->age}}</td>
                                        <td>{{$customer->role}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->phone_number}}</td>
                                        <td>{{$customer->status}}</td>
                                        <td style="text-align: center;">
                                            <div class="btn-group dropright">
                                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-toggle-off"></i> Change status</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash text-danger"></i> Delete</a>
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
