<?php

class Teachers
{
    public $db;

    function __construct ($db) {
        $this->db = $db;
    } 
        
    function import($data){

        try {
            // Start a new transaction
            $this->db->beginTransaction();

            foreach ($data as $obj) {
                if(!empty($obj->username)){
                    $sql = "INSERT INTO `user`(`userID`, `userName`, `password`) VALUES  (
                        null, :userName, :password
                    )";
                    $query = $this->db->prepare($sql);
                    $query->bindValue('userName', $obj->username);
                    $query->bindValue('password', 1234);
                    $query->execute();
                    $user_id = $this->db->lastInsertId();
                    $sql = "INSERT INTO `lecturers`(`lecturerID`, `firstName`, `lastName`, `email`, `phoneNumber`, `userID`) VALUES (
                        null, :firstName, :lastName, :email, :phoneNumber, :userID
                    )";
                    $query = $this->db->prepare($sql);
                    $query->bindValue('firstName', $obj->fname);
                    $query->bindValue('lastName', $obj->lname);
                    $query->bindValue('email', $obj->email);
                    $query->bindValue('phoneNumber', $obj->tel);
                    $query->bindValue('userID', $user_id);
                    $query->execute();   
                }
            }    
    
            // Commit all transaction changes
            $this->db->commit();
            return true;
        } catch (\Exception $exception) {
            // Roll back all transaction changes
            $this->db->rollBack();
            return false;
            // $returning_info['error_message'] = $exception->getMessage();
        }
    }

    public function search($search){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->like('username', 'fname','lname', 'mname', $search);
        $query = $this->db->get();
        return $query->result();
    }
}