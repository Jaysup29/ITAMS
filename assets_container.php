<div class="container-fluid pt-3">
    <div class="mx-3 px-3 rounded" style="background-color: #6A89B7;">
        <h4 class="py-1 text-white">Assets</h4>
    </div>
    <div class="row mx-3 my-2">
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <div class="float-start d-grid d-md-block">
                <button class="btn btn-primary" type="button" onclick="addasset()" id="addingasset">Add Asset</button>
                    <button class="btn btn-primary" type="button" onclick="add_assign_record()" id="addingasset">Assign</button>
                <a href="mass_upload.php"><button class="btn btn-primary" type="button">Upload</button></a>
            </div>
            </div>
          <div class="p-2 flex-grow-1 bd-highlight">
            <div class="input-group rounded">
                <input type="search" class="form-control rounded-pill" name="search_text" id="search_asset" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" for="search_asset">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            </div>
            <div class="p-2 bd-highlight">
                <div class="float-end d-grid d-md-block">
                      <select id="filter_sbu" class="form-select" required>
                        <option selected disabled value="">SBU</option>
                        <option>ALL</option>
                        <option>AIC</option>
                        <option>EXERGY</option>
                        <option>GILI</option>
                        <option>PNKC</option>
                        <option>MANNVITS</option>
                        <option>CLDI</option>
                        <option>SUKIKO</option>
                      </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-3 rounded">
        <div class="col-md-12 p-0 bg-white">
            <div class="table-wrap">
                <table class="table table-striped m-0">
                    <thead style="background-color: #6A89B7;">
                        <tr>
                            <th>#</th>
                            <th>SBU</th>
                            <th>Asset tag</th>
                            <th>Name/Brand</th>
                            <th>Item description</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th class="text-center">Actions</th>
                        </tr>
                     </thead>
                     <tbody id="assetlist">
                     </tbody>
                </table>
                <div class="spinner-border text-primary" role="status" id="asset_spinner">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function(){
    asset_list();
    
});
    
$(document).ready(function(){
  $("#search_asset").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#assetlist tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
$(document).ready(function(){
  $("#filter_sbu").on("change", function() {
      var filtersbu = $('#filter_sbu option:selected').val();
    asset_list();
  });
});


</script>
