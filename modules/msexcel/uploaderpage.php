

        <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            Upload MS Excel Files  
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Upload MS Excel File</li>
          </ol>
        </section>
 <hr>




<script>
      function countChar(val) {
      	var max = 40;
        var len = val.value.length;
        if (len >= max) {
          val.value = val.value.substring(0, 40);
          $('#charNum').text('You have reached the limit');
        } else {
          var char = max - len;
          $('#charNum').text(char + ' characters left');
        }
     };      
</script>

<script>
      function countChar1(val) {
      	var max = 90;
        var len = val.value.length;
        if (len >= max) {
          val.value = val.value.substring(0, 90);
          $('#charNum1').text('You have reached the limit');
        } else {
          var char = max - len;
          $('#charNum1').text(char + ' characters left');
        }
     };      
</script>
</head>

<body style="background-color: #D0D0D0;">

<div style="position:relative; width:1000px; margin:1em auto; padding:5px; background-color: #ffffff;" class="table-bordered">
	
 <div class="banner" style="width:100%;" >
 <div style="width:100%;  height:100px; margin:1px auto; background-color:rgb(36, 163, 20); background-image:url('banner/banner.png'); background-repeat: no-repeat;"></div>
  </div>	

<hr style="border-color: #d8d8d8;" />
 <div class="status" style="width:100%;" align="center">
        <?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo "<ul class='error'> ";
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li> <strong><font color="red">',$msg ,'</font></strong></li>'; 
		}echo "</ul>";
		unset($_SESSION['ERRMSG_ARR']);
	}
?> 
</div> 


<div style="width:100%; margin:5px;" align="center">
<form action="upload.php" method="post" enctype="multipart/form-data" name="upload" style="margin:5px;">

<label>File Name</label>
<input type="text" autofocus name="fname" class="form-control" placeholder="File Name" onkeyup='countChar(this)' autocomplete="false" required/><label id='charNum' style="color: blue;"></label><br />
<label> Description</label>
<textarea name="desc" rows="4" cols="100" class="input-xlarge" onkeyup='countChar1(this)' required></textarea><label id='charNum1' style="color: blue;"></label><br />
<label>File Uploader : </label>
<?php 
	echo '[ '.$_SESSION['acct_id'] .' / '. $_SESSION['type'].' ]';
?>
<br /><br />

<input name="uploaded_file" type="file" class="input-xlarge" required/>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<br /><br />

<button style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" class="btn btn-default" name="Upload"><i class="fa fa-upload"></i> Upload Choosen File</button>
</form>
</div>

 <br><br>
<center><div class="box box-danger" style="color:red;">Note: File will be uploaded only if the size is less than 350Kb!</div> </center>