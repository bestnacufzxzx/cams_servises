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
}