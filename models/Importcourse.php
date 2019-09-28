<?php

class Importcourse
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
                    $sql = "INSERT INTO `courses`(`courseID`, `courseCode`, `courseName`) VALUES (
                        null, :courseCode, :courseName
                    )";
                    $query = $this->db->prepare($sql);
                    $query->bindValue('courseCode', $obj->course_Code);
                    $query->bindValue('courseName', $obj->course_Name);
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
}