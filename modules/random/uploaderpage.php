

        <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
              
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tambah Alat Sparepart IT</li>
          </ol>
        </section>
 <hr>




<script>
      function countChar(val) {
      	var max = 50;
        var len = val.value.length;
        if (len >= max) {
          val.value = val.value.substring(0, 50);
          $('#charNum').text('You have reached the limit');
        } else {
          var char = max - len;
          $('#charNum').text(char + ' characters left');
        }
     };      
</script>

<script>
      function countChar0(val) {
        var max = 40;
        var len = val.value.length;
        if (len >= max) {
          val.value = val.value.substring(0, 40);
          $('#charNum0').text('You have reached the limit');
        } else {
          var char = max - len;
          $('#charNum0').text(char + ' characters left');
        }
     };      
</script>


<script>
      function countChar1(val) {
      	var max = 40;
        var len = val.value.length;
        if (len >= max) {
          val.value = val.value.substring(0, 40);
          $('#charNum1').text('You have reached the limit');
        } else {
          var char = max - len;
          $('#charNum1').text(char + ' characters left');
        }
     };      
</script>

<script>
      function countChar2(val) {
        var max = 20;
        var len = val.value.length;
        if (len >= max) {
          val.value = val.value.substring(0, 20);
          $('#charNum2').text('You have reached the limit');
        } else {
          var char = max - len;
          $('#charNum2').text(char + ' characters left');
        }
     };      
</script>

<script>
      function countChar3(val) {
        var max = 100;
        var len = val.value.length;
        if (len >= max) {
          val.value = val.value.substring(0, 70);
          $('#charNum3').text('You have reached the limit');
        } else {
          var char = max - len;
          $('#charNum3').text(char + ' characters left');
        }
     };      
</script>

</head>



<div  align="center">
  <form class="form-horizontal span6" action="upload.php" method="POST" enctype="multipart/form-data">
<!-- <form action="controller.php?action=add" method="post" enctype="multipart/form-data" name="upload" style="margin:5px;"> -->

  <fieldset>
                  <div class="form-group">
                    <div class="col-md-6">
                      <label class="col-md-4 control-label">Nama Barang:</label>

                      <div class="col-md-10">
                        <input  name="pname" type="hidden" value="">
                         <input autofucos id="upr" class="form-control input-sm" name="pname" placeholder=
                            "Nama Barang" type="text" onkeyup='countChar(this)' autocomplete="false" required><label id='charNum' style="color: blue;"></label> <br/>
                      </div>
                    </div>



                     <div class="col-md-6">
                      <label class="col-md-4 control-label">Yang Mengajukan:</label>

                      <div class="col-md-10">
                        <input name="cutoff" type="hidden" value="">
                         <input id="upr" class="form-control input-sm"  name="cutoff" placeholder=
                            "Yang Mengajukan" type="text" onkeyup='countChar0(this)' autocomplete="false" required><label id='charNum0' style="color: blue;"></label><br/>
                      </div>
                    </div>
                    </div>
                    


                  <div class="form-group">
                    <div class="col-md-6">
                      <label class="col-md-4 control-label">Type:</label>

                      <div class="col-md-10">
                        <input name="projectname" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" name="type" placeholder=
                            "Type" type="text" onkeyup='countChar1(this)' autocomplete="false" required><label id='charNum1' style="color: blue;"></label> <br/>
                      </div>
                    </div>

                    

                     <div class="form-group">
                    <div class="col-md-6">
                      <label class="col-md-4 control-label">Tanggal Pengajuan:</label>

                      <div class="col-md-10">
                        <input name="projectname" type="hidden" value="">
                         <input type="date" id="upr" class="form-control input-sm" name="dsend" placeholder=
                            "Date Send" type="text" onkeyup='countChar2(this)' autocomplete="false" required><label id='charNum2' style="color: blue;"></label> <br/>
                      
                        
                      </div>
                    </div>

                    </div>
                    


           <div class="col-md-6">
          <label class="col-md-4 control-label">Deskripsi:</label>
          <div class="col-md-10">                     
        <textarea name="desc" rows="4" cols="100" class="input-xlarge" onkeyup='countChar3(this)' required></textarea><label id='charNum3' style="color: blue;"></label><br />
          </div>
            </div>
              </div>



           <div class="col-md-6">
          <label class="col-md-4 control-label">Upload File :</label>
          <div class="col-md-10" </label>
<?php 
  echo '[ '.$_SESSION['acct_id'] .' / '. $_SESSION['type'].' ]';
?>  
<br /><br />
           </div>
           </div>



           <div class="col-md-6">
          <div class="col-md-10" </label>

<input name="uploaded_file" type="file" class="input-xlarge" required/>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<br /><br />
           </div>
           </div> 
 

 <br><br> <br><br>
           <div class="col-md-6">
          <div class="col-md-10" </label>

<button style="background:#F2F1EB;color:black; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" class="btn btn-default" name="Uploader"><i class="fa fa-upload"></i> Upload Chosen File</button>
 
      </div>
    </div>
</fieldset>



 <br><br> <br><br>
 <br><br><center><div class="box box-danger" style="color:black;">Catatan: File hanya akan diunggah jika ukurannya kurang dari 350Kb!</div> </center>


</form>
</div>

<!-- <hr style="border-color: #d8d8d8;" />
 -->
