<?php
    if(!isset($_SESSION['emp_id'])){
        header("Location: login.php");
        exit();
    }
?>
<div class="modal fade" tabindex="-1" id="returnrecorddetailed" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Return Record Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form id="form_return">
            <div class="row g-2 mb-3">
            <div class="col-3">
              <label for="return_asset_id_record" class="form-label" >Asset ID</label>
              <input type="text" class="form-control" id="return_asset_id_record" placeholder="" disabled>
            </div>
            <div class="col-5">
              <label for="return_asset_tag_record" class="form-label" >Asset Tag</label>
              <input type="text" class="form-control" id="return_asset_tag_record" placeholder="" disabled>
            </div>
            <div class="col-4">
                <label for="return_serial_record" class="form-label">Serial no.</label>
                <input type="text" class="form-control" id="return_serial_record" placeholder="" disabled>
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="return_asset_name_record" class="form-label">Asset Name</label>
              <input type="text" class="form-control" id="return_asset_name_record" placeholder="name / brand" disabled>
            </div>
            <div class="col">
              <label for="return_type_record" class="form-label">Type</label>
              <input type="text" class="form-control" id="return_type_record" placeholder="e.g. laptop" disabled>
            </div>
            <div class="col">
               <label for="return_status_record" class="form-label">Status</label>
              <select id="return_status_record" class="form-select">
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
              <label for="return_description_record" class="form-label">Description</label>
              <textarea class="form-control" aria-label="With textarea" id="return_description_record" placeholder="item specification" disabled></textarea>
            </div>
              <div class="col-4">
                <label for="return_remarks_record" class="form-label">Remarks</label>
                <input type="text" class="form-control" id="return_remarks_record" placeholder="">
            </div>
          </div>
            <hr />
            <div class="row mt-5">
                <div class="col">
                    <label for="return_emp_id_recorded" class="form-label" >Employees ID</label>
                    <input type="text" class="form-control" id="return_emp_id_recorded"  placeholder="" disabled>
                </div>
                <div class="col">
                    <div class="md-form md-outline input-with-post-icon datepicker">
                        <label for="return_emp_date_assigned_recorded" class="form-label">Date Issued</label>
                        <input placeholder="Select date" type="date" id="return_emp_date_assigned_recorded" value="" class="form-control" disabled>
                          <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">This field is required!</div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="return_firstname_recorded" class="form-label" >First name</label>
                    <input type="text" class="form-control" id="return_firstname_recorded" name="firstname" placeholder="" disabled>
                </div>
                <div class="col">
                    <label for="return_lastname_recorded" class="form-label" >Last name</label>
                    <input type="text" class="form-control" id="return_lastname_recorded" name="lastname" placeholder="" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="return_emp_sbu_recorded" class="form-label">SBU</label>
                      <select id="return_emp_sbu_recorded" class="form-select" disabled>
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
                    <label for="return_position_recorded" class="form-label" >Position</label>
                    <input type="text" class="form-control" id="return_position_recorded" name="position" placeholder="e.g. engineer" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="return_location_recorded" class="form-label" >Location</label>
                    <input type="text" class="form-control" id="return_location_recorded" name="location" placeholder="" disabled>
                </div>
            </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="return_asset_confirmation()">Submit Return</button>
      </div>
    </div>
  </div>
</div>
