<!-- Success Header Modal -->
<div id="book-multiple-service-modal" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="success-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-success">
                <h4 class="modal-title" id="success-header-modalLabel">Book Service</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-hidden="true"></button>
            </div>
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="booked_service[agent_service_id]" class="agent-service-id">
                    <input type="hidden" name="agent_id" class="agent-id">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Service name</label>
                            <h2 class="service-name text-success" style="font-weight: bold;"></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label>Date</label><span class="text-danger">*</span>
                            <input type="date" class="form-control" min="{{now()->format('Y-m-d')}}" name="date"
                                   required>
                        </div>

                        <div class="col-md-4 mb-2">
                            <label>Time</label><span class="text-danger">*</span>
                            <input type="time" class="form-control" name="time" required>
                        </div>

                        <div class="col-md-4 mb-2">
                            <label>Place</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="place" required>
                        </div>

                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea class="form-control" name="description"
                                      placeholder="add description about this booking" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-between py-3">
                            <div>Services Select</div>
                            <div><span>Select Agent:
                                    <select type="text" class="form-control" onchange="getAgentServices(this)">
                                        <option value="" selected disabled>-- Selected Agent</option>
                                        @foreach($agents as $ag)
                                            <option value="{{$ag->id}}">{{$ag->first_name}}</option>
                                        @endforeach
                                    </select></span></div>
                        </div>
                        <div class="service-list" style="max-height: 260px;overflow-y: auto;">
                            <div class="row d-flex justify-content-center container">
                                <div class="col-md-12">
                                    <div class="card mb-3 border border-primary">
                                        <div class="card-body p-0">
                                            <div class="scroll-area-sm">
                                                <div class="list-group list-group-flush service-holder">
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center">
                                                            <div class="form-check form-check-lg me-3 custom-checkbox-success">

                                                                <label class="form-check-label" for="exampleCustomCheckbox12"></label>
                                                            </div>
                                                            <div>
                                                                <div class="fw-bold">No Agent Select
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function getAgentServices(obj){
        let agent_id = $(obj).val() || '';

        $.post(`{{ route('ajax.get.agent.service') }}`, {
            _token: '{{ csrf_token() }}',
            agent_id: agent_id
        }, (result) => {
            if (result.status === 'success'){
                let service = result.data;
                $('.service-holder').empty();
                $.each(service,function (i,val){
                    let row = `<li class="list-group-item">
                                    <div class="d-flex align-items-center">
                                      <div class="form-check form-check-lg me-3 custom-checkbox-success">
                                        <input class="form-check-input" type="checkbox" id="exampleCustomCheckbox12">
                                           <label class="form-check-label" for="exampleCustomCheckbox12"></label>
                                      </div>
                                        <div>
                                          <div class="fw-bold">${val.service_name}
                                        </div>
                                    <div class="text-muted"><i>${val.agent_name}</i></div>
                                  </div>
                                 </div>
                                </li>`;
                    $('.service-holder').append(row);

                });

            }
        });
    }
</script>

