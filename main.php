<?php
include("login/auth_session.php");
//print_r($_SESSION);
require_once 'config.php';
?>
<html>
    <title>Khaana Chahiye</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel = "stylesheet" type = "text/css" href = "css/index.css">  
    <link rel = "stylesheet" type = "text/css" href = "css/home.css">
    <link rel="stylesheet" type = "text/css" href="css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
</html>
<body>
<?php include('nav.php'); ?>

    <div class="container-fluid">
        <?php   $page = 'main'; ?>
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
            <div class="custom_css">
            <div class="panel panel-success main_panel">
            <div class="panel-body panel-inner">
            <?php

            $get_page = filter_input(INPUT_GET, 'page');

            $page = (!empty($get_page)) ? $get_page : "dashboard/dashboard";

            $page = strtolower($page) .".php";
            // echo $page;
            if(file_exists($page)): require ABSPATH . $page; ?>

            <?php else: ?>

                <p><b>404.</b>&nbsp; <span class="text-muted">That's an error.</span></p>
                <p>The requested URL was not found on this server.</p>
                <p><b><a href="<?php echo WEBSITE . "main.php?page=dashboard/dashboard"; ?>">click here</a></b> to load home page.</p>

            <?php endif; ?>

            </div>
            </div>
            </div>
        </div>
        </div>

    </div>
</body>