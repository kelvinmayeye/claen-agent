@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="text-primary">Service Offered</h3>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <table id="zero_config"
                                   class="table border table-sm table-striped table-bordered text-nowrap">
                                <thead class="bg-primary text-light">
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Description</th>
                                    <th>Agents</th>
                                    <th>Phone number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="border border-primary">
                                @foreach($services as $key=>$s)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$s->service->name}}</td>
                                        <td>{{$s->description}}</td>
                                        <td>{{$s->agent->fullname}}</td>
                                        <td>{{$s->agent->phone_number}}</td>
                                        <td style="text-align: center;">
                                            <div class="btn-group dropright">
                                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item text-primary" href="javascript:void(0)"><i
                                                            class="fa fa-eye"></i> More details </a>
                                                    <a class="dropdown-item text-success" data-service-details="{{$s}}"
                                                       data-bs-target="#book-service-modal" data-bs-toggle="modal">
                                                        <i class="fa fa-bookmark"></i> Book</a>
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
    @include('modals.customers.book-service-modal')
@endsection

@section('script')
    <script>
        $('#book-service-modal').on('show.bs.modal', function (e) {
            let source = $(e.relatedTarget);
            let agent_service_detail = source.data('service-details');
            if (agent_service_detail != null) {
                $('#book-service-modal').find('.service-name').text('').html(agent_service_detail.service.name)
                $('#book-service-modal').find('.agent-service-id').val('').val(agent_service_detail.id);
                $('#book-service-modal').find('.agent-id').val('').val(agent_service_detail.agent.id);
                console.log(agent_service_detail);
            }
        });
    </script>
@endsection
