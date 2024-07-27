<?php if($_SESSION['type']=='Administrator'){?>


        <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            Students 
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Edit Students Record</li>
          </ol>
        </section>
 <hr>


<?php

$id = $_GET['id'];

$sql1 = mysql_query("SELECT * FROM student WHERE stud_id = '$id'");
$rs1 = mysql_fetch_array($sql1);

$sql2 = mysql_query("SELECT * FROM accounts WHERE stud_id = '$id'");
$rs2 = mysql_fetch_array($sql2);

?>




            <form class="form-horizontal span6" action="#" method="POST" enctype="multipart/form-data">

          <fieldset>
                     
                  
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "idnum">ID Number:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  class="form-control input-sm" id="studid" name="studid" placeholder=
                            "Account ID" type="text" value="<?php echo $rs1['stud_id']; ?>" readonly>
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
                            "First Name" type="text" value="<?php echo $rs1['stud_fname']; ?>" required>
                      </div>
                    </div>


                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Last Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="ln" placeholder=
                            "Last Name" type="text" value="<?php echo $rs1['stud_lname']; ?>" required>
                      </div>
                       </div>


                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Middle:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="mn" placeholder=
                            "Optional" type="text" value="<?php echo $rs1['stud_mname']; ?>">
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "username">User Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="username" name="username" placeholder="User Name" type="text" value="<?php echo $rs2['username']; ?>" required>
                      </div>
                    </div>
                 
                   
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder="Account Password" type="Password" value="<?php echo $rs2['password']; ?>" required>
                      </div>
                    </div>
                
               
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for="gender">Gender:</label>

                      <div class="col-md-8">
                         <select class="form-control input-sm" name="gender" id="gender" required>
                       <option><?php echo $rs1['sex']; ?></option>
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
                      "Instructors phone number" type="text" value="<?php echo $rs1['contact']; ?>" required>
                      </div>
                  </div>

                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for="gender">Year Level:</label>
                      <div class="col-md-8">
                        <select class="form-control input-sm" name="yr" id="yr" required>
                          <option><?php echo $rs1['stud_year']; ?></option>
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
                         <select class="form-control input-sm" name="course" id="course" required>
                       <option><?php echo $rs1['stud_course']; ?></option>
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

                  <div class="form-group">
                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "cp">Student Type:</label>
                      <div class="col-md-8">
                      <input name="deptid" type="hidden" value="">
                      <input type="text" id="upr" class="form-control input-sm" id="stype" name="stype" placeholder=
                      "Student Type" type="text" value="<?php echo $rs1['stud_type']; ?>">
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

 <!--                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "image">Profile Pic:</label>

                      <div class="col-md-8">
                      
  <input type="file" style="outline:none; font-size:19px; height:28.5px;  border: 1px solid #765942;border-radius: 10px; background:red; color:white;" name="image" /><br/>
 
                      </div>
                    </div>
                  </div> -->

          <br>
          <div class="pull-right">
          <button style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" name="update" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Update Profile</button>
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



 }else{

 redirect('../../errorpage/page_404.html');
 

}
?>
 








<?php
  if(isset($_POST['update'])){

 

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
          $stype = $_POST['stype'];
          
    
          $upass = md5($pass);
          
          mysql_query("UPDATE accounts SET username = '$un', password = '$upass' WHERE stud_id = '$stud_id'");
          mysql_query("UPDATE student SET stud_lname = '$ln', stud_fname = '$fn', stud_mname = '$mi', sex = '$sex', contact = '$cont', stud_course = '$course', stud_year = '$yr', stud_type = '$stype' WHERE stud_id = '$stud_id'");

  message("Record has been successfully updated!","success");
  redirect('index.php');

 
}

?>


 
