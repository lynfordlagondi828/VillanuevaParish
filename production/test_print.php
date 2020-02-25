<?php
    require_once '../class/DbFunctions.php';
    $database = new DbFunctions();

    $res = $database->get_all_death_certificate(0,10);
    print_r($res)
?>