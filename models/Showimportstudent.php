<?php

class Showimportstudent
{
    public $db;

    function __construct ($db) {
        $this->db = $db;
    } 
        
    function getAllShowimportstudent(){
        $sth = $this->db->prepare("SELECT * FROM students");
        // $query = "%".$args['query']."%";
        // $sth->bindParam("query", $query);
		$sth->execute();
		$todos = $sth->fetchAll();
	    return $todos;
    }

    public function search($search){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->like('username', 'fname','lname', 'mname', $search);
        $query = $this->db->get();
        return $query->result();
    }
}