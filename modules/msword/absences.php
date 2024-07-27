 




        <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            Students 
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"></li>View Absences
          </ol>
        </section>
 <br>

<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>




<?php

 $_SESSION['id'] = $_GET['id'];

  $sql = mysql_query("SELECT stud_id, stud_type, concat(`stud_lname`,', ',`stud_fname`,' ',`stud_mname`)as fullname FROM student WHERE stud_id = '$_SESSION[id]'");
  $row = mysql_fetch_assoc($sql);


                $query = mysql_query("SELECT * FROM sem_schoolyear");
                $rs = mysql_fetch_array($query);
             
                $sems = $rs['semester'];
                $sy = $rs['schoolyear']; 
    

 ?>



 
          <div class="box" style=" outline:none; border-radius:20px 20px 20px 20px ; border:transparent;">
                <div class="box-header">
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">



              <table > 

        <div style="text-align:center;font-size:x-large;border:0px;"><img src="../../images/ssg.png" style="width:64px; align:center;border:0px;"></div>
        <div style="text-align:center;font-size:x-large;">Republic of the Philippines</div>
        <div style="text-align:center;font-size:medium;">Palompon Institute of Technology</div>
        <div style="text-align:center;font-size:medium;">Palompon, Leyte</div> 
        <div style="text-align:center;font-size:x-large;">Student Attendance</div>
        <div style="text-align:center;font-size:small;"><?php echo $sems; ?>  S.Y. : <?php echo $sy; ?></div> <br>
            
<?php
echo "Student ID:<b> ".$row['stud_id']."</b><br/>";
echo "Student:<b> <span id='upr'>".$row['fullname']."</span></b><br/>";
echo "Type:<b> <span id='upr'>".$row['stud_type']."</span></b><br/>";
?>

                                        
               </table> 
                  
 
         
        
               <br>


               <form action="" method="POST">              
                <table class="table table-bordered table-striped"  >              
                  <thead>
                    <tr >

              <th> Date</th> 
              <th> Event Name</th> 
              <th> Login Time</th>
              <th> Logout Time</th>
             
                  </tr>
                  </thead>
                  <tbody>

          
             <?php
              $sql = mysql_query("SELECT e.eve_name, e.eve_date, e.semester, e.schoolyear, a.att_logintime, a.att_logouttime FROM event e, Attendance a, student s WHERE e.eve_id = a.eve_id AND s.stud_id = a.stud_id AND s.stud_id = '$_SESSION[id]' AND e.semester = '$sems' AND e.schoolyear = '$sy' ORDER BY e.eve_date DESC");
            
            while ($row = mysql_fetch_assoc($sql)) {


              $login1  = DATE("g:i a", STRTOTIME($row['att_logintime']));
              $logout1  = DATE("g:i a", STRTOTIME($row['att_logouttime']));
              


              echo '<tr style="background:white;">';
    

              echo '<td width="20%">'.$row['eve_date'].'</td>';
           
              echo '<td width="20%">'.$row['eve_name'].'</td>';

              if($row['att_logintime'] == '00:00:00'){
              echo '<td style="color:red;">X</td>';
            }else{
              echo '<td>'.$login1.'</td>';
            }



              if($row['att_logouttime'] == '00:00:00'){
              echo '<td style="color:red;">X</td>';
            }else{
              echo '<td>'.$logout1.'</td>';
            }

            echo '</tr>';
            } 
            ?>
                  </tbody>
                


                </table>
  
 

            <div class="btn-group" id="divButtons" name="divButtons">
        
            <input  style="background:#0a0;color:white; outline:none; border-radius:50px 50px ;"  type="button"  value="Print or Save as PDF" id="print_btn" onclick="print()" class="btn btn-default">
  
            </div>
          </form>

                   
                
                        </div>
                        </div>

  

 
   
 




        <style>
@media print {
.s {display:none;} #no {display:none;} #logout {display:none;} #account {display:none;} #pagetitle {display:none;}   #print_btn {display:none;} #search {display:none;} #refresh {display:none;} #sliderpic {display:none;} #menu {display:none;} #truancy1 {display:none;} #truancy2 {display:none;} #head {display:none;} #userinfo1 {display:none;} #userinfo2 {display:none;} #infotech1 {display:none;} #rw {display:none;}  #new {display:none;} #buttons {display:none;} #but {display:none;} #hd1 {display:none;} #hd2 {display:none;} #ft {display:none;} #foot {display:none;} #htt {display:none;}  #updatedel {display:none;}   #drp {display:none;} 

}
</style>                      
    
 
 