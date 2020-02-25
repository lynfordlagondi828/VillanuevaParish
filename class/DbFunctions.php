<?php
class DbFunctions{

    private $conn;

    function __construct()
    {
        require_once 'DbConfig.php';
        $database = new DbConfig();
        $this->conn = $database->DB_CONNECT();
    }

    //user authentication
    public function userAuth($email,$password){

        $SQL = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array($email,$password));
        $RESULT = $stmt->fetch();
        return $RESULT;
    }


    //get all baptismal cert
    public function get_all_baptismal_certificate($start,$limit){

        $SQL = "SELECT * FROM certificates  ORDER BY lastname ASC LIMIT $start,$limit";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array());
        $RESULT = $stmt->fetchAll();
        return $RESULT;
    }


    //get number 
    public function count_number_of_rows(){

        $SQL = "SELECT * FROM certificates";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array());
        $RESULT = $stmt->rowCount();
        return $RESULT;
    }
   
    //add baptismal certificate
    public function add_baptismal_certificate($series_of,$number,$lastname,$firstname,$middlename,$name_of_father,$name_of_mother,
        $present_address,$date_of_birth,$place_of_birth,$date_of_baptism,
        $baptized_by,$sponsors,$type){
        
        $SQL= "INSERT INTO certificates(series_of,number,lastname,firstname,middlename,name_of_father,name_of_mother,
                            present_address,date_of_birth,place_of_birth,date_of_baptism,baptized_by,
                            sponsors,type)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array($series_of,$number,$lastname,$firstname,$middlename,$name_of_father,$name_of_mother,
            $present_address,$date_of_birth,$place_of_birth,$date_of_baptism,
            $baptized_by,$sponsors,$type));
        $RESULT = $stmt->fetch();
        return $RESULT;

    }

    //get single function 
    public function get_single_baptismal_certificate($id){

        $SQL = "SELECT * FROM certificates WHERE id = ?";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array($id));
        $RESULT = $stmt->fetch();
        return $RESULT;
    }

    //edit baptismal certificate
    public function edit_baptismal_certificates($id,$lastname,$firstname,$middlename,$name_of_father,$name_of_mother,
                    $present_address,$date_of_birth,$place_of_birth,$date_of_baptism,
                    $baptized_by,$sponsors){

        $SQL = "UPDATE  certificates SET lastname = ?, firstname = ?, middlename = ?, name_of_father = ?,
                            name_of_mother = ?, present_address = ?, date_of_birth = ?, place_of_birth = ?,
                            date_of_baptism = ?, baptized_by = ?, sponsors = ? WHERE id = ?";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array($lastname,$firstname,$middlename,$name_of_father,$name_of_mother,
                            $present_address,$date_of_birth,$place_of_birth,$date_of_baptism,
                            $baptized_by,$sponsors,$id));
        $RESULT = $stmt->fetch();
        return $RESULT;
    }


    //delete certificate
    public function delete_certificate($id){

        $SQL = "DELETE FROM certificates WHERE id = ?";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array($id));
        $RESULT = $stmt->fetch();
        return $RESULT;

    }   

    ////////////CONFIRMATION CERTIFICATE////////////////////////////
     //get all confiration cert
     public function get_all_confirmation_certificate($start,$limit){

        $SQL = "SELECT * FROM confirmation  ORDER BY lastname ASC LIMIT $start,$limit";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array());
        $RESULT = $stmt->fetchAll();
        return $RESULT;
    }

    //add confirmation certificate
    public function add_confirmation_certificate($lastname,$firstname,$middlename,$name_of_father,$name_of_mother,$address_parents,
                    $date_of_birth,$confirmed_by,$sponsors,$parish_priest){
        
        $SQL = "INSERT INTO confirmation(lastname,firstname,middlename,name_of_father,name_of_mother,address_of_parents,
                            date_of_birth,confirmed_by,sponsors,parish_priest)VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array($lastname,$firstname,$middlename,$name_of_father,$name_of_mother,$address_parents,
            $date_of_birth,$confirmed_by,$sponsors,$parish_priest));
        $RESULT = $stmt->fetch();
        return $RESULT;
    }

    //get single confirmation cerificate
    public function get_single_conf_cert($id){

        $SQL = "SELECT * FROM confirmation WHERE id = ?";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array($id));
        $RESULT = $stmt->fetch();
        return $RESULT;
    }

    //delete confirmation certificate
    public function delete_confirmation_certificate($id){

        $SQL = "DELETE FROM confirmation WHERE id = ?";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array($id));
        $RESULT = $stmt->fetch();
        return $RESULT;
    }

    //udpate confirmation certificate
    public function udpate_confirmation_certificate($id,$lastname,$firstname,$middlename,
                $name_of_father,$name_of_mother,$address_parents,
                $date_of_birth,$confirmed_by,$sponsors,$parish_priest){

        $MYSQL = "UPDATE confirmation SET lastname = ?, firstname = ?, middlename = ?,
                        name_of_father = ?, name_of_mother = ?, address_of_parents = ?, 
                        date_of_birth = ?, confirmed_by = ?, sponsors = ?, parish_priest = ?
                        WHERE id = ? ";
        $stmt = $this->conn->prepare($MYSQL);
        $stmt->execute(array($lastname,$firstname,$middlename,
            $name_of_father,$name_of_mother,$address_parents,
            $date_of_birth,$confirmed_by,$sponsors,$parish_priest,$id));
        $pdoResult = $stmt->fetch();
        return $pdoResult;

    }

    //////////////////////Death Certificate/////////////////////////////////////////
    
    //get all 
    public function get_all_death_certificate($start,$limit){

        $SQL = "SELECT * FROM death  ORDER BY name_of_deceased ASC LIMIT $start,$limit";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array());
        $RESULT = $stmt->fetchAll();
        return $RESULT;
    }

    //get rowcount
    public function count_record_no(){

        $SQL = "SELECT * FROM death";
        $stmt= $this->conn->prepare($SQL);
        $stmt->execute(array());
        $RESULT = $stmt->rowCount();
        return $RESULT;
    }

    /**
     * Add Death Certificate
     */
    public function add_death_certificate($series, $record_no, $name_of_deceased, $age, $residence,
                        $married_with, $father, $mother, $date_of_death, $place_of_death, $date_of_burial,
                        $place_of_burial, $minister){

        $SQL = "INSERT INTO death(series,record_no,name_of_deceased,age,residence,married_with, father, mother,
                            date_of_death, place_of_death, date_of_burial, place_of_burial, minister)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array($series, $record_no, $name_of_deceased, $age, $residence,
            $married_with, $father, $mother, $date_of_death, $place_of_death, $date_of_burial,
            $place_of_burial, $minister));
        $RESULT = $stmt->fetch();
        return $RESULT;

    }

    //get single death
    public function get_single_death($id){

        $SQL = "SELECT * FROM death WHERE id = ?";
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute(array($id));
        $pdo = $stmt->fetch();
        return $pdo;
    }

    //delete death certificate
    public function delete_death_certificate($id){

        $mySQL = "DELETE FROM death WHERE id = ?";
        $pdoStatement = $this->conn->prepare($mySQL);
        $pdoStatement->execute(array($id));
        $RESULT = $pdoStatement->fetch();
        return $RESULT;
    }

    //update death certificate
    public function update_death_certificate($id,$name_of_deceased, $age, $residence,
    $married_with, $father, $mother, $date_of_death, $place_of_death, $date_of_burial,
    $place_of_burial, $minister){

        $sql = "UPDATE death SET name_of_deceased = ?, age = ?, residence = ?, married_with = ?, father = ?, mother = ?,
                        date_of_death = ?, place_of_death = ?, date_of_burial = ?, place_of_burial = ?, minister = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($name_of_deceased, $age, $residence,
            $married_with, $father, $mother, $date_of_death, $place_of_death, $date_of_burial,
            $place_of_burial, $minister,$id));
        $result = $stmt->fetch();
        return $result;

    }


}