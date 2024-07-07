<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-danger">
        <form action="{{ url('login') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col">
              <input type="email" class="form-control border-0" name="email" placeholder="Enter Email" style="height: 55px;" title="write your username" required>
            </div>
            <div class="col">
              <input type="password" class="form-control border-0" name="password" placeholder="Enter Password" style="height: 55px;" minlength="8" title="minimum character is 8" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
    </div>
  </div>
</div>