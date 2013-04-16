<?php
include "includes/config.php";
include "classes/class.database.php";
include "classes/class.expensedetails.php";
include "classes/class.userdetails.php";
$db= new database();

if($_GET['type']=="usersignup" ){
$username=$_GET['user_name'];
$password=$_GET['password'];
//echo $username,$password;
$UserDetailsObj= new userdetails($db);
$UserDetailsObj->user_name=$username;
$UserDetailsObj->password=$password;
$Result=$UserDetailsObj->saveUserdetails();
if($Result==1){
echo "2";//Saved succesfully
}else{
echo "3";//error occured in saving
}
exit;
}


if($_GET['type']=="usersignin" ){
$username=$_GET['user_name'];
$password=$_GET['password'];
//echo $username,$password;
$UserDetailsObj= new userdetails($db);
$UserDetailsObj->user_name=$username;
$UserDetailsObj->password=$password;
$Result=$UserDetailsObj->checkUserLogin();
if($Result==1){
echo "S:".$UserDetailsObj->user_id;
//echo $UserDetailsObj->user_id;//Saved succesfully
}else{
echo "E";//error occured in saving
}
exit;
}

//To enter  expenses to Data base
if($_GET['type']=="Enterthisexpense" && $_GET['myexpensename']!="" && $_GET['amountpayed']!=""){
//echo "came to this page";exit;
$expObj= new expensedetails($db);
$expObj->expense_itemname=$_GET['myexpensename'];
$expObj->expense_date=$_GET['datetoday'];
$expObj->expense_cost=$_GET['amountpayed'];
$expObj->user_id=$_GET['user_id'];

$Result=$expObj->insertmyexpenses();
if($Result!=0){
echo "7";//eNTRED TO DB Succefully
exit;
}else{
echo "3";//Not entered  to db (unsuccessfull)
exit;
}
}
//If  Past entry is clicked  a cal from js page wil come  to this  page  and  below
// if will work
// Below code will fetch  the past etries   from db 
if($_GET['type']=="fetchmyexpenseentry" ){
//echo "came to this page";exit;
$user_id=$_GET['user_id'];
$expensedataObj= new expensedetails($db);
$expensedataObj->user_id=$user_id;
 $Result=$expensedataObj->fetchmyexpenses();
 $Totalexpense=$expensedataObj->fetchmytotalexpense();
if($Result!=0){?>
<input type="button" id="HidefetchedfuelentryBtn" value="Add New Entry" style="display:;" onclick="javascript:Hidefetchedexpenseentry();" />

<input type="button" id="Tohomepage" value="Home Page" style="display:;" onclick="javascript:touserhomepageDiv();" />
<hr />
<div style="float:left; width:270px; background:url(images/manage01.PNG) no-repeat;">
<select style="width:110px; height:27px; font-size:12px; margin-left:2px;background-color:#636363; color:#FFFFFF;margin-left:155px; margin-top:8px;"  onchange="Sortexistingitemsby()"  name="sortitemsby" id="sortitemsby">
<option value=""   <?php if($sortby==""){echo "selected";} ?> >Select</option>


<option value="Alphabetically"  <?php if($sortby=="Alphabetically"){echo "selected";} ?> >Yearly</option>
<option value="purchasedate"   <?php if($sortby=="purchasedate"){echo "selected";} ?>>Last 6 Months</option>
<option value="storename"     <?php if($sortby=="storename"){echo "selected";} ?>>Last 4 Months</option>
<option value="expirationdate"   <?php if($sortby=="expirationdate"){echo "selected";} ?>>Last Month</option>
</select>

</div>

<br/><br/>
<hr/>
<div style="font-weight:bold";>My Past Expense  Details:</div>
<div class="Highlghtfont">Total Expense till Now :<?php echo $Totalexpense;?></div>
<hr />

<?php

$Colorchangingvarible=1;
foreach($Result as $ResultList){
?>
<div  <?php if ($Colorchangingvarible==1){$Colorchangingvarible=2;?>
style="background-color:#0099FF" <?php }else {$Colorchangingvarible=1; ?> style="background-color:#66CC99" <?php } ?>>

<div>Expense On :<?php 

$timestamp = strtotime($ResultList->expense_date);

$expensedate = date('d/M/Y', $timestamp); 

echo $expensedate; ?></div>
<div>Item Name :<?php echo $ResultList->expense_itemname;?></div>
<div>Amount  :<?php echo $ResultList->expense_cost;?></div>
<div  class="deletefuelentry" title="Delete this entry, If entered incorrectly!" onclick="javascript:deletethisentry(<?php echo $ResultList->expense_id;?>);">X</div>
</div>
<hr /><?php } ?> <div class="Highlghtfont">Total Expense :<?php echo $Totalexpense;?></div>
<input type="button" id="HidefetchedfuelentryBtn" value="Add New Expense Entry" style="display:;" onclick="javascript:Hidefetchedexpenseentry();" />
<?php exit;
}else{?>
<input type="button" id="HidefetchedfuelentryBtn" value="Back to Enter Details" style="display:;" onclick="javascript:Hidefetchedexpenseentry();" />
<div style="color:#FF0000;height:77px;padding-top:34px;">Opps! No data  Available!</div>
<?php 

}

}

// Below code will fetch  the past entries   from db 
if($_GET['type']=="Deletethisexpenseentry" ){
$thisid=$_GET['thisid'];
$expObj= new expensedetails($db,$thisid);
 $Result=$expObj->deletethisexpenseentry();
 if($Result==1){
 echo "1";exit;//deleted
 }else{
 echo "2";exit;//Not deleted
 }
}


?>