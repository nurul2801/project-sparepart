
       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Users 
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php?view=edit&id=<?php echo $_SESSION['oic_id']; ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Update User Profile</li>
          </ol>
        </section>
        <hr>
  


<?php
if(isset($_POST['uploadf'])){
	
	if(getimagesize($_FILES['image']['tmp_name'])== FALSE)
	{
	echo "Please select an image";
	}
	else
	{
		$image= addslashes($_FILES['image']['tmp_name']);
		$name= addslashes($_FILES['image']['name']);
		$image= file_get_contents($image);
		$image= base64_encode($image);



	 $query = $conn->prepare("UPDATE `accounts` SET `imagename`='$name',`imagefile`='$image' where oic_id = '$_SESSION[oic_id]'");
	 $query->execute();
 
			message("Profile picture was successfully upadated!", "success");
			redirect('index.php?view=edit&id='.$_SESSION['oic_id']);
	}
}
?>

		



<script>
  $('#settings').addClass('active');
</script>





<br>
 


<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon"/>

 

 
<center>
  
                <br>
 
<form enctype="multipart/form-data" style="outline:none; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ; border: solid #000; width:600px; padding:20px;" method="post">
 
                  
                        <h3 align="left" style="color:darkred;"><center>Update Profile Picture</center></h3>
                        <br>
                       
<?php  
 
	displayimages();
	function displayimages()
	{		

                $dbhost = "localhost";
                $dbname = "rcmgdb";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
                
			$query = $conn->prepare("SELECT imagename,imagefile from accounts where oic_id = '$_SESSION[oic_id]'");
			$query->execute();
			$res = $query->fetchall();


			foreach($res as $row) {
	 
				echo '<img style="width:12em; height:12em; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:0px 0px 0px 0px ;"  title="Profile picture" class="art-lightbox" src="data:image;base64,'.$row[1].'">';
		}
	}
?>
                        <br><br>
                        <input type="file" class="form-control" type="file" name="image"  id="file" required/><br/>
                         <button  style="outline:none; border-radius:50px 50px ;" type="submit" name="uploadf" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-up"></span> Update Profile Picture</button>
           
                    </form>
 
  
 

</center>
 






 






	  
	  

