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
	
	case 'editusers' :
	editusers();
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

	case 'deletesubject' :
	doDeletesubject();
	break;

	case 'deleteenrolled' :
	doDeleteenrolled();
	break;


	case 'editadmin' :
	editadmin();
	break;


	case 'deleteabsent' :
	doDeleteabsent();
	break;
	}




function editadmin(){
global $mydb;
if(isset($_POST['adminupdate'])){

	$idnum = $_POST['idnum'];
	$fn = $_POST['fname'];
	$ln = $_POST['lname'];
	$mn = $_POST['mname'];
	$phone = $_POST['cont'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

  				$dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);

	 $query = $conn->prepare("UPDATE oic SET oic_lname = '$ln', oic_fname = '$fn', oic_mname = '$mn', contact = '$phone' WHERE oic_id = '$idnum'");
	 $query->execute();

	 $query = $conn->prepare("UPDATE accounts SET username = '$username', password = '$password' WHERE oic_id = '$idnum'");
	 $query->execute();
 
	 message("User information was successfully updated!", "success");
	 redirect('index.php?view=edit&id='.$_SESSION['oic_id']);
 
}

}









function editusers(){
global $mydb;

if(isset($_POST['update'])){

	$idnum = $_POST['idnum'];
	$fn = $_POST['fname'];
	$ln = $_POST['lname'];
	$mn = $_POST['mname'];
	$phone = $_POST['cont'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);


$users = mysql_query("SELECT oic_id FROM accounts WHERE acct_id = '$_SESSION[acct_id]'");
$ress = mysql_fetch_assoc($users);

	mysql_query("UPDATE oic SET oic_lname = '$ln', oic_fname = '$fn', oic_mname = '$mn', contact = '$phone' WHERE oic_id = '$idnum'");
	mysql_query("UPDATE accounts SET username = '$username', password = '$password' WHERE oic_id = '$idnum'");

/*	mysql_query("UPDATE instructor SET instructfname = '$fn', instructlname = '$ln', instructmname = '$mn', instructgender = '$gender', instructphone = '$phone' WHERE instructid ='$idnum'");
*/	message("User information was successfully updated!", "success");
	redirect('../../index.php');
 
}

}






function doInsert(){

global $mydb;


		
if (isset($_POST['save'])){

 /*DATE SIGNED UP*/		
 date_default_timezone_set('Asia/Manila');   
 $signupdate = date("D M d, Y g:i a");
/*END DATE*/
             
	 
		$fname   = $_POST['fname'];
		$lname   = $_POST['lname'];
		$mname   = $_POST['mname'];
		$cont   = $_POST['cont'];
		$username   = $_POST['username'];
		$password 	= md5($_POST['pass']);
		$type 		= $_POST['type'];





if (!empty($_FILES['image']['name'])) {




		$image= addslashes($_FILES['image']['tmp_name']);
			$name= addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image= base64_encode($image);
	 

/*******************PDO QUERY***********************************************/ 
 				$oic = new oic();
 				$oic->oic_id = '';
 				$oic->oic_lname = $lname;
				$oic->oic_fname = $fname;
				$oic->oic_mname = $mname;
				$oic->contact = $cont;
 				$oic->create();


                $dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
	 
/*********************SELECT LAST INSERT ID*****************************/
			    $sql = 'SELECT MAX(oic_id) as maxid FROM oic';
			    $gid = $conn->query($sql);
				$gid->execute();
				$row= $gid->fetch(PDO::FETCH_ASSOC);	
				$userid = $row['maxid'];
/*******************END***********************************************/

 				$accounts = new accounts();
 				$accounts->acct_id = '';
 				$accounts->oic_id = $userid;
 				$accounts->username = $username;
				$accounts->password = $password;
				$accounts->type = $type;
				$accounts->imagename	 = $name;
			 	$accounts->imagefile = $image;
				$accounts->status = 'Offline';
				$accounts->signupdate = $signupdate;
 				$accounts->create();

 /*********************PDO END*****************************************/

			 	message("New account created successfully!", "success");
			 	redirect('index.php');
			





	}else{


			$name= 'default';
			$image= file_get_contents('../../defaultimage/defaultimage.jpg');
			$image= base64_encode($image);
				
		 


/*******************PDO QUERY***********************************************/ 
 				$oic = new oic();
 				$oic->oic_id = '';
 				$oic->oic_lname = $lname;
				$oic->oic_fname = $fname;
				$oic->oic_mname = $mname;
				$oic->contact = $cont;
 				$oic->create();


                $dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
	 
/*********************SELECT LAST INSERT ID*****************************/
			    $sql = 'SELECT MAX(oic_id) as maxid FROM oic';
			    $gid = $conn->query($sql);
				$gid->execute();
				$row= $gid->fetch(PDO::FETCH_ASSOC);	
				$userid = $row['maxid'];
/*******************END***********************************************/

 				$accounts = new accounts();
 				$accounts->acct_id = '';
 				$accounts->oic_id = $userid;
 				$accounts->username = $username;
				$accounts->password = $password;
				$accounts->type = $type;
				$accounts->imagename	 = $name;
			 	$accounts->imagefile = $image;
				$accounts->status = 'Offline';
				$accounts->signupdate = $signupdate;
 				$accounts->create();

 /*********************PDO END*****************************************/
 
			 	message("New account created successfully!", "success");
			 	redirect('index.php');
			
			 	 
		}
	}
 






elseif (isset($_POST['saveandadd'])){


/*DATE SIGNED UP*/		
 date_default_timezone_set('Asia/Manila');   
 $signupdate = date("D M d, Y g:i a");
/*END DATE*/
             
  
		$fname   = $_POST['fname'];
		$lname   = $_POST['lname'];
		$mname   = $_POST['mname'];
		$cont   = $_POST['cont'];
		$username   = $_POST['username'];
		$password 	= md5($_POST['pass']);
		$type 		= $_POST['type'];





if (!empty($_FILES['image']['name'])) {



		$image= addslashes($_FILES['image']['tmp_name']);
			$name= addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image= base64_encode($image);
	 

/*******************PDO QUERY***********************************************/ 
 				$oic = new oic();
 				$oic->oic_id = '';
 				$oic->oic_lname = $lname;
				$oic->oic_fname = $fname;
				$oic->oic_mname = $mname;
				$oic->contact = $cont;
 				$oic->create();


                $dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
	 
/*********************SELECT LAST INSERT ID*****************************/
			    $sql = 'SELECT MAX(oic_id) as maxid FROM oic';
			    $gid = $conn->query($sql);
				$gid->execute();
				$row= $gid->fetch(PDO::FETCH_ASSOC);	
				$userid = $row['maxid'];
/*******************END***********************************************/

 				$accounts = new accounts();
 				$accounts->acct_id = '';
 				$accounts->oic_id = $userid;
 				$accounts->username = $username;
				$accounts->password = $password;
				$accounts->type = $type;
				$accounts->imagename	 = $name;
			 	$accounts->imagefile = $image;
				$accounts->status = 'Offline';
				$accounts->signupdate = $signupdate;
 				$accounts->create();

 /*********************PDO END*****************************************/
 
			 	message("New account created successfully!", "success");
			 	redirect('index.php?view=add');
			



	}else{


			$name= 'default';
			$image= file_get_contents('../../defaultimage/defaultimage.jpg');
			$image= base64_encode($image);
				
		 

 
/*******************PDO QUERY***********************************************/ 
 				$oic = new oic();
 				$oic->oic_id = '';
 				$oic->oic_lname = $lname;
				$oic->oic_fname = $fname;
				$oic->oic_mname = $mname;
				$oic->contact = $cont;
 				$oic->create();


                $dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
	 
/*********************SELECT LAST INSERT ID*****************************/
			    $sql = 'SELECT MAX(oic_id) as maxid FROM oic';
			    $gid = $conn->query($sql);
				$gid->execute();
				$row= $gid->fetch(PDO::FETCH_ASSOC);	
				$userid = $row['maxid'];
/*******************END***********************************************/

 				$accounts = new accounts();
 				$accounts->acct_id = '';
 				$accounts->oic_id = $userid;
 				$accounts->username = $username;
				$accounts->password = $password;
				$accounts->type = $type;
				$accounts->imagename	 = $name;
			 	$accounts->imagefile = $image;
				$accounts->status = 'Offline';
				$accounts->signupdate = $signupdate;
 				$accounts->create();

 /*********************PDO END*****************************************/
 
			 	message("New account created successfully!", "success");
			 	redirect('index.php?view=add');
			
			 	 
		}
}


}







function doInsertsched(){
global $mydb;
		
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
global $mydb;
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
global $mydb;

	$id = $_GET['tid'];

/*NEW PDO QUERY*/

		$oic = new oic();
		$oic->delete($id);

		$accounts = new accounts();
		$accounts->delete($id);

		$contacts = new contacts();
		$contacts->delete($id);

 
/*/NEW PDO QUERY*/

	message("Record has been successfully deleted!","success");
	redirect('index.php');
}




function doDelete(){
global $mydb;
	
	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
if($key > 0){

	for($i=0;$i<$key;$i++){
 
/*		mysql_query("DELETE FROM oic WHERE oic_id = ($id[$i])");
 		mysql_query("DELETE FROM accounts WHERE oic_id = ($id[$i])");
 		mysql_query("DELETE FROM contacts WHERE oic_id = ($id[$i])");
*/

/*NEW PDO QUERY*/

		$oic = new oic();
		$oic->delete(($id[$i]));

		$accounts = new accounts();
		$accounts->delete(($id[$i]));

		$contacts = new contacts();
		$contacts->delete(($id[$i]));

 
/*/NEW PDO QUERY*/

	}

	message("Record has been successfully deleted!","success");
	redirect('index.php');

}
else{
	message("Please select records to be deleted!","error");
	redirect('index.php');

}
}





function doDeletesubject(){
global $mydb;
	
	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector


	 $instruct = $_GET['instruct'];

	
if($key > 0){

	for($i=0;$i<$key;$i++){
 
		mysql_query("DELETE FROM subschedule WHERE subschedid = ($id[$i]) AND instructid = '$instruct'");
 		//mysql_query("DELETE FROM enrolled WHERE instructid = ($id[$i])");

	}

	message("Schedule has been successfully deleted!","success");
	redirect('index.php?view=viewsubjects&id='.$instruct);

}
else{
	message("Please select records to be deleted!","info");
	redirect('index.php?view=viewsubjects&id='.$instruct);

}
}







function doDeleteenrolled(){
global $mydb;
	
	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector


	 $sched = $_GET['sched'];
	$instruct = $_GET['instruct'];
	
if($key > 0){

	for($i=0;$i<$key;$i++){
 
		 mysql_query("DELETE FROM enrolled WHERE  subschedid = '$sched' and studid = ($id[$i])");

	}

	message("Enrolled students was successfully deleted!","success");
	redirect('index.php?view=enrolled&xsub='.$sched.'&xsid='.$instruct);

}
else{
	message("Please select records to be deleted!","info");
	redirect('index.php?view=enrolled&xsub='.$sched.'&xsid='.$instruct);

}
}



function doAddSelected(){
global $mydb;
	
	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector


	 $sched = $_GET['sched'];
	$instruct = $_GET['instruct'];
	
if($key > 0){

	for($i=0;$i<$key;$i++){
 
		 mysql_query("INSERT INTO enrolled(studid, subschedid)VALUES('($id[$i])','$sched')");

	}

	message("Students was successfully added!","success");
	redirect('index.php?view=enrolled&xsub='.$sched.'&xsid='.$instruct);

}
else{
	message("Please select records to be added!","info");
	redirect('index.php?view=enrolled&xsub='.$sched.'&xsid='.$instruct);

}
}







function doDeleteabsent(){
global $mydb;
	
	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector


	 $studid = $_GET['studid'];
	 $schedid = $_GET['schedid'];
	 $studentid = $_GET['studentid'];
	 $studnetn = $_GET['studnetn'];
	 $instruct = $_GET['instruct'];
	
//if($key > 0){

	for($i=0;$i<$key;$i++){
 
		 mysql_query("DELETE FROM absences WHERE studid = ($id[$i]) and subschedid = '$schedid'");

	}

	message("Students absent was successfully deleted!","success");
	redirect('index.php?view=absent&sched='.$sched.'&id='.$studentid.'&fullname='.$studnetn.'&instruct='.$instruct);

//}
//else{
//	message("Please select records to be deleted!","info");
//	redirect('index.php?view=absent&sched='.$sched.'&id='.$studentid.'&fullname='.$studnetn.'&instruct='.$instruct);


//}
}

?>