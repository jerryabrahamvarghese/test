<?php
class expensedetails {
var $expense_id;
var $user_id;
var $expense_itemname;
var $expense_date;
var $expense_cost;
var $db;


function expensedetails($db, $expense_id="") {
	$this->db = $db;
	if($expense_id!="") {
	$qry = "select * from expenses where expense_id=" . $expense_id;
	if($this->db->getNumrows($qry)>0) {
	$row = $this->db->getRows($qry);
	$this->expense_id = $row[0]->expense_id;
	$this->expense_itemname = $row[0]->expense_itemname;
	$this->expense_date=$row[0]->expense_date;
	$this->expense_cost = $row[0]->expense_cost;
	
	}
	}
	}
	
	function fetchmyexpenses(){
	$qry = "select *  from expenses where user_id= ".$this->user_id;
	if($this->db->getNumrows($qry)>0) {
	$row = $this->db->getRows($qry);
	return $row;
	}else {
	return 0;
	}
	}
	
	function fetchmytotalexpense(){
$qry = "select SUM(expense_cost) as totalexpense from expenses where user_id= ".$this->user_id;
	if($this->db->getNumrows($qry)>0) {
	$row = $this->db->getRows($qry);
	$this->totalexpense = $row[0]->totalexpense;
	return $this->totalexpense;
	}else {
	return 0;
	}
	}
	
	
	
	
	//bElow function will  insert the  details to db
	function insertmyexpenses(){
	//echo $this->mycurrentkms,$this->datetoday,$this->amountpayed;
	if($this->expense_itemname!="" && $this->expense_date!="" && $this->expense_cost!=""){
	$sql="insert into expenses (expense_itemname,expense_date,expense_cost,user_id)";
	$sql .= " values ('" .$this->expense_itemname. "','" .$this->expense_date. "','" .$this->expense_cost. "','" .$this->user_id. "')";
	//echo $sql;exit;
	 $this->db->setQry($sql);
	$this->expense_id= $this->db->getNewid();
	return $this->expense_id;// IF   inserted Successfully to db(if not inserted it will return 0)
	}else{
	return 0;// No data  entered so output 0
	}
		}
		
		
//Below function to delete entry from db
  function deletethisexpenseentry(){
  if($this->expense_id!=""){
  $sql="delete from expenses WHERE expense_id='" .$this->expense_id. "'";
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