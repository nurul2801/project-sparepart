<?php 
require_once ("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;

	case 'addschd' :
	doInsertsched();
	break;
	
	case 'edit' :
	doEdit();
	break;


	case 'addstudentselected' :
	doAddSelected();
	break;

	case 'delrecord' :
	delrecord();
	break;
	
	case 'delete' :
	doDelete();
	break;
 
	case 'editinstruct' :
	editinstructor();
	break;

 
	}




function editinstructor(){

if(isset($_POST['update'])){

	$idnum = $_POST['idnum'];
	$fn = $_POST['fname'];
	$ln = $_POST['lname'];
	$mn = $_POST['mname'];
	$gender = $_POST['gender'];
	$phone = $_POST['cp'];


 
	mysql_query("UPDATE instructor SET instructfname = '$fn', instructlname = '$ln', instructmname = '$mn', instructgender = '$gender', instructphone = '$phone' WHERE instructid ='$idnum'");
	message("Instructor information was successfully updated!", "success");
	redirect('../../index.php');
 
}

}
		

function doInsert(){



		
if (isset($_POST['save'])){




	$check = mysql_query("SELECT instructid FROM instructor WHERE instructid = '$_POST[idnum]'");
	$cresult = mysql_fetch_array($check);

	

	if($cresult['instructid'] == ""){



$sq = mysql_query("SELECT ACCOUNT_USERNAME FROM useraccounts WHERE ACCOUNT_USERNAME = '$_POST[username]'");
$rs = mysql_fetch_array($sq);


if($rs['ACCOUNT_USERNAME'] == ""){






	if ($_POST['fname'] == "" OR $_POST['lname'] == "" OR $_POST['username'] == "" OR $_POST['pass'] == "") {
		$messageStats = false;
		message("All field is required!","error");
		redirect('index.php?view=add');
	}else{
		

	
		$acc_idnum   = $_POST['idnum'];
		$acc_fname   = $_POST['fname'];
		$acc_lname   = $_POST['lname'];
		$acc_mname   = $_POST['mname'];
		$acc_gender   = $_POST['gender'];
		$acc_contact   = $_POST['cp'];
		$acc_username   = $_POST['username'];
		$acc_password 	= $_POST['pass'];
		$acc_type 		= $_POST['type'];





if (!empty($_FILES['image']['name'])) {



		$image= addslashes($_FILES['image']['tmp_name']);
			$name= addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image= base64_encode($image);
		
		 

		$user_idnum   = $acc_idnum;
		$user_fname   = $acc_fname;
		$user_lname   = $acc_lname ;
		$user_mname   = $acc_mname;
		$user_username   = $acc_username ;
		$md5password = md5($acc_password);
    	$h_upass = sha1($md5password);
		$user_type 		= $acc_type ;
			
			

 mysql_query("INSERT INTO instructor(instructid,instructfname,instructlname,instructmname, instructgender, instructphone)VALUES('$user_idnum','$user_fname','$user_lname','$user_mname', '$acc_gender', '$acc_contact')");
 mysql_query("INSERT INTO useraccounts(ACCOUNT_ID,instructid,ACCOUNT_USERNAME,ACCOUNT_PASSWORD,ACCOUNT_TYPE,imagename,imagefile)VALUES('','$user_idnum','$user_username','$h_upass','$user_type','$name','$image')");

			 	message("New account created successfully!", "success");
			 	redirect('index.php');
			



	}else{


			$name= 'default';
			$image= file_get_contents('../../defaultimage/defaultimage.jpg');
			$image= base64_encode($image);
				
		 

		$user_idnum   = $acc_idnum;
		$user_fname   = $acc_fname;
		$user_lname   = $acc_lname ;
		$user_mname   = $acc_mname;
		$user_username   = $acc_username ;
		$md5password = md5($acc_password);
    	$h_upass = sha1($md5password);
		$user_type 		= $acc_type ;
			
			

 mysql_query("INSERT INTO instructor(instructid,instructfname,instructlname,instructmname, instructgender, instructphone)VALUES('$user_idnum','$user_fname','$user_lname','$user_mname', '$acc_gender', '$acc_contact')");
 mysql_query("INSERT INTO useraccounts(ACCOUNT_ID,instructid,ACCOUNT_USERNAME,ACCOUNT_PASSWORD,ACCOUNT_TYPE,imagename,imagefile)VALUES('','$user_idnum','$user_username','$h_upass','$user_type','$name','$image')");

			 	message("New account created successfully!", "success");
			 	redirect('index.php');
			 	 
		}
		
	}




	}else{


			 	message("Username is already in used, pls try another username!", "error");
			 	redirect('index.php?view=add');
}


}else{


			 	message("ID number is already in used, pls try another ID!", "error");
			 	redirect('index.php?view=add');
}
}







elseif (isset($_POST['saveandadd'])){




	$check = mysql_query("SELECT instructid FROM instructor WHERE instructid = '$_POST[idnum]'");
	$cresult = mysql_fetch_array($check);

	

	if($cresult['instructid'] == ""){



$sq = mysql_query("SELECT ACCOUNT_USERNAME FROM useraccounts WHERE ACCOUNT_USERNAME = '$_POST[username]'");
$rs = mysql_fetch_array($sq);


if($rs['ACCOUNT_USERNAME'] == ""){



	if ($_POST['fname'] == "" OR $_POST['lname'] == "" OR $_POST['username'] == "" OR $_POST['pass'] == "") {
		$messageStats = false;
		message("All field is required!","error");
		redirect('index.php?view=add');
	}else{
		

	

		$acc_idnum   = $_POST['idnum'];
		$acc_fname   = $_POST['fname'];
		$acc_lname   = $_POST['lname'];
		$acc_mname   = $_POST['mname'];
		$acc_gender   = $_POST['gender'];
		$acc_contact   = $_POST['cp'];
		$acc_username   = $_POST['username'];
		$acc_password 	= $_POST['pass'];
		$acc_type 		= $_POST['type'];





if (!empty($_FILES['image']['name'])) {



		$image= addslashes($_FILES['image']['tmp_name']);
			$name= addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image= base64_encode($image);
		
		 


		$user_idnum   = $acc_idnum;
		$user_fname   = $acc_fname;
		$user_lname   = $acc_lname ;
		$user_mname   = $acc_mname;
		$user_username   = $acc_username ;
		$md5password = md5($acc_password);
    	$h_upass = sha1($md5password);
		$user_type 		= $acc_type ;
			
			

 mysql_query("INSERT INTO instructor(instructid,instructfname,instructlname,instructmname, instructgender, instructphone)VALUES('$user_idnum','$user_fname','$user_lname','$user_mname', '$acc_gender', '$acc_contact')");
 mysql_query("INSERT INTO useraccounts(ACCOUNT_ID,instructid,ACCOUNT_USERNAME,ACCOUNT_PASSWORD,ACCOUNT_TYPE,imagename,imagefile)VALUES('','$user_idnum','$user_username','$h_upass','$user_type','$name','$image')");

			 	message("New account created successfully!", "success");
			 	redirect('index.php');
			



	}else{
 
	
			$name= 'default';
			$image= file_get_contents('../../defaultimage/defaultimage.jpg');
			$image= base64_encode($image);
			
			

		$user_idnum   = $acc_idnum;
		$user_fname   = $acc_fname;
		$user_lname   = $acc_lname ;
		$user_mname   = $acc_mname;
		$user_username   = $acc_username ;
		$md5password = md5($acc_password);
    	$h_upass = sha1($md5password);
		$user_type 		= $acc_type ;
			
			

 mysql_query("INSERT INTO instructor(instructid,instructfname,instructlname,instructmname, instructgender, instructphone)VALUES('$user_idnum','$user_fname','$user_lname','$user_mname', '$acc_gender', '$acc_contact')");
 mysql_query("INSERT INTO useraccounts(ACCOUNT_ID,instructid,ACCOUNT_USERNAME,ACCOUNT_PASSWORD,ACCOUNT_TYPE,imagename,imagefile)VALUES('','$user_idnum','$user_username','$h_upass','$user_type','$name','$image')");

			 	message("New account created successfully!", "success");
			 	redirect('index.php?view=add');
			 	 
		}	 
	}




	}else{


			 	message("Username is already in used, pls try another username!", "error");
			 	redirect('index.php?view=add');
}


}else{


			 	message("ID number is already in used, pls try another ID!", "error");
			 	redirect('index.php?view=add');

}
}


}







function doInsertsched(){
		
if (isset($_POST['savesched'])){

	if ($_POST['sub'] == "Select Subject" OR $_POST['days'] == "Select Day" OR $_POST['hours'] == "" OR $_POST['yr'] == "Select Year & Section" ) {
		$messageStats = false;
		message("All field is required!","error");
		redirect('index.php?view=addsched');
	}else{
		

	  	$instruct     = $_GET['ids'];
		$subt  		  = $_POST['sub'];
		$days   	  = $_POST['days'];
		$hours  	  = $_POST['hours'];
		$yr   		  = $_POST['yr'];
		
		
 
		 

 mysql_query("INSERT INTO subschedule(subschedid,subtaughtid,day,hours,yearsection,instructid)VALUES('','$subt','$days','$hours','$yr','$instruct')");
  
			 	message("New schedule created successfully!", "success");
			 	redirect('index.php?view=viewsubjects&id='.$instruct);
			 	 
		
	}
}




elseif (isset($_POST['saveandnew'])){

		if ($_POST['sub'] == "Select Subject" OR $_POST['days'] == "Select Day" OR $_POST['hours'] == "" OR $_POST['yr'] == "Select Year & Section" ) {
		$messageStats = false;
		message("All field is required!","error");
		redirect('index.php?view=addsched');
	}else{
		

	  	$instruct     = $_GET['ids'];
		$subt  		  = $_POST['sub'];
		$days   	  = $_POST['days'];
		$hours  	  = $_POST['hours'];
		$yr   		  = $_POST['yr'];
		
		
 
		 

 mysql_query("INSERT INTO subschedule(subschedid,subtaughtid,day,hours,yearsection,instructid)VALUES('','$subt','$days','$hours','$yr','$instruct')");
  
			 	message("New schedule created successfully!", "success");
			 	redirect('index.php?view=addsched&id='.$instruct);
			 	 

		
	}
}

}





function doEdit(){
	if (isset($_POST['save'])){

		if ($_POST['name'] == "" OR $_POST['username'] == "" OR $_POST['pass'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{
			

			$user = new User();
			$acctid			= $_GET['id'];
			$acc_name		= $_POST['name'];
			$acc_username   = $_POST['username'];
			$acc_password 	= $_POST['pass'];
			$acc_type 		= $_POST['type'];
 

				$user->ACCOUNT_NAME = $acc_name;
				$user->ACCOUNT_USERNAME = $acc_username;
				$user->ACCOUNT_PASSWORD = sha1($acc_password);
				$user->ACCOUNT_TYPE = $acc_type;
				
				$user->update($acctid);
			 	message("New [". $acc_name ."] created successfully!", "success");
				redirect('index.php');
				
			
		}
	}
		
}

function delrecord(){

	$id = $_GET['tid'];
	mysql_query("DELETE FROM msexcel WHERE id = $id");

	message("Record has been successfully deleted!","success");
	redirect('index.php');
}




function doDelete(){
	
	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
if($key > 0){

	for($i=0;$i<$key;$i++){

	 	mysql_query("DELETE FROM msexcel WHERE id = ($id[$i])");
 
	}

	message("Record has been successfully deleted!","success");
	redirect('index.php');

}
else{
	message("Please select records to be deleted!","error");
	redirect('index.php');

}
}


 
?>