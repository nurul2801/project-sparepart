
 

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           
         
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Daftar Pengguna</li>
          </ol>
        </section>
        <hr>
  




          <div class="row">
            <div class="col-xs-12">
          

              <div class="box" style=" outline:none; border-radius:20px 20px 20px 20px ; border:transparent;">
                <div class="box-header">
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">

                  <?php if($_SESSION['type']=='Administrator'){?>


                  <form action="controller.php?action=delete" Method="POST">  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr style="background:orange;">
                        <th><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> User ID</th>
                        <th>Users</th>
                  
                        <th><center> Actions </center></th>
                      </tr>
                    </thead>
                    <tbody>




<!-- NEW PDO QUERY -->


<?php

 
                $dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
   
/*********************PDO QUERY*****************************/
                $sql = "SELECT oic_id FROM accounts WHERE acct_id = '$_SESSION[acct_id]'";
                $gid = $conn->query($sql);
                $gid->execute();
                $row= $gid->fetch(PDO::FETCH_ASSOC);  
                $oic_id = $row['oic_id'];
/*******************END***********************************************/



$query = $conn->prepare("SELECT o.oic_id, a.type, a.imagename, a.imagefile, CONCAT(O.oic_lname,', ',o.oic_fname,' ',o.oic_mname)as fullname, o.contact, a.username, a.password FROM oic o, accounts a WHERE o.oic_id = a.oic_id AND o.oic_id != '$oic_id'");
$query->execute();
$row = $query->fetchall();


  foreach($row as $result) {


              echo '<td width="10%"><input type="checkbox" name="selector[]" id="selector[]" value=" '.$result['oic_id'].'"/>'.$result['oic_id'].'</td>';
  
              echo'<td> <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-green">
                <img width="100em" height="85em" title="Profile picture"  src="data:image;base64,'.$result['imagefile'].'" class="user-image" alt="User Image">  </i></span>
                <div class="info-box-content">
                  <span id="upr"  class="info-box-text">Name: '.$result['fullname'].'</span>
                  <span id="upr" class="info-box-text">Type: '.$result['type'].'</span>
                  <span class="info-box-number"><span class="glyphicon glyphicon-phone btn-md" aria-hidden="true""></span> : '.$result['contact'].'</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </td>';
              echo '<td width="20%"><center> <a id="no" class="btn btn-danger"  style="color:white;" href = "controller.php?action=delrecord&tid='.$result['oic_id'].'"><i class="fa fa-trash"></i> Delete</a>  </center></td>';
 /*echo '<td width="20%"><center> <a id="no" class="btn btn-primary" href = "index.php?view=edituser&id='.$result['oic_id'].'"><i class="fa fa-pencil"></i> Edit</a> <a id="no" class="btn btn-danger"  style="color:white;" href = "controller.php?action=delrecord&tid='.$result['oic_id'].'"><i class="fa fa-trash"></i> Delete</a>  </center></td>';
 */
              echo '</tr>';

 }

?>
 
    

    <!-- /NEW PDO QUERY -->


 

                    </tbody>
 
                  </table>  

                    <br>
                    <div class="pull-left">
                         <a style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" href="index.php?view=add" class="btn btn-default"><i class="ion ion-person-add"></i> Add New User</a>
        
                      <button style="background:red;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash"></i> Delete Selected User</button>
                    </div><br><br>
                  </form>




                  <?php } ?>


                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


