
 

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            MS Word Files 
            <small>Control Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">MS Word List</li>
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
                        <th><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> ID</th>
                        <th>Date Uploaded</th>
                        <th>Uploader</th>
                        <th>File Name</th>
                        <th>Description</th>
 
                        <th><center> Actions </center></th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
              $mydb = mysql_query("SELECT * FROM msword ORDER BY id DESC");
             
              while($result = mysql_fetch_array($mydb)){
 

              echo '<tr style="background:lightgray;">';
              echo '<td width="10%"><input type="checkbox" name="selector[]" id="selector[]" value="'. $result['id'].'"/>'. $result['id'].'</td>';
              echo '<td id="upr" width="15%">'. $result['fdatein'].'</td>';
              echo '<td id="upr" width="15%">'. $result['fuplder'].'</td>';
              echo '<td id="upr"  ">'. $result['fname'].'</td>';
              echo '<td id="upr" >'. $result['fdesc'].'</td>';
                echo '<td width="10%"><center>  <a id="no" class="btn btn-danger"  style="color:white;" href = "controller.php?action=delrecord&tid='. $result['id'].'" title="Delete"><i class="fa fa-trash"></i>  </a>  <a id="no" class="btn btn-success"  href = "download.php?filename='. $result['file'].'" title="Download"><i class="fa fa-download"></i>  </a> </center></td>';
              echo '</tr>';
         
         



            } 
            ?>

                    </tbody>
                  </table>

                    <br>
                    <div class="pull-left">
                     <a style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" href="index.php?view=add" class="btn btn-default"><span class="glyphicon glyphicon-upload -sign"></span> Upload MS Word File</a>
        
        
        <?php
        $status = mysql_query("SELECT COUNT(ID)as countid FROM msword");
        $res = mysql_fetch_assoc($status);

        if($res['countid'] <> 0){

          echo '<button style="background:red;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash"></i> Delete Selected Files</button>';

        }else{
          echo '<button style="background:red;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" class="btn btn-default" name="delete" disabled><i class="fa fa-trash"></i> Delete Selected Files</button>';
        }
         ?>                   


                    </div><br><br>
                  </form>






                  <?php }else{ ?>

  <form action="controller.php?action=delete" Method="POST">  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr style="background:orange;">
                        <th>ID</th>
                        <th>Date Uploaded</th>
                        <th>Uploader</th>
                        <th>File Name</th>
                        <th>Description</th>
 
                        <th><center> Actions </center></th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
              $mydb = mysql_query("SELECT * FROM msword ORDER BY id DESC");
             
              while($result = mysql_fetch_array($mydb)){
 

              echo '<tr style="background:lightgray;">';
              echo '<td width="10%"> '. $result['id'].'</td>';
              echo '<td id="upr" width="15%">'. $result['fdatein'].'</td>';
              echo '<td id="upr" width="15%">'. $result['fuplder'].'</td>';
              echo '<td id="upr" >'. $result['fname'].'</td>';
              echo '<td id="upr" >'. $result['fdesc'].'</td>';
                echo '<td width="10%"><center>   </a>  <a id="no" class="btn btn-success"  href = "download.php?filename='.$result['file'].'" title="Download"><i class="fa fa-download"></i>  </a> </center></td>';
              echo '</tr>';
 

            } 
            ?>

                    </tbody>
                  </table>

                    <br>
                    <div class="pull-left">
                     <a style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" href="index.php?view=add" class="btn btn-default"><span class="glyphicon glyphicon-upload -sign"></span> Upload MS Word File</a>
                    </div><br><br>
                  </form>



                  <?php } ?>


                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
 