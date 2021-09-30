<?php 
    if(isset($_SESSION['emp_id'])) {
        header("Location: index.php"); 
        exit; 
   }
?>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="m-5 p-5 border-1 rounded-3 shadow" style="background-color: #E4E9F7;">
            <h2 class="text-center pb-3 text-primary">Login</h2>
            <div class="mb-3">
                <input type="text" class="form-control rounded-pill" id="username" placeholder="Username">
            </div>
            <div class="mb-1">
                <input type="password" class="form-control rounded-pill" id="password" placeholder="Password">
            </div>
            <div class="mb-1">
                <label for="formFile" class="form-label fw-lighter text-muted mx-2">Not yet a member? <span><a href="" class="text-decoration-none">SignUp</a></span>
                </label>
            </div>
            <div class="float-end">
                <button class="btn btn-primary" onClick="loginBtn()">Login</button>
            </div>
        </div>
    </div>
</div>
