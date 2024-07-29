
 

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Daftar Karyawan</li>
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

                

                  <form action="controller.php?action=delete" Method="POST">  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr style="background:orange;">
                        <th>ID Karyawan</th>
                        <th>Daftar Karyawan</th>
                        <?php if($_SESSION['type']=='Administrator'){?>
                        <th><center> Action </center></th>
                        <?php } ?>
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



$query = $conn->prepare("SELECT * FROM employee");
$query->execute();
$row = $query->fetchall();

if($_SESSION['type']=='Administrator'){


  foreach($row as $result) {


              echo '<td width="10%"><input type="checkbox" name="selector[]" id="selector[]" value=" '.$result['emp_id'].'"/>'.$result['emp_id'].'</td>';
  
              echo'<td> <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-white">';


                $file_path='uploads/'.$result['imagefile'];
                $imageData = file_get_contents($file_path); // path to file like /var/tmp/...
                echo sprintf('<img width="100em" height="85em" src="data:image/png;base64,%s" class="user-image" alt="User Image" />', base64_encode($imageData));



                echo'
              </span>
                <div class="info-box-content">
                  <span id="upr"  class="info-box-text">Name: '.$result['fname'].' '.$result['lname'].' '.$result['mname'].'</span>
                  <span id="upr" class="info-box-text">Bidang: '.$result['emp_position'].'</span>
                  <span id="upr" class="info-box-text">Alamat: '.$result['address'].'</span>
                  <span id="upr" class="info-box-text">Tanggal Bergabung: '.$result['datehired'].'</span>
                  <span class="info-box-number"><span class="glyphicon glyphicon-phone btn-md" aria-hidden="true""></span> : '.$result['contact'].'</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </td>';
              
              echo '<td width="20%">
              <center>              
              <a id="no" class="btn btn-primary" href = "index.php?view=edituser&id='.$result['emp_id'].'"><i class="fa fa-pencil"></i> Edit</a> 
              <a id="no" class="btn btn-danger"  style="color:white;" href = "controller.php?action=delrecord&tid='.$result['emp_id'].'"><i class="fa fa-trash"></i> Delete</a>  </center></td>';
 /*echo '<td width="20%"><center> <a id="no" class="btn btn-primary" href = "index.php?view=edituser&id='.$result['oic_id'].'"><i class="fa fa-pencil"></i> Edit</a> <a id="no" class="btn btn-danger"  style="color:white;" href = "controller.php?action=delrecord&tid='.$result['oic_id'].'"><i class="fa fa-trash"></i> Delete</a>  </center></td>';
 */
              echo '</tr>';

 }

}else{

  foreach($row as $result) {


    echo '<td width="10%"><name="selector[]" id="selector[]" value=" '.$result['emp_id'].'"/>'.$result['emp_id'].'</td>';
  
    echo'<td> <div class="info-box">
      <!-- Apply any bg-* class to to the icon to color it -->
      <span class="info-box-icon bg-white">';


      $file_path='uploads/'.$result['imagefile'];
      $imageData = file_get_contents($file_path); // path to file like /var/tmp/...
      echo sprintf('<img width="100em" height="85em" src="data:image/png;base64,%s" class="user-image" alt="User Image" />', base64_encode($imageData));

      echo'
      </span>
      <div class="info-box-content">
        <span id="upr"  class="info-box-text">Name: '.$result['fname'].' '.$result['lname'].' '.$result['mname'].'</span>
        <span id="upr" class="info-box-text">Bidang: '.$result['emp_position'].'</span>
        <span id="upr" class="info-box-text">Alamat: '.$result['address'].'</span>
        <span id="upr" class="info-box-text">Tanggal Bergabung: '.$result['datehired'].'</span>
        <span class="info-box-number"><span class="glyphicon glyphicon-phone btn-md" aria-hidden="true""></span> : '.$result['contact'].'</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
    </td>';
    
 
/*echo '<td width="20%"><center> <a id="no" class="btn btn-primary" href = "index.php?view=edituser&id='.$result['oic_id'].'"><i class="fa fa-pencil"></i> Edit</a> <a id="no" class="btn btn-danger"  style="color:white;" href = "controller.php?action=delrecord&tid='.$result['oic_id'].'"><i class="fa fa-trash"></i> Delete</a>  </center></td>';
*/
    echo '</tr>';
  } 
}       

?>
 
    

    <!-- /NEW PDO QUERY -->


 

                    </tbody>
 
                  </table>  

                    <br>
                    <div class="pull-left">
                        <?php if($_SESSION['type']=='Administrator'){?>
                         <a style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" href="index.php?view=add" class="btn btn-default"><i class="ion ion-person-add"></i>Tambah Karyawan Baru</a>
        
                      <button style="background:red;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash"></i>Hapus Karyawan Yang Dipilih</button>
                    </div><br><br>
                    <?php } ?>
                  </form>





                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


