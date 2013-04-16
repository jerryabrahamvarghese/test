<?php
class classes {
var $class_id;
var $class_name;
var $db;


	function classes($db, $class_id="") {
	$this->db = $db;
	if($class_id!="") {
	$qry = "select * from classes where class_id=" . $class_id;
	if($this->db->getNumrows($qry)>0) {
	$row = $this->db->getRows($qry);
	$this->class_id = $row[0]->class_id;
	$this->class_name=$row[0]->class_name;
	
	}
	}
	}


    function fetchclasses($db) {
	$this->db = $db;
	if($this->db!="") {
	$qry = "select * from classes ";
	if($this->db->getNumrows($qry)>0) {
	$row = $this->db->getRows($qry);
	
	return $row;

	 }
	}
	}




	
}
?>