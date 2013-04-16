<?php
class database
{
	var $pconnect;
	var $lnk;
	var $qry;
	var $rs;
	function database($pconnect=false)
	{
	if($pconnect==true)
	{
	$this->lnk=mysql_pconnect(DB_HOST,DB_USER,DB_PASSWORD);
	} else {
	$this->lnk=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	}
	mysql_select_db(DB_NAME,$this->lnk);
	}
	function setQry($qry)
	{
	
	$this->qry = mysql_query($qry);
	}
	function getNumrows($qry)
	{
	$this->setQry($qry);
	return mysql_num_rows($this->qry);
	}
	function getRows($qry)
	{
	$rec = array();
	$i=0;
	$this->setQry($qry);
	while($row = mysql_fetch_object($this->qry))
	{
	$rec[$i] = $row;
	$i++;
	}
	return $rec;
	}
	function getNewid()
	{
	return mysql_insert_id();
	}
	function dbClose()
	{
	mysql_close($this->lnk);
	}
}
?>