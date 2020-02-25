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

   $get_single_bap_cert = $database->get_single_baptismal_certificate($id);

   $lastname = $get_single_bap_cert["lastname"];
   $firstname = $get_single_bap_cert["firstname"];
   $middlename = $get_single_bap_cert["middlename"];
   $name_of_father = $get_single_bap_cert["name_of_father"];
   $name_of_mother = $get_single_bap_cert["name_of_mother"];
   $present_address = $get_single_bap_cert["present_address"];
   $date_of_birth = $get_single_bap_cert["date_of_birth"];
   $place_of_birth = $get_single_bap_cert["place_of_birth"];
   $date_of_baptism = $get_single_bap_cert["date_of_baptism"];
   $baptized_by = $get_single_bap_cert["baptized_by"];
   $sponsors = $get_single_bap_cert["sponsors"];
  
   

   //update post
   if(isset($_POST["update"])){

        $lastname = trim($_POST["lastname"]);
        $firstname = trim($_POST["firstname"]);
        $middlename = trim($_POST["middlename"]);
        $name_of_father = trim($_POST["name_of_father"]);
        $name_of_mother = trim($_POST["name_of_mother"]);
        $present_address = trim($_POST["present_address"]);
        $dob = trim($_POST["dob"]);
        $place_of_birth = trim($_POST["place_of_birth"]);
        $date_of_baptism = trim($_POST["date_of_baptism"]);
        $baptized_by = trim($_POST["baptized_by"]);
        $sponsors = trim($_POST["sponsors"]);

        $database->edit_baptismal_certificates($id,$lastname,$firstname,$middlename,$name_of_father,$name_of_mother,
        $present_address,$dob,$place_of_birth,$date_of_baptism,
        $baptized_by,$sponsors);
    
        header('location: baptismal.php');
        exit();

   }


?>


<html>
    <title>
        Update Baptismal Information
    </title>
    <head>
        <style>
            #body{
                background-color: #92a8d1;
                padding: 10px;
            }
        </style>

    </head>
    <div class="container">
        
        
        <div id="body">
        <h3 align="center">
        Baptismal Information
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
                    <td><label>Father's Name</label><input class="form-control" type="text" name="name_of_father" id="name_of_father" value="<?php echo $name_of_father ?>"></td>
                    <td>&nbsp;</td>
                    <td><label>Mother's Name</label><input class="form-control" type="text" name="name_of_mother" id="name_of_mother" value="<?php echo $name_of_mother ?>"></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                
                    <td><label>Present Address</label><textarea name="present_address" id="present_address" rows="4" cols="50"><?php echo $present_address ?></textarea></td>
                    <td><label>Birth Date</label><input class="form-control" type="date" name="dob" id="dob" value="<?php echo $date_of_birth ?>"></td>
                    
                    <td>&nbsp;</td>
                    <td><label>Birth Place</label><textarea name="place_of_birth" id="place_of_birth" rows="4" cols="50"><?php echo $place_of_birth ?></textarea></td>
                    
                </tr>
            </table>

            <br>
            <table>
                <tr>
                <td>&nbsp;</td>
                    <td><label>Date of Baptism</label><input class="form-control" type="date" name="date_of_baptism" id="date_of_baptism" value="<?php echo $date_of_baptism ?>"></td>
                    <td>&nbsp;</td>
                    
                    <td><label>Baptized by</label><input class="form-control" type="text" name="baptized_by" id="baptized_by" value="<?php echo $baptized_by ?>"></td>
                    <td>&nbsp;</td>
                    <td><textarea name="sponsors" id="sponsors" rows="4" cols="50" placeholder="Sponsors"><?php echo $sponsors ?></textarea></td>
                    
                </tr>
            </table>

            <hr>
            <div align="center">
            
            <button class="btn btn-danger btn-lg"  name="update"> <span class="glyphicon glyphicon-save"> Save</button>
            </div>
        </form> 
        </div>
    </div>
</html>

    <script type="text/javascript" src="jquery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="DataTables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

    