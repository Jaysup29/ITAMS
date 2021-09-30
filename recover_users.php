<!-- Modal -->
<div class="modal fade" id="changeusersmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Recover User</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row" id="myform">
            <div class="col">
                <label for="change_pword" class="form-label">New Password</label>
                <input type="password" class="form-control" id="change_pword" placeholder="">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="changeuserpassword()">Save changes</button>
      </div>
    </div>
  </div>
</div>
