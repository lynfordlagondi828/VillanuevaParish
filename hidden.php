<?php
session_start();
    if(!isset($_SESSION["isloggedIN"])){
        header('location:index.php');
        exit();
    }
   
?>
<html>
    <head>
        <title>Villanueva Parish</title>
        <!--BOOTSTRAP -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!--CSS-->
        <link href="menu.css" rel="stylesheet">
        <!-- Datatable CSS -->
        <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>
        <!-- jQuery Library -->
        <script src="jquery-3.3.1.min.js"></script>
        <!-- Datatable JS -->
        <script src="DataTables/datatables.min.js"></script>
    </head>

    <body>
        <div id="menu" align="center">
            <?php  echo "Hi" . ' '. $_SESSION["email"] .' '; ?>You are logged IN
            <a href="logout.php" onclick="return confirm('logout?');">logout?</a>
            <br><hr>

            <h3>Villanueva Parish Certificate Management System</h3>
            <a class="btn btn-primary" href="baptismal.php">Baptismal Certificate</a>
            <a class="btn btn-success" href="death.php">Death Certificate</a>
            <a class="btn btn-danger" href="confirmation.php">Confirmation Certificate</a>
        </div>
    </body>
</html>