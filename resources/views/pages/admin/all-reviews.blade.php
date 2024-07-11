@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h2>All Reviews</h2></div>
                    <div class="card-body">
                        <div class="">
                            <table class="table table-sm table-bordered">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Comment</th>
                                    <th>Customer</th>
                                    <th>Sex</th>
                                    <th>Age</th>
                                    <th>Phone number</th>
                                    <th>To Agent</th>
                                </tr>
                                </thead>
                                <tbody class="border border-primary">
                                @foreach($reviews as $key=>$r)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$r->comment}}</td>
                                        <td>{{$r->customer_name}}</td>
                                        <td>{{$r->sex}}</td>
                                        <td>{{$r->age}}</td>
                                        <td>{{$r->phone_number}}</td>
                                        <td style="text-align: center;">{{$r->agent_name}}</td>
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
