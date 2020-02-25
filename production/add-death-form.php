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

    //counter
    $count = $database->count_record_no();

    if(isset($_POST["save"])){

        $series = date("Y");
        $record_no = $count + 1;
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

        $result = $database->add_death_certificate($series, $record_no, $name_of_deceased, $age, $residence,
            $married_with, $father, $mother, $date_of_death, $place_of_death, $date_of_burial,
            $place_of_burial, $minister);
        
        if($result != TRUE){
            header("location: death.php");
            exit();
        } else {

            $err_msg = "unable to add data...";
        }
    }

?>


<html>
    <title>
        Create Death Certificate
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
        Death Information
        </h3>
        <p>
            <?php echo $err_msg ?>
        </p>
        <form method="POST">
            <table>
                <tr>
                   
                    <td><label>Name of Deceased</label><input class="form-control" type="text" name="name_of_deceased" id="name_of_deceased" placeholder="Firstname, Middlename, Lastname" required></td>
                    <td>&nbsp;</td>
                    <td><label>Age</label><input class="form-control" type="number" name="age" id="age" placeholder="Age" required></td>
                    <td>&nbsp;</td>
                    <td><label>Residence</label><textarea class="form-control" type="text" name="residence" rows="4" cols="40" placeholder="Residence" required></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Married With</label><input class="form-control" type="text" name="married_with" id="married_with" placeholder="Type N/A if not " required></td>
                    <td>&nbsp;</td>
                    </tr>
            </table>

            <br>
            <table>
                <tr>
                     <td>&nbsp;</td>
                     <td><label>Father</label><input class="form-control" type="text" name="father" id="father" placeholder="Father" required></td>
                     <td>&nbsp;</td>
                     <td><label>Mother</label><input class="form-control" type="text" name="mother" placeholder="Mother" required></td>
                    <td>&nbsp;</td>
                    <td><label>Date of Death </label><input class="form-control" type="date" name="date_of_death" placeholder="Date of Date" required></td>
                    <td>&nbsp;</td>
                    <td><label>Place of Death</label><textarea class="form-control" type="text" name="place_of_death" rows="4" cols="40" placeholder="Place of Death" required></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Date of Burial</label><input class="form-control" type="date" name="date_of_burial" placeholder="Date of burial"></td>
                    
                   
                </tr>
            </table>

            <table>
                <tr>
                    <td><label>Place of Burial</label><textarea class="form-control" type="text" name="place_of_burial" rows="4" cols="40" placeholder="Place of Burial" required></textarea></td>
                    <td>&nbsp;</td>
                    <td><label>Minister</label><input class="form-control" type="text" name="minister" placeholder="Minister" required></td>
               
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