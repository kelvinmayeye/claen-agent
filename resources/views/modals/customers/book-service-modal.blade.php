<!-- Success Header Modal -->
<div id="book-service-modal" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="success-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-success">
                <h4 class="modal-title" id="success-header-modalLabel">Book Service</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-hidden="true"></button>
            </div>
            <form action="{{route('add.booking')}}" method="post">
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
                        <div class="col-md-6 mb-2">
                            <label>Date</label><span class="text-danger">*</span>
                            <input type="date" class="form-control" min="{{now()->format('Y-m-d')}}" name="date"
                                   required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Time</label><span class="text-danger">*</span>
                            <input type="time" class="form-control" name="time" required>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label>Place</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="place" required>
                        </div>

                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea class="form-control" name="description"
                                      placeholder="add description about this booking" rows="3"></textarea>
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
