<?php
    //database
    require_once '../class/DbFunctions.php';
    //database object
    $database = new DbFunctions();

    if(isset($_POST["key"])){
        
        //get all baptismal
        if(isset($_POST["key"]) == "list_of_baptismal_certificates"){

            $start = trim($_POST["start"]);
            $limit = trim($_POST["limit"]);

            $result = $database->get_all_baptismal_certificate($start,$limit);

            if(count($result)>0){

                $response ="";

                foreach($result as $key){
                    $response .='
                        <tr>
                            <td>'.$key['lastname'].'</td>
                            <td>'.$key['firstname'].'</td>
                            <td>'.$key['middlename'].'</td>
                            <td>'.$key['date_of_birth'].'</td>
                            <td>'.$key['date_of_baptism'].'</td>
                            
                            <td>
                                
                                <a class="btn btn-warning btn-sm" href="view_baptismal.php?id='.$key['id'].'">View</a>
                                <a class="btn btn-primary btn-sm" href="edit_baptismal.php?id='.$key['id'].'">Edit</a>
                                <a class="btn btn-danger btn-sm" href=" delete_baptismal.php?id='.$key['id'].'">Delete</a>
                            
                            </td>
                        </tr>
                    ';
                }
                exit($response);
            } else {
                exit("reachedMax");
            }
        }

       
    }
?>