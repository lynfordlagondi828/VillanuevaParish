<?php
    if(isset($_GET["id"])){

        $id = trim($_GET["id"]);
    }

    $id = intval($_GET["id"]);

    require_once '../class/DbFunctions.php';
    $database = new DbFunctions();

    $database->delete_confirmation_certificate($id);
    header("location:confirmation.php");
?>