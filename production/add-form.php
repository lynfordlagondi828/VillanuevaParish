
<?php
session_start();
    if(!isset($_SESSION["isloggedIN"])){
        header('location:../login.php');
        exit();
    }
  require_once 'header.php';

  //database 
  require_once '../class/DbFunctions.php';
  $database = new DbFunctions();

  $count = $database->count_number_of_rows();
  

  //add post data
  if(isset($_POST["save"])){

    $series_of = date("Y");
    $number = $count + 1;
    $lastname = trim($_POST["lastname"]);
    $firstname = trim($_POST["firstname"]);
    $middlename = trim($_POST["middlename"]);
    $name_of_father = trim($_POST["name_of_father"]);
    $name_of_mother = trim($_POST["name_of_mother"]);
    $present_address = trim($_POST["present_address"]);
    $date_of_birth = trim($_POST["date_of_birth"]);
    $place_of_birth = trim($_POST["place_of_birth"]);
    $date_of_baptism = trim($_POST["date_of_baptism"]);
    $baptized_by = trim($_POST["baptized_by"]);
    $sponsors = trim($_POST["sponsors"]);
    $type = "Baptismal";


    $result = $database->add_baptismal_certificate($series_of,$number,$lastname,$firstname,$middlename,$name_of_father,$name_of_mother,
                        $present_address,$date_of_birth,$place_of_birth,$date_of_baptism,
                        $baptized_by,$sponsors,$type);

    if($result != TRUE){

        header('location: baptismal.php');
        exit();

    } else {
        echo 'Unable to add baptismal record';
    }

  }

?>
<html>
    <title>
        Add Baptismal Certificate
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
                   
                    <td><input class="form-control" type="text" name="lastname" id="lastname" placeholder="Lastname" required></td>
                    <td>&nbsp;</td>
                    <td><input class="form-control" type="text" name="firstname" id="firstname" placeholder="Firstname" required></td>
                    <td>&nbsp;</td>
                    <td><input class="form-control" type="text" name="middlename" id="middlename" placeholder="Middlename" required></td>
                    <td>&nbsp;</td>
                    <td><input class="form-control" type="text" name="name_of_father" id="name_of_father" placeholder="Father's Name" required></td>
                    <td>&nbsp;</td>
                    <td><input class="form-control" type="text" name="name_of_mother" id="name_of_mother" placeholder="Mother's Name" required></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                <td>&nbsp;</td>
                    <td><textarea name="present_address" id="present_address" rows="4" cols="50" placeholder="Present Address..." required></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Birth Date</label></td>
                    <td><input class="form-control" type="date" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth" required></td>
                    <td>&nbsp;</td>
                    <td><textarea name="place_of_birth" id="place_of_birth" rows="4" cols="50" placeholder="Place of Birth" required></textarea></td>
                    
                </tr>
            </table>

            <br>
            <table>
                <tr>
                <td>&nbsp;</td>
                    <td><label>Date of Baptism</label></td>
                    <td><input class="form-control" type="date" name="date_of_baptism" id="date_of_baptism" required></td>
                    <td>&nbsp;</td>
                    
                    <td><input class="form-control" type="text" name="baptized_by" id="baptized_by" placeholder="Baptized by" required></td>
                    <td>&nbsp;</td>
                    <td><textarea name="sponsors" id="sponsors" rows="4" cols="50" placeholder="Sponsors" required></textarea></td>
                    
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

    <script type="text/javascript" src="jquery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="DataTables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

    