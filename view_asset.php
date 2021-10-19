<?php
    if(!isset($_SESSION['emp_id'])){
        header("Location: login.php");
        exit();
    }
?>
<div class="modal fade" tabindex="-1" id="viewasset" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Asset Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="asset_tag" class="form-label" >Asset Tag</label>
              <input type="text" class="form-control" id="asset_tag" placeholder="e.g. bsu-ws-00001" required>
            </div>
            <div class="col">
              <div class="md-form md-outline input-with-post-icon datepicker">
                <label for="date_purchase" class="form-label">Date Purchase</label>
                <input placeholder="Select date" type="date" id="date_purchase" class="form-control" disabled>
              </div>
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-5">
              <label for="asset_name" class="form-label">Asset Name</label>
              <input type="text" class="form-control" id="asset_name" placeholder="name / brand">
            </div>
            <div class="col-5">
              <label for="serial_no" class="form-label">Serial no.</label>
              <input type="text" class="form-control" id="serial_no" placeholder="">
            </div>
            <div class="col-2">
              <label for="type" class="form-label">Type</label>
              <input type="text" class="form-control" id="type" placeholder="e.g. laptop" disabled>
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" aria-label="With textarea" id="description" placeholder="item specification"></textarea>
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="sbu" class="form-label">SBU</label>
              <select id="sbu" class="form-select">
                <option selected>Choose...</option>
                <option>AIC</option>
                <option>EXERGY</option>
                <option>GILI</option>
                <option>PNKC</option>
                <option>MANNVITS</option>
                <option>CLDI</option>
                <option>SUKIKO</option>
              </select>
            </div>
            <div class="col">
              <label for="price" class="form-label">Price</label>
              <input type="text" class="form-control" id="price" placeholder="">
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="installed_os" class="form-label">Installed OS</label>
              <input type="text" class="form-control" id="installed_os" placeholder="Operating System">
            </div>
            <div class="col">
              <label for="ms_office" class="form-label">MS Office</label>
              <input type="text" class="form-control" id="ms_office" placeholder="">
            </div>
          </div>
          <div class="row g-2 mb-3">
          <div class="col">
              <label for="status" class="form-label">Status</label>
              <select id="status" class="form-select">
                <option selected>Choose...</option>
                <option>Available</option>
                <option>In use</option>
                <option>Defective</option>
                <option>Missing</option>
                <option>Disposed</option>
                <option>Spare of Device Available</option>
              </select>
            </div>
            <div class="col">
              <label for="remarks" class="form-label">Remarks</label>
              <input type="text" class="form-control" id="remarks" placeholder="">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="save_edited_assets()">Save changes</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$(function(){
    asset_list();
})
</script>