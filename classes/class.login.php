<?php
class login {
var $user_id;
var $user_name;
var $password;
var $noOfRows;
var $check;


function login($db, $user_id="") {
	$this->db = $db;
	if($user_id!="") {
	$qry = "select * from login where user_id=" . $user_id;
	if($this->db->getNumrows($qry)>0) {
	$row = $this->db->getRows($qry);
	$this->user_id = $row[0]->user_id;
	$this->user_name=$row[0]->user_name;
	$this->password = $row[0]->password;
	$this->confirm_password=$row[0]->confirm_password;
	}
	}
	}
//Below function to insert Login Details to db
function userSignUp()
{
if($this->user_name!=""){
	$this->check = checkNewUser();
	if($this->check==1)
	{
	return 2;
	exit;
	}
	$sql = "insert into login (user_name,password)";
	$sql .= " values ('" .$this->user_name. "','" .$this->password. "')";
	$this->db->setQry($sql);
	$this->user_id= $this->db->getNewid();
	return $this->user_id;// IF   inserted Successfully to db
	}
	else{
	return 0;// No data  entered so output 0
	}
	}
//Above function to add Login Details to db


//<!-- Below to check username and password exists in db --> 
function checkSignedUser()
{
if($this->user_name!="" && $this->password!=""){
	$sql = "select * from login";
	$sql .= " where user_name='".$this->user_name."' and password='".$this->password."'";
	$this->db->setQry($sql);
	 $this->noOfRows=$this->db->getNumrows($sql);
	
	if($this->noOfRows==1){
	$row = $this->db->getRows($sql);
	 $this->user_id = $row[0]->user_id;
	//$this->user_id= $this->db->getNewid();
	return $this->user_id;
	}
	else{ return 0; }
	}
	else{
	return 0;// No data  entered so output 0
	}
	}
//<!-- Above to check username and password exists in db --> 

	
//<!-- Below Function to check username already Exists while inserting user details --> 
function checkNewUser()
{
if($this->user_name!=""){
	$sql = "select * from login";
	$sql .= " where user_name='".$this->user_name."'";
	$this->db->setQry($sql);
	 $this->noOfRows=$this->db->getNumrows($sql);
	
	if($this->noOfRows==1){
	return 1;
	}
	
	}
	}
//<!-- Above Function to check username already Exists while inserting user details --> 



}
?>