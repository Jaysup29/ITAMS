<?php
    if(!isset($_SESSION['emp_id'])){
        header("Location: login.php");
        exit();
    }
?>
<div class="modal fade" tabindex="-1" id="deleteasset">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title fw-bold">Confirmation</p>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" onclick="delete_asset()">Yes</button>
      </div>
    </div>
  </div>
</div>