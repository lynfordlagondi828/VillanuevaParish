<?php
 //database
 require_once '../class/DbFunctions.php';
 //database object
 $database = new DbFunctions();
     //get all confirmation
     if(isset($_POST["key"]) == "list_of_confirmation_certificates"){

        $start = trim($_POST["start"]);
        $limit = trim($_POST["limit"]);

        $RESULT = $database->get_all_confirmation_certificate($start,$limit);

        if(count($RESULT)>0){

            $response ="";

            foreach($RESULT as $key){
                $response .='
                    <tr>
                        <td>'.$key['lastname'].'</td>
                        <td>'.$key['firstname'].'</td>
                        <td>'.$key['middlename'].'</td>
                        <td>'.$key['name_of_father'].'</td>
                        <td>'.$key['name_of_mother'].'</td>
                        
                        <td>
                            
                            <a class="btn btn-danger btn-sm" href="view_confirmation.php?id='.$key['id'].'">View</a>
                            <a class="btn btn-info btn-sm" href="edit_confirmation.php?id='.$key['id'].'">Edit</a>
                            <a class="btn btn-warning btn-sm" href=" delete_confirmation.php?id='.$key['id'].'">Delete</a>
                        
                        </td>
                    </tr>
                ';
            }
            exit($response);
        } else {
            exit("reachedMax");
        }
    }
?>