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

   $getDCertificate = $database->get_single_death($id);

    $name_of_deceased = $getDCertificate["name_of_deceased"];
    $age = $getDCertificate["age"];
    $residence = $getDCertificate["residence"];
    $married_with = $getDCertificate["married_with"];
    $father = $getDCertificate["father"];
    $mother = $getDCertificate["mother"];
    $date_of_death = $getDCertificate["date_of_death"];
    $place_of_death = $getDCertificate["place_of_death"];
    $date_of_burial = $getDCertificate["date_of_burial"];
    $place_of_burial = $getDCertificate["place_of_burial"];
    $minister = $getDCertificate["minister"];

    if(isset($_POST["save"])){

     
        $name_of_deceased = trim($_POST["name_of_deceased"]);
        $age = trim($_POST["age"]);
        $residence = trim($_POST["residence"]);
        $married_with = trim($_POST["married_with"]);
        $father = trim($_POST["father"]);
        $mother = trim($_POST["mother"]);
        $date_of_death = trim($_POST["date_of_death"]);
        $place_of_death = trim($_POST["place_of_death"]);
        $date_of_burial = trim($_POST["date_of_burial"]);
        $place_of_burial = trim($_POST["place_of_burial"]);
        $minister = trim($_POST["minister"]);

        $database->update_death_certificate($id,$name_of_deceased, $age, $residence,
        $married_with, $father, $mother, $date_of_death, $place_of_death, $date_of_burial,
        $place_of_burial, $minister);
        
            header("location: death.php");
            exit();
    }

?>


<html>
    <title>
        Update Death Certificate
    </title>
    <head>
        <style>
            #body{
                background-color: coral;

                padding: 10px;
            }
        </style>

    </head>
    <div class="container">
        
        
        <div id="body">
        <h3 align="center">
       Update Death Information
        </h3>
        
        <form method="POST">
            <table>
                <tr>
                   
                    <td><label>Name of Deceased</label><input class="form-control" type="text" name="name_of_deceased" id="name_of_deceased" value="<?php echo $name_of_deceased ?>"></td>
                    <td>&nbsp;</td>
                    <td><label>Age</label><input class="form-control" type="number" name="age" id="age" value="<?php echo $age ?>"></td>
                    <td>&nbsp;</td>
                    <td><label>Residence</label><textarea class="form-control" type="text" name="residence" rows="4" cols="40" ><?php echo $residence ?></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Married With</label><input class="form-control" type="text" name="married_with" id="married_with" value="<?php echo $married_with ?>"></td>
                    <td>&nbsp;</td>
                    </tr>
            </table>

            <br>
            <table>
                <tr>
                     <td>&nbsp;</td>
                     <td><label>Father</label><input class="form-control" type="text" name="father" id="father" value="<?php echo $father ?>"></td>
                     <td>&nbsp;</td>
                     <td><label>Mother</label><input class="form-control" type="text" name="mother" value="<?php echo $mother ?>"></td>
                    <td>&nbsp;</td>
                    <td><label>Date of Death </label><input class="form-control" type="date" name="date_of_death" value="<?php echo $date_of_death ?>"></td>
                    <td>&nbsp;</td>
                    <td><label>Place of Death</label><textarea class="form-control" type="text" name="place_of_death" rows="4" cols="40" ><?php echo $place_of_death ?></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Date of Burial</label><input class="form-control" type="date" name="date_of_burial" value="<?php echo $date_of_burial ?>"></td>
                    
                   
                </tr>
            </table>

            <table>
                <tr>
                    <td><label>Place of Burial</label><textarea class="form-control" type="text" name="place_of_burial" rows="4" cols="40" ><?php echo $place_of_burial ?></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Minister</label><input class="form-control" type="text" name="minister" value="<?php echo $minister ?>"></td>
               
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