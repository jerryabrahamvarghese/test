<?php
class mmafueldata {
var $mmafueldata_id;
var $mycurrentkms;
var $datetoday;
var $amountpaid;
var $db;


function mmafueldata($db, $mmafueldata_id="") {
	$this->db = $db;
	if($mmafueldata_id!="") {
	$qry = "select * from mmafueldata where mmafueldata_id=" . $mmafueldata_id;
	if($this->db->getNumrows($qry)>0) {
	$row = $this->db->getRows($qry);
	$this->mmafueldata_id = $row[0]->mmafueldata_id;
	$this->mycurrentkms = $row[0]->mycurrentkms;
	$this->datetoday=$row[0]->datetoday;
	$this->amountpaid = $row[0]->amountpaid;
	
	}
	}
	}
	
	function fetchmyfuelentry(){
	$qry = "select * from mmafueldata ";
	if($this->db->getNumrows($qry)>0) {
	$row = $this->db->getRows($qry);
	return $row;
	}else {
	return 0;
	}
	}
	
	
	
	//bElow function will  insert the  details to db
	function insertmyfuelentry(){
	//echo $this->mycurrentkms,$this->datetoday,$this->amountpayed;
	if($this->mycurrentkms!="" && $this->datetoday!="" && $this->amountpaid!=""){
	$sql="insert into mmafueldata (mycurrentkms,datetoday,amountpaid)";
	$sql .= " values ('" .$this->mycurrentkms. "','" .$this->datetoday. "','" .$this->amountpaid. "')";
	//echo $sql;exit;
	 $this->db->setQry($sql);
	
	$this->mmafueldata_id= $this->db->getNewid();
	return $this->mmafueldata_id;// IF   inserted Successfully to db(if not inserted it will return 0)
	}else{
	return 0;// No data  entered so output 0
	}
		}
		
		
//Below function to delete entry from db
  function deletethisfuelentry(){
  if($this->mmafueldata_id!=""){
  $sql="delete from mmafueldata where mmafueldata_id='" .$this->mmafueldata_id. "'";
  $this->db->setQry($sql);
  return 1;
  }
	else{ return -2; }
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
function checkSignedUser(){
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