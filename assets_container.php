<div class="container-fluid pt-3">
    <div class="mx-3 px-3 rounded" style="background-color: #6A89B7;">
        <h4 class="py-1 text-white">Assets</h4>
    </div>
    <div class="row mx-3 my-2">
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <div class="float-start d-grid d-md-block">
                <button class="btn btn-primary" type="button" onclick="addasset()" id="addingasset">Add Asset</button>
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
    
    <div class="row mx-3" >
        <div class="col" >
            <div class="rounded bg-white" style="height: 86vh; overflow: auto;">
                <table class="table table-default border table-bordered table-hover table-scroll rounded" cellspacing="0" >
                <thead class="shadow-sm" style="background-color: #6A89B7;">
                    <tr>
                    <th scope="col" class="text-start text-nowrap" style="width: 20px;">#</th>
                    <th scope="col" class="fs-6 text-nowrap">Asset Tag</th>
                    <th scope="col" class="fs-6 text-nowrap">Item Name</th>
                    <th scope="col" class="fs-6 text-nowrap w-25">Description</th>
                    <th scope="col" class="fs-6 text-nowrap">Serial No.</th>    
                    <th scope="col" class="fs-6 text-nowrap">Price</th>
                    <th scope="col" class="fs-6 text-nowrap">SBU</th>
                    <th scope="col" class="fs-6 text-nowrap">Date Puchase</th>
                    <th scope="col" class="fs-6 text-nowrap">OS Installed</th>
                    <th scope="col" class="fs-6 text-nowrap">MS Office</th>
                    <th scope="col" class="fs-6 text-nowrap">Remarks</th>
                    <th scope="col" class="fs-6 text-nowrap">Type</th>
                    <th scope="col" class="fs-6 text-nowrap">Status</th>
                    <th scope="col" class="fs-6 text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody id="assetlist" class="border">
               
                </tbody>
                </table>
<!--
                <div class="spinner-border text-primary" role="status" id="spinner" style="position: absolute; top: 50%; left: 50%;">
                  <span class="visually-hidden">Loading...</span>
                </div>
-->
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
