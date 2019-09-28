<?php

class Showimportlecturers
{
    public $db;

    function __construct ($db) {
        $this->db = $db;
    } 
        
    function getAllShowimportlecturers(){
        $sth = $this->db->prepare("SELECT * FROM lecturers");
        // $query = "%".$args['query']."%";
        // $sth->bindParam("query", $query);
		$sth->execute();
		$todos = $sth->fetchAll();
	    return $todos;
    }
}