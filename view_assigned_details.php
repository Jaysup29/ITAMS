<?php
    if(!isset($_SESSION['emp_id'])){
        header("Location: login.php");
        exit();
    }
?>
<div class="modal fade" tabindex="-1" id="viewrecorddetails" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Record Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form id="update-assign-details">
                <div class="row g-2 mb-3">
            <div class="col-3">
              <label for="asset_id_record" class="form-label" >Asset ID</label>
              <input type="text" class="form-control" id="asset_id_record" placeholder="" disabled>
            </div>
            <div class="col-5">
              <label for="asset_tag_record" class="form-label" >Asset Tag</label>
              <input type="text" class="form-control" id="asset_tag_record" placeholder="" disabled>
            </div>
            <div class="col-4">
                <label for="serial_record" class="form-label">Serial no.</label>
                <input type="text" class="form-control" id="serial_record" placeholder="" disabled>
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="asset_name_record" class="form-label">Asset Name</label>
              <input type="text" class="form-control" id="asset_name_record" placeholder="name / brand" disabled>
            </div>
            <div class="col">
              <label for="type_record" class="form-label">Type</label>
              <input type="text" class="form-control" id="type_record" placeholder="e.g. laptop" disabled>
            </div>
            <div class="col">
               <label for="status_record" class="form-label">Status</label>
              <select id="status_record" class="form-select" disabled>
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
              <label for="description_record" class="form-label">Description</label>
              <textarea class="form-control" aria-label="With textarea" id="description_record" placeholder="item specification" disabled></textarea>
            </div>
              <div class="col-4 needs-validaton" id="val_remarks_record" novalidation>
                <label for="remarks_record" class="form-label">Remarks</label>
                <input type="text" class="form-control" id="remarks_record" placeholder="" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">This field is required!</div>
            </div>
          </div>
            <hr />
            <div class="row mt-5">
                <div class="col">
                    <label for="emp_id_recorded" class="form-label" >Employees ID</label>
                    <input type="text" class="form-control" id="emp_id_recorded"  placeholder="" disabled>
                </div>
                <div class="col">
                    <div class="md-form md-outline input-with-post-icon datepicker">
                        <label for="emp_date_assigned_recorded" class="form-label">Date Issued</label>
                        <input placeholder="Select date" type="date" id="emp_date_assigned_recorded" value="" class="form-control" disabled>
                          <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">This field is required!</div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="firstname_recorded" class="form-label" >First name</label>
                    <input type="text" class="form-control" id="firstname_recorded" name="firstname" placeholder="" disabled>
                </div>
                <div class="col">
                    <label for="lastname_recorded" class="form-label" >Last name</label>
                    <input type="text" class="form-control" id="lastname_recorded" name="lastname" placeholder="" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="emp_sbu_recorded" class="form-label">SBU</label>
                      <select id="emp_sbu_recorded" class="form-select" disabled>
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
                    <label for="position_recorded" class="form-label" >Position</label>
                    <input type="text" class="form-control" id="position_recorded" name="position" placeholder="e.g. engineer" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col needs-validaton" id="val_location_recorded" novalidation>
                    <label for="location_recorded" class="form-label" >Location</label>
                    <input type="text" class="form-control" id="location_recorded" name="location" placeholder="" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">This field is required!</div>
                </div>
            </div>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="submit_updated_details()">Save Changes</button>
      </div>
    </div>
  </div>
</div>
