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
        <p align="center">Confirmation Certificate<br>This is to Certify that</p>
        
        <div>
        <button id="printPageButton" type="submit" onclick="window.print()" name="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print</button>
        </div> 
        <hr>
        
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
                <td><label>Parent Address : <u><?php echo $address_of_parents ?></u></label></td>
            </tr>
            <tr>
                <td><label>Date of Birth : <u><?php echo $date_of_birth ?></u></label></td>
            </tr>
            
        </table>
        <p>
            was confirmed  at the St. Thomas of Villanueva Parish of the Roman Catholic Church
        </p>
        <table>
            <tr>
                <td><label>Confirmed by : <u><?php echo $confirmed_by ?></u></label></td>
            </tr>
          
            <tr>
                <td><label>Sponsor (s)  : <u><?php echo $sponsors ?></u></label></td>
            </tr>
            <tr>
                <td><label>Priest  : <u><?php echo $parish_priest ?></u></label></td>
            </tr>
        </table>
        <p>
           This certification is issued upon the request of the above mentioned for whatever legal purposes may serve him best.
        </p>
        <p>
            In witness hereof hereunto, I affix my signature and the seal of the Parish Church this <u>____</u> day of <u>__________</u>,
            <u>20__</u> at Bayawan Roman Catholic Rectory, Bayawan City, Negros Oriental.
        </p>
        <br><br>

        <div align="right">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>________________</u><br>
        <label>Parish Priest</label>
        </div>
        <br></br>
        <p>parish seal</p>
        <br></br>
        <div align="right">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>________________</u><br>
        <label>Parochial Vicar</label>
        </div>
        
        <label>For:___________________________</label>
    </div>
</html>


    