<!-- Success Header Modal -->
<div id="change-booked-service-modal" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="success-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-success">
                <h4 class="modal-title" id="success-header-modalLabel">Change Service</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-hidden="true"></button>
            </div>
            <form action="{{route('customer.change.booking')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="booking_id" id="booking_id_update">
                    <input type="hidden" name="service_id_update" id="service_id_update">
                    <div class="row">
                        <div><span class="fw-bolder fs-3">Booking Agent: </span><span id="agent_name" class="text-primary fs-4"></span></div>
                        <div><span class="fw-bold fs-4">Service to Change: </span><span id="service_name" class="text-primary fs-4"></span></div>
                        <div class="py-2">
                            <span>Select Another Service</span>
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
</script>

