<div class="modal fade" tabindex="-1" id="assignassetthruassets" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Assign Asset</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">            
            <form id="assigning-asset">
                <div class="row g-2 mb-3">
            <div class="col-5">
              <label for="asset_tag" class="form-label" >Asset Tag</label>
              <input type="text" class="form-control" id="assign_asset_tag" placeholder="e.g. bsu-ws-00001" disabled>
            </div>
            <div class="col-4">
                <label for="serial_no" class="form-label">Serial no.</label>
                <input type="text" class="form-control" id="assign_serial_no" placeholder="" disabled>
            </div>
            <div class="col-3">
               <label for="assign_status" class="form-label">Status</label>
              <select id="assign_status" class="form-select" disabled>
                <option selected disabled value="">Choose...</option>
                <option>Available</option>
                <option>In use</option>
                <option>Defective</option>
                <option>Missing</option>
                <option>Disposed</option>
              </select>
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="asset_name" class="form-label">Asset Name</label>
              <input type="text" class="form-control" id="assign_asset_name" placeholder="name / brand" disabled>
            </div>
            <div class="col">
              <label for="type" class="form-label">Type</label>
              <input type="text" class="form-control" id="assign_type" placeholder="e.g. laptop" disabled>
            </div>
          </div>
          <div class="row g-2 mb-5">
            <div class="col-8">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" aria-label="With textarea" id="assign_description" placeholder="item specification" disabled></textarea>
            </div>
              <div class="col-4">
                <label for="assign_remarks" class="form-label">Remarks</label>
                <input type="text" class="form-control" id="assign_remarks" placeholder="" >
            </div>
          </div>
            <hr />
            <div class="row mt-5">
                <div class="col">
                    <label for="emp_id" class="form-label" >Employees ID</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="emp_id" placeholder="">
                        <button class="btn btn-primary" onclick="get_employees_detail()"><i class='bx bx-search'></i></button>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form md-outline input-with-post-icon datepicker">
                        <label for="date_assigned" class="form-label">Date Assign</label>
                        <input placeholder="Select date" type="date" id="emp_date_assigned" value="" class="form-control" required>
                          <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">This field is required!</div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="new_asset_tag" class="form-label" >First name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" required>
                </div>
                <div class="col">
                    <label for="new_asset_tag" class="form-label" >Last name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="emp_sbu" class="form-label">SBU</label>
                      <select id="emp_sbu" class="form-select" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="1">AIC</option>
                        <option value="2">EXERGY</option>
                        <option value="3">GILI</option>
                        <option value="4">PNKC</option>
                        <option value="5">MANNVITS</option>
                        <option value="6">CLDI</option>
                        <option value="7">SUKIKO</option>
                      </select>
                    </div>
                <div class="col">
                    <label for="new_asset_tag" class="form-label" >Position</label>
                    <input type="text" class="form-control" id="position" name="position" placeholder="e.g. engineer" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="new_asset_tag" class="form-label" >Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="" required>
                </div>
            </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="submit_assignasset()">Submit Assign</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
	//get_employees_detail();
    asset_list();
	
});
</script>