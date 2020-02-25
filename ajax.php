<?php 
//database links
require_once 'class/DbFunctions.php';
$database = new DbFunctions();
//ajax
if(isset($_POST["key"])){

    if($_POST["key"] == 'login'){

        session_start();
        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = $database->userAuth($email,$password);
        if($result){

            $_SESSION["isloggedIN"] = TRUE;
            $_SESSION["email"] = $email;
            exit('<font color="green"> success');
            
        } else {
            exit('<font color="red">Login failed! email or password not found.');
        }
        


    }
}