<div class="modal fade" tabindex="-1" id="returnconfirmationmessage">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <p class="modal-title fw-bold text-white">Are you sure?</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Please fill up the following field to proceed to return</p>
          <form id="form-return">
              <div class="row mb-3">
              <div class="col-2">
                  <label for="textfieldforcollectedby">Collect by:</label>
              </div>
              <div class="col-10 needs-validaton" id="val_collect" novalidation>
                <input type="text" id="textfieldforcollectedby" class="form-control" placeholder="Name of the person who collected the item" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">This field is required!</div>
              </div>
          </div>
           <div class="row mb-3">
              <div class="col-2">
                  <label for="textfieldforassetstatus">Asset Status:</label>
              </div>
              <div class="col-10 needs-validaton" id="val_asstatus" novalidation>
              <select id="textfieldforassetstatus" class="form-select" required>
                <option selected disabled value="">Choose...</option>
                <option>Available</option>
                <option>In use</option>
                <option>Defective</option>
                <option>Missing</option>
                <option>Disposed</option>
              </select>
                <div class="valid-feedback mb-2">Looks good!</div>
                <div class="invalid-feedback mb-2">This field is required!</div>
            </div>
          </div>
           <div class="row">
              <div class="col-2 mt-3">
                  <label for="textfieldfornotes">Notes:</label>
              </div>
              <div class="col-10 mt-3 needs-validaton" id="val_notes" novalidation>
                <textarea class="form-control" id="textfieldfornotes" placeholder="Say something about item or else" required></textarea>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">This field is required!</div>
              </div>
          </div>
          </form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" onclick="return_asset_trigger()">Yes</button>
      </div>
    </div>
  </div>
</div>
