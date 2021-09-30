<div class="modal fade" tabindex="-1" id="assignassetthrurecord" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Assign Asset</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form class="myForm" id="myForm_record">
                <div class="row">
                <div class="col-2 mb-3">
                    <label for="search_asset_record" class="form-label" >Search Asset</label>
                </div>
                <div class="col-10 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search_asset_record" placeholder="search assets details">
                        <button class="btn btn-primary" onclick="assign_asset_record()"><i class='bx bx-search'></i></button>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
            <div class="col-3">
              <label for="assign_asset_id_record" class="form-label" >Asset ID</label>
              <input type="text" class="form-control" id="assign_asset_id_record" placeholder="e.g. bsu-ws-00001">
            </div>
            <div class="col-5">
              <label for="assign_asset_tag_record" class="form-label" >Asset Tag</label>
              <input type="text" class="form-control" id="assign_asset_tag_record" placeholder="e.g. bsu-ws-00001">
            </div>
            <div class="col-4">
                <label for="assign_serial_record" class="form-label">Serial no.</label>
                <input type="text" class="form-control" id="assign_serial_record" placeholder="" disabled>
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="assign_asset_name_record" class="form-label">Asset Name</label>
              <input type="text" class="form-control" id="assign_asset_name_record" placeholder="name / brand" disabled>
            </div>
            <div class="col">
              <label for="assign_type_record" class="form-label">Type</label>
              <input type="text" class="form-control" id="assign_type_record" placeholder="e.g. laptop" disabled>
            </div>
            <div class="col">
               <label for="assign_status_record" class="form-label">Status</label>
              <select id="assign_status_record" class="form-select" disabled>
                <option selected disabled value="" >Choose...</option>
                <option>Available</option>
                <option>In use</option>
                <option>Defective</option>
                <option>Missing</option>
                <option>Disposed</option>
              </select>
            </div>
          </div>
          <div class="row g-2 mb-5">
            <div class="col-8">
              <label for="assign_description_record" class="form-label">Description</label>
              <textarea class="form-control" aria-label="With textarea" id="assign_description_record" placeholder="item specification" disabled></textarea>
            </div>
              <div class="col-4">
                <label for="assign_remarks_record" class="form-label">Remarks</label>
                <input type="text" class="form-control" id="assign_remarks_record" placeholder="" >
            </div>
          </div>
            <hr />
            <div class="row">
                <div class="col">
                    <label for="emp_id_record" class="form-label" >Employees ID</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="emp_id_record"  placeholder="" required>
                        <button class="btn btn-primary" onclick="assign_emp_record()"><i class='bx bx-search'></i></button>
                    </div>
                
                </div>
                <div class="col">
                    <div class="md-form md-outline input-with-post-icon datepicker">
                        <label for="emp_date_assigned_record" class="form-label">Date Assign</label>
                        <input placeholder="Select date" type="date" id="emp_date_assigned_record" value="" class="form-control" required>
                          <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">This field is required!</div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="firstname_record" class="form-label" >First name</label>
                    <input type="text" class="form-control" id="firstname_record" name="firstname" placeholder="" required>
                </div>
                <div class="col">
                    <label for="lastname_record" class="form-label" >Last name</label>
                    <input type="text" class="form-control" id="lastname_record" name="lastname" placeholder="" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="emp_sbu_record" class="form-label">SBU</label>
                      <select id="emp_sbu_record" class="form-select" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="1">AIC</option>
                        <option value="2">EXERGY</option>
                        <option value="3">GILI</option>
                        <option value="4">PNKC</option>
                        <option value="5">MANNVITS</option>
                        <option value="7">CLDI</option>
                        <option value="7">SUKIKO</option>
                      </select>
                    </div>
                <div class="col">
                    <label for="position_record" class="form-label" >Position</label>
                    <input type="text" class="form-control" id="position_record" name="position" placeholder="e.g. engineer" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="location_record" class="form-label" >Location</label>
                    <input type="text" class="form-control" id="location_record" name="location" placeholder="" required>
                </div>
            </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="submit_assign_record()">Submit</button>
      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(function(){
    record_list()

});
</script>
