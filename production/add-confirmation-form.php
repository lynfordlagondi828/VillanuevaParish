<?php
    session_start();
    if(!isset($_SESSION["isloggedIN"])){
        header('location:../login.php');
        exit();
    }
  require_once 'header.php';

  require_once '../class/DbFunctions.php';
  $database = new DbFunctions();
  $err_msg = "";

  //POST method
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
   

    $result = $database->add_confirmation_certificate($lastname,$firstname,$middlename,$name_of_father,$name_of_mother,$address_of_parents,
        $date_of_birth,$confirmed_by,$sponsors,$parish_priest);

    if($result != TRUE){

        header("location:confirmation.php");
    } else {
        $err_msg = "Unable to add data.";
    }

    

  }

?>
<html>
    <title>
         Confirmation Certificate
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
        Confirmation Information
        </h3>
        <p>
            <?php echo $err_msg ?>
        </p>
        <form method="POST">
            <table>
                <tr>
                   
                    <td><label>Lastname</label><input class="form-control" type="text" name="lastname" id="lastname" placeholder="Lastname" required></td>
                    <td>&nbsp;</td>
                    <td><label>Firstname</label><input class="form-control" type="text" name="firstname" id="firstname" placeholder="Firstname" required></td>
                    <td>&nbsp;</td>
                    <td><label>Middlename</label><input class="form-control" type="text" name="middlename" id="middlename" placeholder="Middlename" required></td>
                    <td>&nbsp;</td>
                    <td><label>Name of Father</label><input class="form-control" type="text" name="name_of_father" id="name_of_father" placeholder="Father's Name" required></td>
                    <td>&nbsp;</td>
                    <td><label>Name of Mother</label><input class="form-control" type="text" name="name_of_mother" id="name_of_mother" placeholder="Mother's Name" required></td>
                </tr>
            </table>

            <br>
            <table>
                <tr>
                    <td><label>Parent Address</label><textarea class="form-control" type="text" name="address_of_parents" rows="4" cols="40" placeholder="Address" required></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Date of Birth</label><input class="form-control" type="date" name="date_of_birth" placeholder="date"></td>
                    <td>&nbsp;</td>
                    <td><label>Confirmed by</label><input class="form-control" type="text" name="confirmed_by" placeholder="Confirmed by"></td>
                    <td>&nbsp;</td>
                    <td><label>Sponsor(s)</label><textarea class="form-control" type="text" name="sponsors" rows="4" cols="40" placeholder="Sponsors" required></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Priest</label><input class="form-control" type="text" name="parish_priest" placeholder="Parish Priest"></td>
                  
                </tr>
            </table>
            

            

            <hr>
            <div align="center">
            
            <button class="btn btn-success btn-lg"  name="save">Save</button>
            <button class="btn btn-danger btn-lg" type="reset" value="Reset">Cancel</button>
            </div>
        </form> 
        </div>
    </div>
</html>