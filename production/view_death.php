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

    $series = $getDCertificate["series"];
    $record_no = $getDCertificate["record_no"];
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

?>


<html>
    <head>
        <title  align="center">
        Diocese of Dumaguete
        </title>
        <style>
             @media print {
                #printPageButton {
                    display: none;
                }
                }
        </style>
    </head>
    <div class="container">
        <div align="center">
            
            <h4>
                <img src="dists/logo.jpg" width="50" height="50">
                PARISH OF ST. THOMAS OF VILLANUEVA
            </h4>
            <P>
                6221 Bayawan City, Negros Oriental <br>Philippines
            </P>
        </div>
        <p align="center">Death Certificate<br>This is to Certify that</p>
        
        <button id="printPageButton" type="submit" onclick="window.print()" name="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print</button>
                
        <p>Series of <b><u><?php echo $series ?></u></b></p>
        <p>No. <b><u><?php echo $record_no ?></u></b></p>
        <table>
            <tr>
                <td><label>Name of Deceased : <u><?php echo $name_of_deceased ?></u></label></td>
                
            </tr>
            <tr>
                <td><label>Age : <u><?php echo $age ?></u></label></td>
               
            </tr>
            <tr>
                <td><label>Residence : <u><?php echo $residence ?></u></label></td>
            </tr>
            <tr>
                <td><label>Married with : <u><?php echo $married_with ?></u></label></td>
            </tr>
            <tr>
                <td><label>Father : <u><?php echo $father ?></u></label></td>
            </tr>
            <tr>
                <td><label>Mother : <u><?php echo $mother ?></u></label></td>
            </tr>
            <tr>
                <td><label>Date of Death : <u><?php echo $date_of_death ?></u></label></td>
            </tr>
            <tr>
                <td><label>Place of Death : <u><?php echo $place_of_death ?></u></label></td>
            </tr>
            <tr>
                <td><label>Date of Burial : <u><?php echo $date_of_burial ?></u></label></td>
            </tr>

            <tr>
                <td><label>Place of Burial : <u><?php echo $place_of_burial ?></u></label></td>
            </tr>

            <tr>
                <td><label>Minister : <u><?php echo $minister ?></u></label></td>
            </tr>
        </table>
        <p>
            The undersigned Catholic Parish Priest of Bayawan states that the above data regarding the Death and burial of
            <u><?php echo $name_of_deceased ?></u> are true and correct copy from the Register of Death Book No._______
            Page No.___________ of this Parish of St. Thomas of Villanueva Bayawan.
        </p>
        
        <p>
           Signed at the Bayawan Roman Catholic Rectory on the ________________ day of _______________________________________with the seal of Parish Church.
        </p>
        <br><br>

        <div align="right">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>________________</u><br>
        <label>Parish Priest</label>
        </div>
        
       
    </div>
</html>
