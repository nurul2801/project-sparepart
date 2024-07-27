<?php
 include('includes/initialize.php');
 // include('db.php');
  //login confirmation
 confirm_logged_in();

 ?>

 
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard 
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <br>


<!-- UPDATE ACCOUNTS TO ONLINE -->

<?php
      // echo "SELECT oic_id FROM accounts WHERE acct_id = '$_SESSION[acct_id]'";
      // $user = $conn->prepare("SELECT oic_id FROM accounts WHERE acct_id = '$_SESSION[acct_id]'")->execute();
      // $res =  $user->fetch();

      $stmt = $conn->prepare("UPDATE accounts SET status = 'Online' WHERE oic_id = '$_SESSION[oic_id]'");
      $stmt->execute();
 
 ?>
<!-- END UPDATE -->





<!----------------------------------START SLIDER-------------------------------------------------------------->

 <div class="row carousel-holder">

                    <div class="col-md-12" >
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>              
                                <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                          
                            </ol>
                            <div class="carousel-inner"  >

                                <div class="item active" > <img style="height:500px;"   width="100%" class="slide-image" src="images/gambar1.jpg" alt=""> </div>
                                <div class="item" >    <img style="height:500px;"    width="100%" id="admin_avatar" class="img-polaroid" src="images/gambar3.jpg">  </div>
                                <div class="item" >    <img style="height:500px;"    width="100%" id="admin_avatar" class="img-polaroid" src="images/gambar2.jpg">  </div> 
                              </div>

                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>

<!------------------------------END SLIDER------------------------------------------------------>

<br>  





 <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">

                <?php
                  // echo 'SELECT COUNT(id) FROM random';
                  $random = $conn->prepare('SELECT COUNT(id) as count FROM random')->fetchColumn(); 
                  echo'<h3>'.$random.'</h3>';

                ?>

                  <p>Sparepart IT</p>
                </div>
                <div class="icon">
                  <i class="fa ion-android-desktop"></i>
                </div>
                <a href="<?php echo WEB_ROOT; ?>modules/random/index.php" class="small-box-footer">Lihat Daftar Barang <i class="fa fa-arrow-circle-right"></i></a>
              </div>  
            </div><!-- ./col -->





            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">

                <?php

                  $sign = $conn->prepare('SELECT COUNT(sign_id) FROM sign')->fetchColumn(); 
                  echo'<h3>'.$sign.'</h3>';

                ?>
 
                  <p>Laporan</p>
                </div>
                <div class="icon">
                  <i class="fa ion-android-document"></i>
                </div>
                <a href="<?php echo WEB_ROOT; ?>modules/sign/index.php" class="small-box-footer">Lihat Daftar Laporan <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->






   
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">

                 <?php

                  $emp = $conn->prepare('SELECT COUNT(emp_id) FROM employee')->fetchColumn(); 
                  echo'<h3>'.$emp.'</h3>';

                ?>
                  <p>Karyawan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-person"></i>
                </div>
                <a href="<?php echo WEB_ROOT; ?>modules/employee/index.php" class="small-box-footer">Lihat Daftar Karyawan <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">

                <?php

                  $random = $conn->prepare('SELECT COUNT(id) FROM random')->fetchColumn(); 
                  echo'<h3>'.$random.'</h3>';

                ?>
 
                  <p>Kontak</p>
                </div>
                <div class="icon">
                  <i class="fa fa-phone"></i>
                </div>
                <a href="<?php echo WEB_ROOT; ?>modules/contacts/index.php" class="small-box-footer">Lihat Daftar Kontak <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->




 

 