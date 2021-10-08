<?php
    if(!isset($_SESSION['emp_id'])){
        header("Location: login.php");
        exit();
    }
?>
<div class="modal fade" id="assetlogsmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asset Log</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
                <th scope="col" class="text-end">#</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Position</th>
                <th scope="col">SBU</th>
                <th scope="col">Location</th>
                <th scope="col">Date Issued</th>
                <th scope="col">Date Returned</th>
                <th scope="col">Remarks</th>
            </tr>
          </thead>
          <tbody id="assetloglist">
               
        </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
