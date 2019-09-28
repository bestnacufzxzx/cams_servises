<?php

class Courses
{
    public $db;

    function __construct ($db) {
        $this->db = $db;
    } 
        
    function getAllCourse(){
        $sth = $this->db->prepare("SELECT * FROM courses");
        // $query = "%".$args['query']."%";
        // $sth->bindParam("query", $query);
		$sth->execute();
		$todos = $sth->fetchAll();
	    return $todos;
    }
}