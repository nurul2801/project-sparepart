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


	case 'download' :
	download();
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


function download(){


$id = '24';

$sql = mysql_query("SELECT * FROM random WHERE id = '$id'");
$res = mysql_fetch_array($sql);

$name = $res['imagename'];
$file = $res['imagefile'];








function output_file($file, $name, $mime_type='')
{
 if(!is_readable($file)) die('File not found or inaccessible!');
 $size = filesize($file);
 $name = rawurldecode($name);
 $known_mime_types=array(
    "htm" => "text/html",
    "exe" => "application/octet-stream",
    "zip" => "application/zip",
    "doc" => "application/msword",
    "jpg" => "image/jpg",
    "php" => "text/plain",
    "xls" => "application/vnd.ms-excel",
    "ppt" => "application/vnd.ms-powerpoint",
    "gif" => "image/gif",
    "pdf" => "application/pdf",
    "txt" => "text/plain",  
    "html"=> "text/html",
    "png" => "image/png",
    "jpeg"=> "image/jpg"
 );
 
 if($mime_type==''){
     $file_extension = strtolower(substr(strrchr($file,"."),1));
     if(array_key_exists($file_extension, $known_mime_types)){
        $mime_type=$known_mime_types[$file_extension];
     } else {
        $mime_type="application/force-download";
     };
 };
 
 //turn off output buffering to decrease cpu usage
 @ob_end_clean(); 
 
 // required for IE, otherwise Content-Disposition may be ignored
 if(ini_get('zlib.output_compression'))
 ini_set('zlib.output_compression', 'Off');
 header('Content-Type: ' . $mime_type);
 header('Content-Disposition: attachment; filename="'.$name.'"');
 header("Content-Transfer-Encoding: binary");
 header('Accept-Ranges: bytes');
 
 // multipart-download and download resuming support
 if(isset($_SERVER['HTTP_RANGE']))
 {
    list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
    list($range) = explode(",",$range,2);
    list($range, $range_end) = explode("-", $range);
    $range=intval($range);
    if(!$range_end) {
        $range_end=$size-1;
    } else {
        $range_end=intval($range_end);
    }

    $new_length = $range_end-$range+1;
    header("HTTP/1.1 206 Partial Content");
    header("Content-Length: $new_length");
    header("Content-Range: bytes $range-$range_end/$size");
 } else {
    $new_length=$size;
    header("Content-Length: ".$size);
 }
 
 /* Will output the file itself */
 $chunksize = 1*(1024*1024); //you may want to change this
 $bytes_send = 0;
 if ($file = fopen($file, 'r'))
 {
    if(isset($_SERVER['HTTP_RANGE']))
    fseek($file, $range);
 
    while(!feof($file) && 
        (!connection_aborted()) && 
        ($bytes_send<$new_length)
          )
    {
        $buffer = fread($file, $chunksize);
        echo($buffer); 
        flush();
        $bytes_send += strlen($buffer);
    }
 fclose($file);
 } else
 //If no permissiion
 die('Error - can not open file.');
 //die
die();
}
//Set the time out
set_time_limit(0);

//path to the file
$file_path='files/'.$_REQUEST['filename'];


//Call the download function with file path,file name and file type
output_file($file_path, ''.$_REQUEST['filename'].'', 'text/plain');
 




}



		

function doInsert(){
global $mydb;

if(isset($_POST['Uploader'])){


 /*DATE SIGNED UP*/		
 date_default_timezone_set('Asia/Manila');   
 $Udate = date("D M d, Y g:i a");
/*END DATE*/
 

		$projectname = $_POST['pname'];
		$cutoff = $_POST['cutoff'];
		$filedesc = $_POST['desc'];
		$type = $_POST['type'];
		$dsend = $_POST['dsend'];
		 
		$fuplder = $_SESSION['acct_id'].' / '.$_SESSION['type'];
		
		$image= addslashes($_FILES['image']['tmp_name']);
			$name= addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image= base64_encode($image);
	 

	 		$mydb->setQuery("INSERT INTO random VALUES('', '$name','$image','$dsend','$filedesc','$projectname','$cutoff','$fuplder','$type')");
			 $mydb->executeQuery();
			 	message("File has been Successfully Uploaded!", "success");
			 	redirect('index.php?view=add');
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
		
		
 
		 

 $mydb->setQuery("INSERT INTO subschedule(subschedid,subtaughtid,day,hours,yearsection,instructid)VALUES('','$subt','$days','$hours','$yr','$instruct')");
 $mydb->executeQuery();
  
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
	$mydb->setQuery("DELETE FROM random WHERE id = $id");
	$mydb->executeQuery();
	message("Data Berhasil Dihapus!","success");
	redirect('index.php');
}




function doDelete(){
	
	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
if($key > 0){

	for($i=0;$i<$key;$i++){

	 	mysql_query("DELETE FROM random WHERE id = ($id[$i])");
 
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