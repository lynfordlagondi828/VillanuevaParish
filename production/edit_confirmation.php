<?php

session_start();
    if(!isset($_SESSION["isloggedIN"])){
        header('location:../login.php');
        exit();
    }
  require_once 'header.php';
    
    if(isset($_GET["id"])){

        $id = trim($_GET["id"]);
    }

    $id = intval($_GET["id"]);

  
   require_once '../class/DbFunctions.php';
   $database = new DbFunctions();

   
   $get_single_confirmation_cert = $database->get_single_conf_cert($id);

   $lastname = $get_single_confirmation_cert["lastname"];
   $firstname = $get_single_confirmation_cert["firstname"];
   $middlename = $get_single_confirmation_cert["middlename"];
   $name_of_father = $get_single_confirmation_cert["name_of_father"];
   $name_of_mother = $get_single_confirmation_cert["name_of_mother"];
   $address_of_parents =$get_single_confirmation_cert["address_of_parents"];
   $date_of_birth = $get_single_confirmation_cert["date_of_birth"];
   $confirmed_by = $get_single_confirmation_cert["confirmed_by"];
   $sponsors = $get_single_confirmation_cert["sponsors"];
   $parish_priest = $get_single_confirmation_cert["parish_priest"];

   if(isset($_POST["save"])){


        $lastname = trim($_POST["lastname"]);
        $firstname = trim($_POST["firstname"]);
        $middlename = trim($_POST["middlename"]);
        $name_of_father = trim($_POST["name_of_father"]);
        $name_of_mother = trim($_POST["name_of_mother"]);
        $address_of_parents = trim($_POST["address_of_parents"]);
        $date_of_birth = trim($_POST["date_of_birth"]);
        $confirmed_by = trim($_POST["confirmed_by"]);
        $sponsors = trim($_POST["sponsors"]);
        $parish_priest = trim($_POST["parish_priest"]);

        $database->udpate_confirmation_certificate($id,$lastname,$firstname,$middlename,
        $name_of_father,$name_of_mother,$address_of_parents,
        $date_of_birth,$confirmed_by,$sponsors,$parish_priest);
        header("location:confirmation.php");
        exit();
   }

   


?>

<html>
    <title>
         Edit Confirmation Certificate
    </title>
    <head>
        <style>
            #body{
                background-color: #fafad2;
                padding: 10px;
            }
        </style>

    </head>
    <div class="container">
        
        
        <div id="body">
        <h3 align="center">
        Update Confirmation Information
        </h3>
        
        <form method="POST">
            <table>
                <tr>
                   
                    <td><label>Lastname</label><input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $lastname ?>"></td>
                    <td>&nbsp;</td>
                    <td><label>Firstname</label><input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo $firstname ?>"></td>
                    <td>&nbsp;</td>
                    <td><label>Middlename</label><input class="form-control" type="text" name="middlename" id="middlename" value="<?php echo $middlename ?>"></td>
                    <td>&nbsp;</td>
                    <td><label>Name of Father</label><input class="form-control" type="text" name="name_of_father" id="name_of_father" value="<?php echo $name_of_father ?>"></td>
                    <td>&nbsp;</td>
                    <td><label>Name of Mother</label><input class="form-control" type="text" name="name_of_mother" id="name_of_mother" value="<?php echo $name_of_mother ?>"></td>
                </tr>
            </table>

            <br>
            <table>
                <tr>
                    <td><label>Parent Address</label><textarea class="form-control" type="text" name="address_of_parents" rows="4" cols="40"><?php echo $address_of_parents ?></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Date of Birth</label><input class="form-control" type="date" name="date_of_birth" value="<?php echo $date_of_birth ?>"></td>
                    <td>&nbsp;</td>
                    <td><label>Confirmed by</label><input class="form-control" type="text" name="confirmed_by" value="<?php echo $confirmed_by ?>""></td>
                    <td>&nbsp;</td>
                    <td><label>Sponsor(s)</label><textarea class="form-control" type="text" name="sponsors" rows="4" cols="40" ><?php echo $sponsors ?></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Priest</label><input class="form-control" type="text" name="parish_priest" value="<?php echo $parish_priest ?>"></td>
                  
                </tr>
            </table>
            

            

            <hr>
            <div align="center">
            
            <button class="btn btn-success btn-lg"  name="save">Save Changes</button>
            </div>
        </form> 
        </div>
    </div>
</html>