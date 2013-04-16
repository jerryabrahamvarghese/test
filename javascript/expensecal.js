<!-- Below function while clicking about us icon -->
function aboutus(){
	document.getElementById('signup').style.display='none';
	document.getElementById('login').style.display='none';
	document.getElementById('aboutus').style.display='';
	document.getElementById('todayskmamountentryDiv1').style.display='none';
}
<!-- Above function while while clicking about us icon  -->
<!-- Below function while clicking home page  icon -->
function tohomepage(){
	
document.getElementById('todaysexpenseentryDiv1').style.display='none';
document.getElementById('userlogin').style.display='none';
document.getElementById('userHomepageDiv').style.display='';

		   	Unloading();
}
<!-- Above function while while clicking home page  icon  -->
<!-- Below function while clicking 4m usersignup to userlogin -->
function back2login(){
	document.getElementById('signup').style.display='none';
	document.getElementById('userlogin').style.display='';
}
<!-- Above function while while clicking 4m usersignup to userlogin -->

<!-- Below function for Entering todays expense name and amount -->
function Enterthisexpense(){
	var type = "Enterthisexpense";
	var frmname = document.myexpense;//form name
	myexpensename = frmname.myexpensename.value;
	datetoday = frmname.datetoday.value;
	amountpayed=frmname.amountpayed.value;
	var user_id=document.getElementById('hidden_user_id').value;
//alert(user_id);
$.ajax({ 
   type: "GET",  
    url: IpAddress+"insertfetchtodb.php",  
   data: "type="+type+"&myexpensename="+myexpensename+"&datetoday="+datetoday+"&amountpayed="+amountpayed+"&user_id="+user_id,
   contenttype: "application/text; charset=utf/8",
   dataType: "text",   
   success: function(resp){
	   //alert(resp);return false;//  uncomment  to see the resp from server
	  // alert(resp);
	serverresp=resp[0];
	//alert (serverresp);
			if (serverresp=="0"){
			alert("No internet Connection");
			/*txt1="No internet";
			txt2="Connection";
			modalpopupalert(txt1,txt2);*/
			}
else if(serverresp!="0"  && serverresp!="" && serverresp=="7"){


//Below code to fetch the inserted   details again by ajax and push to the  div:
var type = "fetchmyexpenseentry";
			$.ajax({ 
   type: "GET",  
    url: IpAddress+"insertfetchtodb.php",  
   data: "type="+type+"&user_id="+user_id,
   contenttype: "application/text; charset=utf/8",
   dataType: "text",   
   success: function(resp){
	 //  alert(resp);return false;//  uncomment  to see the resp from server

			if (resp=="0"){
				alert("No internet Connection");
			/*txt1="No internet";
			txt2="Connection";
			modalpopupalert(txt1,txt2);*/
			
			}
else if(resp!="0"  && resp!="" ){
	//alert(resp);//Response  from  server we wil get here
//Below line used to hide the  button
document.getElementById('showpastentryBtn').style.display='none';
//To push the resp from server to the  html page  below  2 methods are used
//document.getElementById('PastEntryfromserverDiv').innerHTML=resp;
$("#PastEntryfromserverDiv").html(resp);
//Below line used 2 Dispaly the  'PastEntryDiv2'
document.getElementById('PastEntryDiv2').style.display='';
document.getElementById('userhomepageDiv').style.display='none';

document.getElementById('todaysexpenseentryDiv1').style.display='none';

return false;
}
 
   },
   error: function(e){ 
	loading();
	//alert("error in connection");
	txt1="Error in connection";
	txt2="";
	modalpopupalert(txt1,txt2);
	Unloading();
   }  
   });
	

return false;
}
else if(serverresp=="3"){
	alert("Error in Insertion");
	/*txt1="Error in Insertion";
	txt2="Plz try again!!";
	modalpopupalert(txt1,txt2);*/
	return false;
}
   
   },
   error: function(e){ 
	loading();
	//alert("error in connection");
	txt1="Error in connection";
	txt2="";
	modalpopupalert(txt1,txt2);
	Unloading();
   }  
   });
		
}
<!-- Above function  4 Entering todays km and amount -->


<!-- Below function for 4 fetching the past fuel entry from db -->
function fetchmyexpenseentry(){
	
	var user_id=document.getElementById('hidden_user_id').value;
	var type = "fetchmyexpenseentry";
			$.ajax({ 
   type: "GET",  
    url: IpAddress+"insertfetchtodb.php",  
   data: "type="+type+"&user_id="+user_id,
   contenttype: "application/text; charset=utf/8",
   dataType: "text",   
   success: function(resp){
	 //  alert(resp);return false;//  uncomment  to see the resp from server

			if (resp=="0"){
				alert("No internet Connection");
			/*txt1="No internet";
			txt2="Connection";
			modalpopupalert(txt1,txt2);*/
			
			}
else if(resp!="0"  && resp!="" ){
	//alert(resp);//Response  from  server we wil get here
//Below line used to hide the  button
document.getElementById('showpastentryBtn').style.display='none';
//To push the resp from server to the  html page  below  2 methods are used
//document.getElementById('PastEntryfromserverDiv').innerHTML=resp;
$("#PastEntryfromserverDiv").html(resp);
//Below line used 2 Dispaly the  'PastEntryDiv2'
document.getElementById('PastEntryDiv2').style.display='';
document.getElementById('userhomepageDiv').style.display='none';

document.getElementById('todaysexpenseentryDiv1').style.display='none';

return false;
}
 
   },
   error: function(e){ 
	loading();
	//alert("error in connection");
	txt1="Error in connection";
	txt2="";
	modalpopupalert(txt1,txt2);
	Unloading();
   }  
   });
		
}
<!-- Above function  4 fetching my past fuel entry from db -->




<!-- Below function for displaying homepage -->
function touserhomepageDiv(){
document.getElementById('PastEntryDiv2').style.display='none';
document.getElementById('userhomepageDiv').style.display='';
document.getElementById('todaysexpenseentryDiv1').style.display='none';
	
}
<!-- Above function for displaying homepage -->



<!-- Below function for adding entry from homepage -->
function Addnewentry(){
	document.getElementById('showpastentryBtn').style.display='';
	
	document.getElementById('PastEntryDiv2').style.display='none';
		document.getElementById('userhomepageDiv').style.display='none';

	document.getElementById('todaysexpenseentryDiv1').style.display='';
	
}
<!-- Above function for adding entry from homepageDiv -->

<!-- Below function for hiding the  past fuel entry Div -->
function Hidefetchedexpenseentry(){
	document.getElementById('showpastentryBtn').style.display='';
	document.getElementById('HidefetchedfuelentryBtn').style.display='none';
	document.getElementById('PastEntryDiv2').style.display='none';
		document.getElementById('userhomepageDiv').style.display='none';

	document.getElementById('todaysexpenseentryDiv1').style.display='';
	
}
<!-- Above function for hiding the  past fuel entry Div -->

<!-- Below function for hiding the  past fuel entry Div -->
function deletethisentry(thisid){
	var thisid=thisid;
	//alert("this entry going 2 b deleted"+thisid);
	var type="Deletethisexpenseentry";
				$.ajax({ 
   type: "GET",  
    url: IpAddress+"insertfetchtodb.php",  
   data: "type="+type+"&thisid="+thisid,
   contenttype: "application/text; charset=utf/8",
   dataType: "text",   
   success: function(resp){
			if (resp=="0"){
				alert("No internet Connection");
			/*txt1="No internet";
			txt2="Connection";
			modalpopupalert(txt1,txt2);*/
			
			}
else if(resp!="0"  && resp!="" && resp=="1"){
txt1="Expense Deleted";
txt2="Successfully!";
modalpopupalert(txt1,txt2);
fetchmyexpenseentry();//function called  again to refresh the contents aftr delete
return false;
}
 
   },
   error: function(e){ 
	loading();
	//alert("error in connection");
	txt1="Error in connection";
	txt2="";
	modalpopupalert(txt1,txt2);
	Unloading();
   }  
   });
}

<!-- Below function while clicking signUp on Login page -->
function GotoSignUp(){
	document.getElementById('signup').style.display='';
	document.getElementById('userlogin').style.display='none';
}
<!-- Above function while clicking signUp on Login page -->



<!-- Below function while clicking Back Button on signUp page -->
function signupBack()
{
	document.getElementById('signup').style.display='none';
	document.getElementById('userlogin').style.display='';
}
<!-- Above function while clicking Back Button on signUp page -->


function userlogin(){
		var type = "usersignin";
	var signin = document.signinform;
	var user_name = signin.username_lgn.value;
	var password = signin.password_lgn.value;
	if(user_name==""){
		alert("Plz enter username");
		return false;
	}
	if(password==""){
		alert ("Plz enter password");
		return false;
	}
	loading();
		$.ajax({ 
   	type: "GET",  
    url: IpAddress+"insertfetchtodb.php",  
   data: "type="+type+"&user_name="+user_name+"&password="+password,
   contenttype: "application/text; charset=utf/8",
   dataType: "text",
   
   success: function(resp){

	  // alert(resp);
    // we have the response
  var str1 = resp;
  serverresp=resp[0];
 // alert(resp[0]);
  if(resp[0]=="S"){
  var user_id = str1.replace(/\S:/g,""); 
  
document.getElementById('hidden_user_id').value=user_id;//inserted id
//alert("userid is :"+user_id);
if(user_id!=""){
	
document.getElementById('todaysexpenseentryDiv1').style.display='none';
document.getElementById('userlogin').style.display='none';
document.getElementById('userhomepageDiv').style.display='';

		   	Unloading();

}
return false;
  }
	
	if (serverresp=="E"){
alert("Check your user name or password");
	   	Unloading();

return false;
	}
	if (resp=="0"){

	}


   
   },
   error: function(e){ 
	loading();
	//alert("error in connection");
	txt1="Error in connection";
	txt2="";
	modalpopupalert(txt1,txt2);
	Unloading();
   }  
   });
}

<!-- Below Starts function for User Registeration -->
function signupSubmit(){
	//alert("Going 2 submit");
	var type = "usersignup";
	var signup = document.signupform;
	var user_name = signup.user_name.value;
	var password = signup.password.value;
	var confirm_password = signup.confirm_password.value;
	if(user_name==""){
		alert("Plz enter username");
		return false;
	}
	if(password==""){
		alert ("Plz enter password");
		return false;
	}
	if(confirm_password==""){
			alert ("Plz enter Confirm password");
		return false;
	}
	if(confirm_password!=password)	{
		alert("Password and Confirm Password are not Same");
		return false;
	}
	$.ajax({ 
   	type: "GET",  
    url: IpAddress+"insertfetchtodb.php",  
   data: "type="+type+"&user_name="+user_name+"&password="+password,
   contenttype: "application/text; charset=utf/8",
   dataType: "text",
   
   success: function(resp){
	   alert(resp);
    // we have the response
  var str1 = resp;
  var user_id = str1.replace(/\Y/g,"");  
document.getElementById('hidden_user_id').value=user_id;//inserted id
	serverresp=resp[0];
	if (serverresp=="E"){
//alert("User Name Already Exists");
    txt1="User Name";
	txt2="Already Exists";
	modalpopupalert(txt1,txt2);
	}
	if (serverresp=="0"){
//alert("No internet Connection");
    txt1="No internet";
	txt2="Connection";
	modalpopupalert(txt1,txt2);
	}
	//IF SIGN UP IS SUCCESSFULL BELOW IF LOOP WILL WORK
else if(serverresp!="N"  && serverresp!="" && serverresp=="Y"){
document.getElementById('signup').style.display='none';
document.getElementById('qrcode').style.display='';
}
else if(serverresp=="N")
{
	//alert("Error in Updating");
	txt1="Error in";
	txt2="Updating";
	modalpopupalert(txt1,txt2);
	return false;
}
   
   },
   error: function(e){ 
	loading();
	//alert("error in connection");
	txt1="Error in connection";
	txt2="";
	modalpopupalert(txt1,txt2);
	Unloading();
   }  
   });
	
}
<!-- Above function for User Registeration -->







<!--  ******* Below are Validation functions (##By Jerry Abraham Varghese mobilewebappdeveloper.jerry@gmail.com )*******
 -->
<!-- Below function to Validate TextBox-->
function validateTextBox(value){  
   var iChars = "!@#$%^&*()+=[]\\\';,./{}|\":<>?";
for (var i = 0; i < value.length; i++) {
    if (iChars.indexOf(value.charAt(i)) != -1) {
alert ("Please remove special characters. \n"+iChars+"\nThese are not allowed in text boxes.\n");
		/*	txt1=value.charAt(i)+"  not";
			txt2="allowed in Textboxes";
			modalpopupalert_special(txt1,txt2);
			*/
    return false;
        }
    }
 }
<!-- Above function to Validate TextBox-->

<!-- Below function to Validate Email-->
function validateEmail(value){  
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
   return emailPattern.test(value);
 }
<!-- Above function to Validate Email-->

