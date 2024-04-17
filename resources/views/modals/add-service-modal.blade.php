<!-- Success Header Modal -->
<div id="success-header-modal" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="success-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-success">
                <h4 class="modal-title" id="success-header-modalLabel">Add Service</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-hidden="true"></button>
            </div>
            <form action="{{route('services.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label>Service Name</label>
                            <input class="form-control" name="name" placeholder="service name" required>
                        </div>

                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea class="form-control" name="description" placeholder="add description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
