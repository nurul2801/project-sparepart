

        <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            Students 
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Add New Students</li>
          </ol>
        </section>
 <hr>

 
 


            <form name="uf"  class="form-horizontal span6" action="#" method="POST" enctype="multipart/form-data">

          <fieldset>
                     
                  
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "idnum">ID Number:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  class="form-control input-sm" id="studid" name="studid" placeholder=
                            "Account ID" type="text" value="" required>
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">First Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="fname" name="fn" placeholder=
                            "First Name" type="text" value="" required>
                      </div>
                    </div>


                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Last Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="ln" placeholder=
                            "Last Name" type="text" value="" required>
                      </div>
                       </div>


                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Middle:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="mn" placeholder=
                            "Optional" type="text" value="">
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "username">User Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="username" name="username" placeholder="User Name" type="text" value="" required>
                      </div>
                    </div>
                 
                   
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder="Account Password" type="Password" value="" required>
                      </div>
                    </div>
                
               
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for="gender">Gender:</label>

                      <div class="col-md-8">
                         <select class="form-control input-sm" name="gender" id="gender">
                       <option>Select Gender</option>
                          <option value="M">Male</option>
                          <option value="F">Female</option>
                  
                        </select> 
                      </div>
                    </div>
                    </div>



                  <div class="form-group">
                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "cp">Contact:</label>
                      <div class="col-md-8">
                      <input name="deptid" type="hidden" value="">
                      <input type="number" id="upr" class="form-control input-sm" id="cp" name="cp" placeholder=
                      "Instructors phone number" type="text" value="" required>
                      </div>
                  </div>

                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for="gender">Year Level:</label>
                      <div class="col-md-8">
                        <select class="form-control input-sm" name="yr" id="yr">
                          <option>Select Year Level</option>
                          <option>I</option>
                          <option>II</option>
                          <option>III</option>
                          <option>IV</option>
                          <option>V</option>
                        </select> 
                      </div>
                    </div>

                      <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "gender">Course:</label>

                      <div class="col-md-8">
                         <select class="form-control input-sm" name="course" id="course">
                       <option>Select Course</option>
                          <option>BSInfo.Tech</option>
                          <option>BSIT</option>
                          <option>BSME</option>
                          <option>BSIEng</option>
                          <option>BSEE</option> 
                          <option>ABComm</option>
                          <option>BSSM</option>
                          <option>BSHRM</option>
                          <option>BEED</option>
                          <option>BSED</option>
                          <option>BSHTE</option>
                          <option>BSMarE</option>
                          <option>BSMT</option>
                        </select> 
                      </div>
                    </div>
                   </div>

<style>
#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
 


input {
    border: none;
    overflow: auto;
    outline: none;
COLOR:BLACK;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
</style>

                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "image">Profile Pic:</label>

                      <div class="col-md-8">
                      
  <input type="file" style="outline:none; font-size:19px; height:28.5px;  border: 1px solid #765942;border-radius: 10px; background:red; color:white;" name="image" required/><br/>
 
                      </div>
                    </div>
                  </div>

          <br>
          <div class="pull-right">
          <button style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" name="add" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
             <button style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" name="addnew" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save and Add New</button>
              </div>
     
            

              
          </fieldset> 

        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                    </div>
                  </div>
                  <div class="col-md-6" align="right">
          
                   </div>
                 </div>
              </div>
          
        </form>
      
  

 
 











<?php
  if(isset($_POST['add'])){



  $auth = mysql_query("SELECT stud_id FROM student WHERE stud_id = '$_POST[studid]'");
  $authme = mysql_fetch_array($auth);



  $auth2 = mysql_query("SELECT username FROM accounts WHERE username = '$_POST[username]'");
  $authme2 = mysql_fetch_array($auth2);
  
   
  if($authme['stud_id'] <> ""){



    // echo '<meta http-equiv="Refresh" content="0">';
    // echo'
    //   <script>
    //     alert("ID is already in used, Please choose another id #");
    //   </script>
    // ';

  message("ID is already in used, Please choose another id #!","error");
  redirect('index.php?view=add');
  
  }else{



    if($authme2['username'] <> ""){


    // echo '<meta http-equiv="Refresh" content="0">';
    // echo'
    //   <script>
    //     alert("Username is already in used, Please choose another username");
    //   </script>
    // ';


  message("Username is already in used, Please choose another username!","error");
  redirect('index.php?view=add');

  }else{

  
       
    function upload(){
      /*** check if a file was uploaded ***/
      if(is_uploaded_file($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name']) != false){
        /***  get the image info. ***/
        $size = getimagesize($_FILES['image']['tmp_name']);
        /*** assign our variables ***/
        $type = $size['mime'];
        $imgfp = fopen($_FILES['image']['tmp_name'], 'rb');
        $size = $size[3];
        $name = $_FILES['image']['name'];
        $maxsize = 99999999;

        /***  check the file is less than the maximum file size ***/
        if($_FILES['image']['size'] < $maxsize ){
          
          /*** connect to db ***/
          $dbh = new PDO("mysql:host=localhost;dbname=saams", 'root', '');

          /*** set the error mode ***/
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stud_id = $_POST['studid'];
          $fn = $_POST['fn'];
          $ln = $_POST['ln'];
          $mi = $_POST['mn'];
          $sex = $_POST['gender'];
          $cont = $_POST['cp'];
          $course = $_POST['course'];
          $yr = $_POST['yr'];
          $un = $_POST['username'];
          $pass = $_POST['pass'];
          $oic_id = '0';
          $type = 'Student';
          
    
          $upass = md5($pass);
          
          /*** our sql query for saving the new account record ***/
          $stmt = $dbh->prepare("INSERT INTO `accounts`(`oic_id`, `stud_id`, `username`, `password`, `type`, `imagename`, `imagefile`) VALUES (?, ?, ?, ?, ?, ?, ?)");
          
          /*** bind the params ***/
          $stmt->bindParam(1, $oic_id);
          $stmt->bindParam(2, $stud_id);
          $stmt->bindParam(3, $un);
          $stmt->bindParam(4, $upass);
          $stmt->bindParam(5, $type);
          $stmt->bindParam(6, $name);
          $stmt->bindParam(7, $imgfp, PDO::PARAM_LOB);
          
          /*** execute the query ***/
          $stmt->execute();
      
          /*** our sql query for saving the new student record ***/
          $stmt = $dbh->prepare("INSERT INTO `student`(`stud_id`, `stud_lname`, `stud_fname`, `stud_mname`, `sex`, `contact`, `stud_course`, `stud_year`,`barcodeid`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
          /*** bind the params ***/
          $stmt->bindParam(1, $stud_id);
          $stmt->bindParam(2, $ln);
          $stmt->bindParam(3, $fn);
          $stmt->bindParam(4, $mi);
          $stmt->bindParam(5, $sex);
          $stmt->bindParam(6, $cont);
          $stmt->bindParam(7, $course);
          $stmt->bindParam(8, $yr);
          $stmt->bindParam(9, $stud_id);
          
          /*** execute the query ***/
          $stmt->execute();
          
        }else{
          /*** throw an exception if image is not of type ***/
          throw new Exception("File Size Error");
        }
      }else{
        // if the file is not less than the maximum allowed, print an error
        throw new Exception("Unsupported Image Format!");
      }
    }
  
    /*** check if a file was submitted ***/
    if(!isset($_FILES['image'])){
      echo '<p>Please select a file</p>';
    }else{
      try{
        upload();
        //echo '<p>New student record successfully added.</p>';
      }
      catch(Exception $e){
        echo '<h4>'.$e->getMessage().'</h4>';
      }
    }
    
    // echo '<meta http-equiv="Refresh" content="0">';
    // echo'
    //   <script>
    //     alert("New Record Successfully added!");
    //   </script>
    // ';


  message("Record has been successfully added!","success");
  redirect('index.php');

    }
  }
  









  }elseif(isset($_POST['addnew'])){



  $auth = mysql_query("SELECT stud_id FROM student WHERE stud_id = '$_POST[studid]'");
  $authme = mysql_fetch_array($auth);



  $auth2 = mysql_query("SELECT username FROM accounts WHERE username = '$_POST[username]'");
  $authme2 = mysql_fetch_array($auth2);
  
   
  if($authme['stud_id'] <> ""){



    // echo '<meta http-equiv="Refresh" content="0">';
    // echo'
    //   <script>
    //     alert("ID is already in used, Please choose another id #");
    //   </script>
    // ';
  
  message("ID is already in used, Please choose another id #!","error");
  redirect('index.php?view=add');

  }else{



    if($authme2['username'] <> ""){


    // echo '<meta http-equiv="Refresh" content="0">';
    // echo'
    //   <script>
    //     alert("Username is already in used, Please choose another username");
    //   </script>
    // ';



  message("Username is already in used, Please choose another username!","error");
  redirect('index.php?view=add');

  }else{

  
       
    function upload(){
      /*** check if a file was uploaded ***/
      if(is_uploaded_file($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name']) != false){
        /***  get the image info. ***/
        $size = getimagesize($_FILES['image']['tmp_name']);
        /*** assign our variables ***/
        $type = $size['mime'];
        $imgfp = fopen($_FILES['image']['tmp_name'], 'rb');
        $size = $size[3];
        $name = $_FILES['image']['name'];
        $maxsize = 99999999;

        /***  check the file is less than the maximum file size ***/
        if($_FILES['image']['size'] < $maxsize ){
          
          /*** connect to db ***/
          $dbh = new PDO("mysql:host=localhost;dbname=saams", 'root', '');

          /*** set the error mode ***/
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stud_id = $_POST['studid'];
          $fn = $_POST['fn'];
          $ln = $_POST['ln'];
          $mi = $_POST['mn'];
          $sex = $_POST['gender'];
          $cont = $_POST['cp'];
          $course = $_POST['course'];
          $yr = $_POST['yr'];
          $un = $_POST['username'];
          $pass = $_POST['pass'];
          $oic_id = '0';
          $type = 'Student';
          
    
          $upass = md5($pass);
          
          /*** our sql query for saving the new account record ***/
          $stmt = $dbh->prepare("INSERT INTO `accounts`(`oic_id`, `stud_id`, `username`, `password`, `type`, `imagename`, `imagefile`) VALUES (?, ?, ?, ?, ?, ?, ?)");
          
          /*** bind the params ***/
          $stmt->bindParam(1, $oic_id);
          $stmt->bindParam(2, $stud_id);
          $stmt->bindParam(3, $un);
          $stmt->bindParam(4, $upass);
          $stmt->bindParam(5, $type);
          $stmt->bindParam(6, $name);
          $stmt->bindParam(7, $imgfp, PDO::PARAM_LOB);
          
          /*** execute the query ***/
          $stmt->execute();
      
          /*** our sql query for saving the new student record ***/
          $stmt = $dbh->prepare("INSERT INTO `student`(`stud_id`, `stud_lname`, `stud_fname`, `stud_mname`, `sex`, `contact`, `stud_course`, `stud_year`,`barcodeid`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
          /*** bind the params ***/
          $stmt->bindParam(1, $stud_id);
          $stmt->bindParam(2, $ln);
          $stmt->bindParam(3, $fn);
          $stmt->bindParam(4, $mi);
          $stmt->bindParam(5, $sex);
          $stmt->bindParam(6, $cont);
          $stmt->bindParam(7, $course);
          $stmt->bindParam(8, $yr);
          $stmt->bindParam(9, $stud_id);
          
          /*** execute the query ***/
          $stmt->execute();
          
        }else{
          /*** throw an exception if image is not of type ***/
          throw new Exception("File Size Error");
        }
      }else{
        // if the file is not less than the maximum allowed, print an error
        throw new Exception("Unsupported Image Format!");
      }
    }
  
    /*** check if a file was submitted ***/
    if(!isset($_FILES['image'])){
      echo '<p>Please select a file</p>';
    }else{
      try{
        upload();
        //echo '<p>New student record successfully added.</p>';
      }
      catch(Exception $e){
        echo '<h4>'.$e->getMessage().'</h4>';
      }
    }
    
    // echo '<meta http-equiv="Refresh" content="0">';
    // echo'
    //   <script>
    //     alert("New Record Successfully added!");
    //   </script>
    // ';


  message("Record has been successfully added!","success");
  redirect('index.php?view=add');

    }
  }
  

  }
 


?>
