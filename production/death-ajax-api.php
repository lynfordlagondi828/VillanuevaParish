<?php
 //database
 require_once '../class/DbFunctions.php';
 //database object
 $database = new DbFunctions();

     //get all confirmation
     if(isset($_POST["key"]) == "list_of_death_certificates"){

        $start = trim($_POST["start"]);
        $limit = trim($_POST["limit"]);

     //   $RESULT = $database->get_all_death_certificate($start,$limit);
     $RESULT = $database->get_all_death_certificate($start,$limit);

        if(count($RESULT)>0){

            $response ="";

            foreach($RESULT as $key){
                $response .='
                    <tr>
                        <td>'.$key['name_of_deceased'].'</td>
                        <td>'.$key['age'].'</td>
                        <td>'.$key['residence'].'</td>
                        
                        <td>
                            
                            <a class="btn btn-danger btn-sm" href="view_death.php?id='.$key['id'].'">View</a>
                            <a class="btn btn-info btn-sm" href="edit_death.php?id='.$key['id'].'">Edit</a>
                            <a class="btn btn-warning btn-sm" href=" delete_death.php?id='.$key['id'].'">Delete</a>
                        
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