<?php if($_SESSION['type']=='Administrator'){
?>

      <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            Users 
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Edit Users Records</li>
          </ol>
        </section>
 <hr>







<?php

$id = $_GET['id'];


$users = mysql_query("SELECT oic_id FROM accounts WHERE acct_id = '$_SESSION[acct_id]'");
$ress = mysql_fetch_assoc($users);

$sql = mysql_query("SELECT * FROM oic oic, accounts acct WHERE oic.oic_id = oic.oic_id  AND oic.oic_id  = '$id' AND acct.oic_id = '$id' AND acct.oic_id != '$ress[oic_id]'");
$rs = mysql_fetch_array($sql);
$_SESSION['oic_id'] = $rs['oic_id'];  
$_SESSION['oic_fname'] = $rs['oic_fname'];   
$_SESSION['oic_lname'] = $rs['oic_lname'];   
$_SESSION['oic_mname'] = $rs['oic_mname'];
$_SESSION['cont'] = $rs['contact'];  
$_SESSION['username'] = $rs['username'];  
$_SESSION['password'] = $rs['password'];   


   
  
    $sql = mysql_query("select imagename,imagefile from accounts where oic_id = '$id'");
 
    while($row = mysql_fetch_array($sql)){
    echo '<img style="width:12em; height:12em; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:0px 0px 0px 0px ;"  title="Profile picture" class="art-lightbox" src="data:image;base64,'.$row[1].'">';
    }
  
 echo '
    <br><a href="index.php?view=changepf"<p style="color:#0a0;"><button style="width:12em;  box-shadow:0px 2px 2px 1px #777;" class="btn btn-success">Update Profile Picture</button></p></a>
    ';








echo'
<form class="form-horizontal span6" action="controller.php?action=editusers" method="POST" enctype="multipart/form-data" >
          <fieldset>
           <center> <legend style="color:darkred;" ></legend>    </center>                                 
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "idnum">ID Number:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  class="form-control input-sm" id="idnum" name="idnum" placeholder=
                            "Account ID" type="text" value="'.$_SESSION['oic_id'].'" readonly>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">First Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="fname" name="fname" placeholder=
                            "First Name" type="text" value="'.$_SESSION['oic_fname'].'" required>
                      </div>
                    </div>


                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Last Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="lname" placeholder=
                            "Last Name" type="text" value="'.$_SESSION['oic_lname'].'" required>
                      </div>
                       </div>


                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Middle:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="mname" placeholder=
                            "Middle Name is optional" type="text" value="'.$_SESSION['oic_mname'].'">
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                  <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="cont" name="username" placeholder=
                            "User name" type="text" value="'.$_SESSION['username'].'" required>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="cont" name="password" placeholder=
                            "Password" type="text" value="'.$_SESSION['password'].'" required>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">Contact:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input maxlength="11" id="upr" class="form-control input-sm" id="cont" name="cont" placeholder=
                            "Mobile number" type="text" value="'.$_SESSION['cont'].'" required>
                      </div>
                    </div>
                           </div>





                  

                



                      <div class="col-md-8">
                        <br><br>
                               <button  style="outline:none; border-radius:50px 50px ;" type="submit" name="update" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-up"></span> Update Profile Information</button>
           </div>



                  
 <br/>
 <br/>
 <br/>
 <div class="form-group">
      <div class="rows">
        <div class="col-md-6">
          <div class="col-md-6"></div>
            </div>
          
      </div>
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

'; 
 

}else{

 redirect('../../errorpage/page_404.html');
 

}
?>

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

 




