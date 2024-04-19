@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Service</label>
                                    <select name="" class="form-select select-service" id="" onchange="selectService(this)">
                                        <option value=""></option>
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-1">
                            <h4 class="card-title">My Services</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead class="bg-primary text-white">
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
                                @foreach($agentServices as $key=>$s)
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
@section('script')
    <script>
        $(document).ready(function() {
            $('.select-service').select2({
                placeholder: "Select a service",
                allowClear: true,
            });
        });

        function selectService(obj){
            let serviceId = $(obj).val();
            console.log(serviceId);
            $.get(`{{route('agent.add.services')}}`,serviceId,function (result){
                if(result.status == 'success'){
                    console.log('horay to ajax');
                }
            });
        }
    </script>
@endsection
