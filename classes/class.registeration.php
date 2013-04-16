<?php
class registeration {
var $reg_id;
var $user_id;
var $selectedclassid;

var $name;
var $address;
var $city;
var $state;
var $country;
var $phone;
var $fax;
var $email;
var $driver_license;
var $driver_license_state;
var $social_security;
var $dob;
var $interest1;
var $interest2;
var $interest3;

var $RadioGroup1;

var $db;


	function registeration($db, $reg_id="") {
	$this->db = $db;
	if($medicine_id!="") {
	$qry = "select * from registeration where reg_id=" . $reg_id;
	if($this->db->getNumrows($qry)>0) {
	$row = $this->db->getRows($qry);
	$this->reg_id = $row[0]->reg_id;
	$this->user_id = $row[0]->user_id;
	$this->name=$row[0]->name;
	$this->address=$row[0]->address;
	$this->city[0]->city;
	$this->state=$row[0]->state;
    $this->country=$row[0]->country;
	$this->phone=$row[0]->phone;
	$this->fax=$row[0]->fax;
	$this->email=$row[0]->email;
	$this->driver_license=$row[0]->driver_license;
	$this->driver_license_state=$row[0]->driver_license_state;
	$this->social_security = $row[0]->social_security;
	$this->dob = $row[0]->dob;
	$this->interest1 = $row[0]->interest1;
	$this->interest2 = $row[0]->interest2;
	$this->interest3 = $row[0]->interest3;
	$this->RadioGroup1 = $row[0]->RadioGroup1;
	}
	}
	}

	//Below function to add Registeration_form1 Details to db
	function reg_form1_insert() {
	if($this->name!=""){
	$sql = "insert into registeration (class_id,user_id,name,address,city,state,country,phone,fax,email,driver_license,driver_license_state,social_security,dob,interest1,interest2,interest3)";
	$sql .= " values ('" .$this->selectedclassid. "','" .$this->user_id. "','" .$this->name. "','" .$this->address. "','" .$this->city. "','" .$this->state. "','" .$this->country. "','" .$this->phone. "','" .$this->fax. "','" .$this->email. "','" .$this->driver_license. "','" .$this->driver_license_state. "','" .$this->social_security. "','" .$this->dob. "','" .$this->interest1. "','" .$this->interest2. "','" .$this->interest3. "')";
	$this->db->setQry($sql);
	$this->reg_id= $this->db->getNewid();
	return $this->reg_id;// IF   inserted Successfully to db
	}
	else{
	return 0;// No data  entered so output 0
	}
	}
	//Above function to add Registeration_form1 Details to db
	
	//Below function to add Registeration_form2 Details to db
	function reg_form2_insert() {
	if($this->name!=""){
	$sql = "insert into registeration (class_id,name,address,city,state,country,phone,fax,email,driver_license,driver_license_state,social_security,dob,interest1,interest2,interest3)";
	$sql .= " values ('" .$this->selectedclassid. "','" .$this->name. "','" .$this->address. "','" .$this->city. "','" .$this->state. "','" .$this->country. "','" .$this->phone. "','" .$this->fax. "','" .$this->email. "','" .$this->driver_license. "','" .$this->driver_license_state. "','" .$this->social_security. "','" .$this->dob. "','" .$this->interest1. "','" .$this->interest2. "','" .$this->interest3. "')";
	$this->db->setQry($sql);
	$this->reg_id= $this->db->getNewid();
	return $this->reg_id;// IF   inserted Successfully to db
	}
	else{
	return 0;// No data  entered so output 0
	}
	}
	//Above function to add Registeration_form2 Details to db
	
	//Below function to add Registeration_form3 Details to db
	function reg_form3_insert() {
	if($this->name!=""){
	$sql = "insert into registeration (class_id,name,address,city,state,country,phone,fax,email,driver_license,driver_license_state,social_security,dob,interest1,interest2,interest3)";
	$sql .= " values ('" .$this->selectedclassid. "','" .$this->name. "','" .$this->address. "','" .$this->city. "','" .$this->state. "','" .$this->country. "','" .$this->phone. "','" .$this->fax. "','" .$this->email. "','" .$this->driver_license. "','" .$this->driver_license_state. "','" .$this->social_security. "','" .$this->dob. "','" .$this->interest1. "','" .$this->interest2. "','" .$this->interest3. "')";
	$this->db->setQry($sql);
	$this->reg_id= $this->db->getNewid();
	return $this->reg_id;// IF   inserted Successfully to db
	}
	else{
	return 0;// No data  entered so output 0
	}
	}
	//Above function to add Registeration_form3 Details to db
	
	//Below function to add Registeration_form4 Details to db
	function reg_form4_insert() {
	if($this->name!=""){
	$sql = "insert into registeration (class_id,name,address,city,state,country,phone,fax,email,driver_license,driver_license_state,social_security,dob,interest1,interest2,interest3)";
	$sql .= " values ('" .$this->selectedclassid. "','" .$this->name. "','" .$this->address. "','" .$this->city. "','" .$this->state. "','" .$this->country. "','" .$this->phone. "','" .$this->fax. "','" .$this->email. "','" .$this->driver_license. "','" .$this->driver_license_state. "','" .$this->social_security. "','" .$this->dob. "','" .$this->interest1. "','" .$this->interest2. "','" .$this->interest3. "')";
	$this->db->setQry($sql);
	$this->reg_id= $this->db->getNewid();
	return $this->reg_id;// IF   inserted Successfully to db
	}
	else{
	return 0;// No data  entered so output 0
	}
	}
	//Above function to add Registeration_form4 Details to db
	
	
	//function to Update Registeration Details ---start
	function reg_form_update() {

	if($this->RadioGroup1!=""){
	$sql = "update registeration";
	$sql .= " set verify_contact='".$this->RadioGroup1."' where reg_id=".$this->reg_id;
	$this->db->setQry($sql);
	return 1;//updated successfully
	}
	else{
	return 0;// No data  entered so output 0
	}
	}
	//function to Update Registeration Details ---End
	}
	?>