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
                                    <label class="text-primary" style="font-weight: bold;">Select Service to add your service</label>
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
                        <div class="">
                            <table class="table table-sm table-bordered">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Description</th>
                                    <th>Total Bookings</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="border border-primary">
                                @foreach($agentServices as $key=>$s)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$s->service->name}}</td>
                                        <td>{{ \Illuminate\Support\Str::words($s->description, 6, '...') }}</td>
                                        <td>{{$s->bookings->count()}}</td>
                                        <td class="fw-bolder text-center">@if($s->status == 'active')
                                                <span class="text-success">{{$s->status}}</span>
                                            @else
                                                <span class="text-danger">{{$s->status}}</span>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="btn-group dropright">
                                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('agent.service.details',$s->id)}}"><i class="fa fa-eye"></i> View </a>
                                                    <a class="dropdown-item" href="{{route('agent.service.change.status',$s->id)}}"><i class="fa fa-toggle-off"></i> Change status</a>
                                                    <a class="dropdown-item" href="{{route('agent.service.delete',$s->id)}}"><i class="fa fa-trash text-danger"></i> Delete</a>
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
            $.get(`{{route('agent.add.services')}}`,{serviceId:serviceId},function (result){
                if(result.status == 'success'){
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
