<?php
session_start();
if(!isset($_SESSION["isloggedIN"])){
    header('location:../login.php');
    exit();
}
require_once 'header.php';

    require_once '../class/DbFunctions.php';
   $database = new DbFunctions();

   if(isset($_GET["id"])){

    $id = trim($_GET["id"]);
}

$id = intval($_GET["id"]);


   $get_single_bap_cert = $database->get_single_baptismal_certificate($id);

   $series_of = $get_single_bap_cert["series_of"];
   $number = $get_single_bap_cert["number"];
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
        <p align="center">Baptismal Certificate<br>This is to Certify that</p>
        
        <button id="printPageButton" type="submit" onclick="window.print()" name="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print</button>
                
        <p>Series of <b><u><?php echo $series_of ?></u></b></p>
        <p>No. <b><u><?php echo $number ?></u></b></p>
        <table>
            <tr>
                <td><label>Name of Child : <u><?php echo $firstname  . " " . $middlename . " " . $lastname ?></u></label></td>
                
            </tr>
            <tr>
                <td><label>Name of Father : <u><?php echo $name_of_father ?></u></label></td>
               
            </tr>
            <tr>
                <td><label>Name of Mother : <u><?php echo $name_of_mother ?></u></label></td>
            </tr>
            <tr>
                <td><label>Present Address : <u><?php echo $present_address ?></u></label></td>
            </tr>
            <tr>
                <td><label>Date of Birth : <u><?php echo $date_of_birth ?></u></label></td>
            </tr>
            <tr>
                <td><label>Place of Birth : <u><?php echo $place_of_birth ?></u></label></td>
            </tr>
        </table>
        <p>
            was solemnly baptized according to the rites of the Roman Catholic Church at the Parish of St. Thomas of Villanueva, Bayawan City, Negros Oriental
        </p>
        <table>
            <tr>
                <td><label>Date of Baptism : <u><?php echo $date_of_baptism ?></u></label></td>
            </tr>
            <tr>
                <td><label>Baptized by : <u><?php echo $baptized_by ?></u></label></td>
            </tr>
            <tr>
                <td><label>Sponsor (s)  : <u><?php echo $sponsors ?></u></label></td>
            </tr>
        </table>
        <p>
            In witness hereof hereunto, I affix my signature and the seal of the Parish Church this <u>____</u> day of <u>__________</u>,
            <u>20__</u> at Bayawan Roman Catholic Rectory, Bayawan City, Negros Oriental.
        </p>
        <br><br>

        <div align="right">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>________________</u><br>
        <label>Parish Priest</label>
        </div>
        <table>
            <tr>
                <td><label>Book of Baptism : ______________</label></td>
            </tr>
            <tr>
                <td><label>Page : ______________</label></td>
            </tr>
            <tr>
                <td><label>No : ______________</label></td>
            </tr>
            <tr>
                <td><label>For : ________________________</label></td>
                <td><label>Parochial Vicar : ________________________</label></td>
            </tr>
        </table>
       
    </div>
</html>


    