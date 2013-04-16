<?php
class userdetails {
var $user_id;
var $fname;
var $lname;
var $profession;
var $email;
var $pwd;
var $status;
var $db;


	function userdetails($db, $user_id="") {
	$this->db = $db;
	if($medicine_id!="") {
	$qry = "select * from userdetails where user_id=" . $user_id;
	if($this->db->getNumrows($qry)>0) {
	$row = $this->db->getRows($qry);
	$this->user_id = $row[0]->user_id;
	$this->fname=$row[0]->fname;
	$this->lname=$row[0]->lname;
	$this->profession=$row[0]->profession;
    $this->user_name=$row[0]->user_name;
	$this->password=$row[0]->password;
	$this->status=$row[0]->status;

	}
	}
	}

	//function to add user details to db
	function saveUserdetails() {
	if($this->password!=""){
	$sql = "insert into userdetails (user_name,password)";
	$sql .= " values ('" .$this->user_name. "','" .$this->password. "')";
		$this->db->setQry($sql);
	return 1;// IF   user details addED Successfully to db
	}
	else{
	return 0;// No user details  entered so output 0
	}
	}
	
	
		//function to add user details to db
	function saveUserdetailsforupdates() {
	if($this->email!=""){
     $date_time   = date('Y-m-d H:i:s') ;
	$sql = "insert into userdetails (fname,email,status,registereddate)";
	$sql .= " values ('" .$this->fname. "','" .$this->email. "','" ."true". "','" .$date_time. "')";
	$this->db->setQry($sql);

	return 1;// IF   user details addED Successfully to db
	}
	else{
	return 0;// No user details  entered so output 0
	}
	}
	
	
   //function to check email from user details 
	function checkemailAlreadyused() {
	if($this->email!=""){
	$qry = "select * from userdetails where email='" .$this->email. "'" ;
	if($this->db->getNumrows($qry)>0) {
      return 2;// email already exists in db
	 }
	 else{
	 return 1;// email Not exists in db
	 }
	}
	else{
	return 0;// No user details  entered so output 0
	}
	}

     function checkUserLogin() {					
		$sql = "SELECT user_id 
		FROM userdetails
		WHERE user_name = '".$this->user_name. "'
		AND password = '".$this->password."'";	
		if($this->db->getNumrows($sql)>0){
		$row = $this->db->getRows($sql);
		 $this->user_id = $row[0]->user_id;
		return 1;
		} else {
		return 0;
		}
		}



function datetodb($dt) {
		$months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		if(substr($dt,2,1)=="-" && substr($dt,6,1)=="-") {
		$ary = explode("-",$dt);
		$month = (array_search($ary[1],$months)+1);
		if($month<10)
		$month = "0" . $month;
		$finaldate = $ary[2] . "-" . $month . "-" . $ary[0];
		return $finaldate;
		} else {
		return "";
		}
		}
		
		function datefromdb($dt) {
		$months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		if(strlen($dt)>10) 
		$dt = substr($dt,0,10);
		if(substr($dt,4,1)=="-" && substr($dt,7,1)=="-") {
		$ary = explode("-",$dt);
		$finaldate= $ary[2] . "-" . $months[($ary[1]-1)] . "-" . $ary[0];
		return $finaldate;
		} else {
		return "";
		}
		}

       function selectuser($id) {					
		$sql = "SELECT *
		FROM userdetails
		WHERE user_id = '" . $id . "'
		";				
		if($this->db->getNumrows($sql)>0) {
		$row = $this->db->getRows($sql);
		return $this->db->getRows($sql);
		} else {
		return 0;
		 }
		}
	
}
?>