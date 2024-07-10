<!-- Success Header Modal -->
<div id="add-review-modal" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="success-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-success">
                <h4 class="modal-title" id="success-header-modalLabel">Add Review</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-hidden="true"></button>
            </div>
            <form action="{{route('add.review')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="agent_id" id="agentId">
                    <div class="row">
                        <div class="col-12">
                            <label>Comments</label>
                            <textarea class="form-control border-3 border-info-subtle" name="comment"
                                      placeholder="write your comments here" rows="3" required></textarea>
                        </div>
                        <span><small class="text-danger fw-semibold">Note: This comment will go to the agent associated to this booking</small></span>

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

@section('script')
    <script>
        document.getElementById('add-review-modal').addEventListener('show.bs.modal', function (event) {
            var triggerLink = event.relatedTarget;
            if (triggerLink && triggerLink.hasAttribute('data-agentid')) {
                var agentId = triggerLink.getAttribute('data-agentid');
                var agentIdInput = document.getElementById('agentId');
                if (agentIdInput) {
                    agentIdInput.value = agentId;
                }
                // console.log('Agent ID:', agentIdInput);
            }
        });
    </script>
@endsection
