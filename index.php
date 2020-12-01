<?php
require_once 'php/config.php';
session_start();
require_once 'php/checker.php';
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Share2Q - Online File Storage and Sharing</title>

    <!-- Custom fonts for this template-->
    <link rel="shortcut icon" href="favicon.png">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link type="text/css" href="css/sb-admin-2.css" rel="stylesheet"/>

    <!-- Custom styles for this template-->
    <link type="text/css" href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"/>
    <link type="text/css" href="css/jquery-confirm.css" rel="stylesheet"/>
    <link type="text/css" href="css/OverlayScrollbars.css" rel="stylesheet"/>

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- PHP -->
        <?php require_once('sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" style="font-size: 80%">
                <!-- PHP -->
                <?php require_once('topbar.php'); ?>
                <div class="container-fluid" style="padding-left: 2rem; padding-right: 2rem">
                    <?php require_once('content.php'); ?>
                </div>
            </div>
            <!-- PHP -->
            <?php require_once('footer.php'); ?>
        </div>
        <div id="loading" class="active">
            <div class="loading-inner">
                <div class="loading-circle-wrapper">
                    <div class="loading-circle">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- X -->
    <?php require_once('modals.php'); ?>

    

    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script type="text/javascript" src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/sb-admin-2.js"></script>

    <script type="text/javascript" src="js/jquery.overlayScrollbars.js"></script>
    <script type="text/javascript" src="js/jquery-confirm.js"></script>

    <!-- Page level plugins -->
    <script type="text/javascript" src="vendor/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="js/demo/datatables-demo.js"></script>

</body>

</html>
