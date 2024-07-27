   
  <meta name="description" content="A lightweight, customizable jQuery timepicker plugin inspired by Google Calendar. Add a user-friendly javascript timepicker dropdown to your app in minutes." />
  <script type="text/javascript" src="jquery.min.js"></script>

  <script type="text/javascript" src="jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />

  <script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" />

  <script type="text/javascript" src="lib/site.js"></script>
  

        

            <script>
                $(function() {
                    $('#setTimeExample1').timepicker();
                    $('#setTimeButton').on('click', function (){
                        $('#setTimeExample').timepicker('setTime', new Date());
                    });

                       $('#setTimeExample2').timepicker();
                    $('#setTimeButton').on('click', function (){
                        $('#setTimeExample').timepicker('setTime', new Date());
                    });

                       $('#setTimeExample3').timepicker();
                    $('#setTimeButton').on('click', function (){
                        $('#setTimeExample').timepicker('setTime', new Date());
                    });

                       $('#setTimeExample4').timepicker();
                    $('#setTimeButton').on('click', function (){
                        $('#setTimeExample').timepicker('setTime', new Date());
                    });
                });
            </script>



        <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            Events 
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Add New Events</li>
          </ol>
        </section>
 <hr>


   


            <form class="form-horizontal span6" action="#" method="POST" enctype="multipart/form-data">

            

          <fieldset>
                     
                  
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "idnum">Event Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  class="form-control input-sm" id="evename" name="evename" placeholder=
                            "Event Name" type="text" value="" required>
                      </div>
                    </div>
             

                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">Date:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="evedate" name="evedate" type="date" value="" required>
                      </div>
                    </div>
                    </div>





                  <div class="form-group">
                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Login Start:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  maxlength="4" class="form-control input-sm" id="setTimeExample1" name="login2" placeholder=
                            "Login End Time" type="text" value="">
                      </div>
                       </div>


                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Login End:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  maxlength="4" class="form-control input-sm" id="setTimeExample2" name="login2" placeholder=
                            "Login End Time" type="text" value="">
                      </div>
                    </div>

            

                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "username">Logout Start:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="setTimeExample3" name="logout1" placeholder="Logout Start Time" type="text" value="" required>
                      </div>
                    </div>
                    </div>

                 
      
                  <div class="form-group">                   
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "pass">Logout End:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="setTimeExample4" name="logout2" placeholder="Logout End Time" type="text" value="" required>
                      </div>
                    </div>
                
                
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for="gender">Semester:</label>

                      <div class="col-md-8">
                         <select class="form-control input-sm" name="sem" id="sem">
                       <option>Select Semester</option>
                          <option value="1st Sem">First Semester</option>
                          <option value="2nd Sem">Second Semester</option>
                  
                        </select> 
                      </div>
                    </div>

            <div class="col-md-4">
                    <label class="col-md-4 control-label" for="gender">School Year:</label>

                      <div class="col-md-8">
                         <select class="form-control input-sm" name="gender" id="gender">
                       <option>Select School Year</option>
          <?php
        date_default_timezone_set('Asia/Manila');
        $date = date('Y'); 
         
        for($i=0; $i<10; $i++){
          echo '<option value="'.$date .'-'.($date+1).'">'.$date .'-'.($date+1).'</option>';
          $date--;
        }
      ?>
                  
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



  
  
  $en = $_POST['en'];
  $dates = $_POST['dates'];
  $login1 = $_POST['login1'];
  $login2 = $_POST['login2'];
  $logout1 = $_POST['logout1'];
  $logout2 = $_POST['logout2'];
  $sem = $_POST['sem'];
  $yr = $_POST['sy'];


  $nlogin1 = DATE("H:i", STRTOTIME($login1));
  $nlogin2 = DATE("H:i", STRTOTIME($login2));
  $nlogout1 = DATE("H:i", STRTOTIME($logout1));
  $nlogout2 = DATE("H:i", STRTOTIME($logout2));




  $auth = mysql_query("SELECT eve_date FROM event WHERE eve_date = '$dates'");
  $authme = mysql_fetch_array($auth);
  
   
  if($authme['eve_date'] == ""){
  
  
   
    mysql_query("INSERT INTO `event`(`eve_id`, `eve_name`, `eve_date`, `eve_loginstarttime`, `eve_loginendtime`, `eve_logoutstarttime`, `eve_logoutendtime`,`semester`,`schoolyear`) VALUES ('','$en','$dates', '$nlogin1','$nlogin2','$nlogout1','$nlogout2','$sem','$yr')");
     


    /****************new logic*************************************/
    $sqq1 = mysql_query("SELECT MAX(eve_id) AS idd FROM event");
    $res = mysql_fetch_array($sqq1);
    $maxeveid = $res['idd'];
    $sqq = mysql_query("SELECT stud_id FROM student");

    while ($row = mysql_fetch_assoc($sqq)){
        
        $id = $row['stud_id'];
        mysql_query("INSERT INTO `attendance`(`att_id`, `eve_id`, `stud_id`, `att_logintime`, `att_logouttime`) VALUES ('','$maxeveid','$id', '00:00:00','00:00:00')");
     
    }

     

    /**************************************************************/


    echo '<meta http-equiv="Refresh" content="1">';
    echo'
      <script>
      alert("New Record Successfully added!");
      </script>
    ';
   }else{
    

    mysql_query("INSERT INTO `event`(`eve_id`, `eve_name`, `eve_date`, `eve_loginstarttime`, `eve_loginendtime`, `eve_logoutstarttime`, `eve_logoutendtime`,`semester`,`schoolyear`) VALUES ('','$en','$dates', '$login1','$login2','$logout1','$logout2','$sem','$yr')");
     







    /****************new logic*************************************/
    $sqq1 = mysql_query("SELECT MAX(eve_id) AS idd FROM event");
    $res = mysql_fetch_array($sqq1);
    $maxeveid = $res['idd'];
    $sqq = mysql_query("SELECT stud_id FROM student");

    while ($row = mysql_fetch_assoc($sqq)){
        
        $id = $row['stud_id'];
        mysql_query("INSERT INTO `attendance`(`att_id`, `eve_id`, `stud_id`, `att_logintime`, `att_logouttime`) VALUES ('','$maxeveid','$id', '00:00:00','00:00:00')");
     
    }

     

    /**************************************************************/




    echo '<meta http-equiv="Refresh" content="1">';
    echo'
      <script>
      alert("New Record Successfully added!");
      </script>
    ';
   }

}
?>

<!-- 
  message("Record has been successfully added!","success");
  redirect('index.php?view=add');

 
    -->