<!--In used table-->
<div class="container-fluid pt-3">
    <div class="mx-3 px-3 rounded" style="background-color: #6A89B7;">   
        <h4 class="py-1 text-white">Records</h4>
    </div>
    <div class="row mx-3 my-2">
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <div class="float-start d-grid d-md-block">
                <button class="btn btn-primary" type="button" onclick="add_assign_record()">Assign</button>
                <a href="accountability.php"><button class="btn btn-warning" type="button">Generate Accountability</button></a>
                <a href="return_record.php"><button class="btn btn-danger" type="button">Return list</button></a>
            </div>
            </div>
          <div class="p-2 flex-grow-1 bd-highlight">
            <div class="input-group rounded">
                <input type="search" class="form-control rounded-pill" id="record_search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
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
                            <th>Borrower</th>
                            <th>SBU</th>
                            <th>Position</th>
                            <th>Asset tag</th>
                            <th>Name/Brand</th>
                            <th>Type of Device</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Date Issued</th>
                            <th>Location</th>
                            <th class="text-center">Actions</th>
                        </tr>
                     </thead>
                     <tbody id="recordlist" class="border">
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
    record_list();
});

$(document).ready(function(){
  $("#record_search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#recordlist tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>