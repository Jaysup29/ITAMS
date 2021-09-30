<!-- Modal -->
<div class="modal fade" id="updateusersaccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Update User</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row" id="updateform">
            <div class="col">
                <label for="user_type" class="form-label">User Type</label>
                <select id="user_type" class="form-select" required>
                    <option value="2">User</option>
                    <option value="1">Admin</option>
                    <option value="0">SuperAdmin</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="update_users_accounts()">Save changes</button>
      </div>
    </div>
  </div>
</div>