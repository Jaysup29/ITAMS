<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    
    <div class="main-content">
        <section class="section">
            
            <?php isset($page_content)? include($page_content): 'login.php';?>
        </section>
    </div>

    <script src="./js/script.js"></script>
</body>
</html>