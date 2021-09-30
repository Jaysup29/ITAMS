<!--return table-->
<div class="container-fluid pt-3">
    <div class="mx-3 px-3 rounded" style="background-color: #6A89B7;">   
        <h4 class="py-1 text-white">Records</h4>
    </div>
    <div class="row mx-3 my-2">
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <div class="float-start d-grid d-md-block">
                <a href="records.php"><button class="btn btn-danger" type="button">In Used list</button></a>
            </div>
            </div>
          <div class="p-2 flex-grow-1 bd-highlight">
            <div class="input-group rounded">
                <input type="search" class="form-control rounded-pill" id="return-search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            </div>
        </div>
    </div>
    <div class="row mx-3">
        <div class="col">
            <div class="rounded bg-white" style="height: 86vh; overflow: auto;">
                <table class="table table-default border table-bordered table-hover table-scroll rounded" cellspacing="0" >
                <thead class="shadow-sm sticky-top bg-dark text-white">
                    <tr>
                    <th scope="col" class="fs-6 text-nowrap">#</th>
                    <th scope="col" class="fs-6 text-nowrap">Return ID</th>
                    <th scope="col" class="fs-6 text-nowrap">Date of Return</th>
                    <th scope="col" class="fs-6 text-nowrap">Collect by</th>
                    <th scope="col" class="fs-6 text-nowrap">Return Asset Remark</th>
                    <th scope="col" class="fs-6 text-nowrap">Notes</th>
                    <th scope="col" class="fs-6 text-nowrap">Record ID</th>
                    <th scope="col" class="fs-6 text-nowrap">Date Issued</th>
                    <th scope="col" class="fs-6 text-nowrap">Asset ID </th>
                    <th scope="col" class="fs-6 text-nowrap">Asset Tag</th>
                    <th scope="col" class="fs-6 text-nowrap">Asset Name</th>
                    <th scope="col" class="fs-6 text-nowrap">Description</th>
                    <th scope="col" class="fs-6 text-nowrap">Type of Device</th>
                    <th scope="col" class="fs-6 text-nowrap">Serial No.</th>
                    <th scope="col" class="fs-6 text-nowrap">Asset Status</th>
                    <th scope="col" class="fs-6 text-nowrap">Remarks</th>
                    <th scope="col" class="fs-6 text-nowrap">Employee ID</th>
                    <th scope="col" class="fs-6 text-nowrap">Fullname</th>
                    <th scope="col" class="fs-6 text-nowrap">Employee SBU</th>
                    <th scope="col" class="fs-6 text-nowrap">Position</th>
                    <th scope="col" class="fs-6 text-nowrap">Location</th>
                    </tr>
                </thead>
                <tbody id="returnlist" class="border">
               
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
    return_list();
});
    
$(document).ready(function(){
  $("#return-search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#returnlist tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

