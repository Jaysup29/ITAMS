<?php
    if(!isset($_SESSION['emp_id'])){
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./node_modules/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="./node_modules/mdb-ui-kit/css/mdb.min.css">
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">            
            <div class="logo_name"><a class="text-decoration-none text-white" href="index.php">ITAMS</a></div>
<!--            <i class='bx bx-menu' id="btn" ></i>-->
        </div>
        <ul class="nav-list">
            <li>
                <a href="index.php">
                <i class='bx bx-grid-alt'></i>
<!--                <span class="links_name">Dashboard</span>-->
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
            <a href="assets.php">
                <i class='bx bx-box'></i>
<!--                <span class="links_name">Assets</span>-->
            </a>
            <span class="tooltip">Assets</span>
            </li>
            <li>
            <a href="records.php">
                <i class='bx bx-receipt'></i>
<!--                <span class="links_name">Records</span>-->
            </a>
            <span class="tooltip">Records</span>
            </li>
            <li>
            <a href="account.php">
                <i class='bx bx-user' ></i>
<!--                <span class="links_name">Account</span>-->
            </a>
            <span class="tooltip">Account</span>
            </li>
            <li>
            <a onClick="logoutBtn()">
                <i class='bx bx-log-out' id="log_out"></i>
<!--                <span class="links_name">Logout</span>-->
            </a>
            <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>
    
    <?php 
        include 'add_asset.php';
        include 'view_asset.php';
        include 'delete_asset_confirmation.php';
        include 'assign_asset.php';
        include 'assign_asset_record.php';
        include 'view_assigned_details.php';
        include 'return_record_details.php';
        include 'return_asset_confirmation.php';
        include 'view_asset_log.php';
        include 'recover_users.php';
        include 'update_users_account.php';

    ?>


    <div class="main-content">
        <section class="section">
            
            <?php isset($page_content)? include($page_content): 'index.php';?>

        </section>
    </div>
    <script src="./js/script.js"></script>
<!--    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>-->
<!--    <script src="./node_modules/jquery/dist/jquery.js"></script>-->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/chart.js/dist/chart.min.js"></script>

</body>
</html>