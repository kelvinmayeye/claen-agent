@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-1">
                            <h4 class="card-title">{{$agentService->service->name}}</h4>
                        </div>
                        <form action="{{route('agent.service.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="agent_service_id" value="{{$agentService->id}}">
                            <div class="">
                                <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="add your service description">{{$agentService->description}}</textarea>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary btn-sm">save</button>
                            </div>
                        </form>
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
