<div class="modal fade" tabindex="-1" id="addasset" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Add Asset</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form class="myForm" id="myForm_addAsset">
            <div class="row g-2 mb-3">
            <div class="col needs-validaton" id="val_tag" novalidation>
              <label for="new_asset_tag" class="form-label" >Asset Tag</label>
              <input type="text" class="form-control" id="new_asset_tag" name="assettag" placeholder="e.g. bsu-ws-00001" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">This field is required!</div>
            </div>
            <div class="col needs-validaton" id="val_date" novalidation>
              <div class="md-form md-outline input-with-post-icon datepicker">
                <label for="new_date_purchase" class="form-label">Date Purchase</label>
                <input placeholder="Select date" type="date" id="new_date_purchase" value="" class="form-control" required>
                  <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">This field is required!</div>
              </div>
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-4 needs-validaton" id="val_asset" novalidation>
              <label for="new_asset_name" class="form-label">Asset Name</label>
              <input type="text" class="form-control" id="new_asset_name" placeholder="name / brand" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">This field is required!</div>
            </div>
            <div class="col-4">
              <label for="new_serial_no" class="form-label">Serial no.</label>
              <input type="text" class="form-control" id="new_serial_no" placeholder="serial from device">
            </div>
            <div class="col-4 needs-validaton" id="val_type" novalidation>
                <label for="new_type" class="form-label">Type</label>
                <select id="new_type" class="form-select" required>
                </select>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">This field is required!</div>
            </div>
          </div>
            <div class="row mb-2 g-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="ispheripheral" id="type_of_asset" value="0"/>
                    <label for="type_of_asset" class="form-label text-muted" >Please check the checkbox if the item is pheripheral</label>
                </div>
              </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="new_description" class="form-label">Description</label>
              <textarea class="form-control" aria-label="With textarea" id="new_description" placeholder="item specification"></textarea>
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col needs-validaton" id="val_sbu" novalidation>
              <label for="new_sbu" class="form-label">SBU</label>
              <select id="new_sbu" class="form-select" required>
                <option selected disabled value="">Choose...</option>
                <option>AIC</option>
                <option>EXERGY</option>
                <option>GILI</option>
                <option>PNKC</option>
                <option>MANNVITS</option>
                <option>CLDI</option>
                <option>SUKIKO</option>
              </select>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">This field is required!</div>
            </div>
            <div class="col">
              <label for="new_price" class="form-label">Price</label>
              <input type="text" class="form-control" id="new_price" placeholder="">
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col">
              <label for="new_installed_os" class="form-label">Installed OS</label>
              <input type="text" class="form-control" id="new_installed_os" placeholder="Operating System">
            </div>
            <div class="col">
              <label for="new_ms_office" class="form-label">MS Office</label>
              <input type="text" class="form-control" id="new_ms_office" placeholder="">
            </div>
          </div>
          <div class="row g-2 mb-3">
          <div class="col">
              <label for="new_status" class="form-label">Status</label>
              <select id="new_status" class="form-select" required>
                <option selected disabled value="">Choose...</option>
                <option>Available</option>
                <option>In use</option>
                <option>Defective</option>
                <option>Missing</option>
                <option>Disposed</option>
                <option>Spare of Device Available</option>
              </select>
            </div>
            <div class="col">
              <label for="new_remarks" class="form-label">Remarks</label>
              <input type="text" class="form-control" id="new_remarks" placeholder="">
            </div>
          </div>    
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="save_asset()">Save</button>
      </div>
    </div>
  </div>
</div>
<script>
$(function(){
    asset_list();
    selection_type_of_device()
})
    
$(document).ready(function(){
    $('#type_of_asset').change(function(){
    if(this.checked)
        $('#type_of_asset').val('1');
   else
        $('#type_of_asset').val('0');
    });
});

</script>
