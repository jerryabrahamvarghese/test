<?php
$server="OFF"; // Make ON FOR SERVER  / OFF FOR LOCALHOST
define("ENCRYPTIONONOFF","OFF");// Make ON or OFF ,for enycrption on and off.
define("USERAGENTONOFF","OFF");// Make ON -for working in ipad/Ipod
//only  and OFF -for testng in browsers

if($server=="ON"){
//For local host
define("DB_HOST","OUR  SERVER IP");
define("DB_USER","USERNAME OF  SEREVR ");
define("DB_PASSWORD","SERVER PWD");
define("DB_NAME","DATABASE  NAME");
define("ROWSPERPAGE",5);
define("LINKSPERPAGE",5);
define("ROOTFOLDER","  LOCATION OF UR  ROOT FOLDER");

}
elseif($server=="OFF"){
//For local host
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_NAME","myexpcal");
define("ROWSPERPAGE",5);
define("LINKSPERPAGE",5);
define("ROOTFOLDER","http://localhost/ExpenseCal/");//http://localhost/MyMileageApps/

}


?>