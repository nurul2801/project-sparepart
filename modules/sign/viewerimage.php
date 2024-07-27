<?php

$id = $_GET['id'];


          $dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
   
/*********************PDO QUERY*****************************/
 
    $sql = "SELECT * FROM sign WHERE sign_id ='$id'";
                $gid = $conn->query($sql);
                $gid->execute();
                $res= $gid->fetch(PDO::FETCH_ASSOC);  
                
               $filename = $res['imagefile'];
               $fullname = $res['fname'].' '.$res['lname'];

?>

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 id="upr">
            <?php echo $fullname; ?>'s Signature
            <small>Manpower Signatures Panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Manpower Signatures Area</li>
          </ol>
        </section>
        <hr>
  




 <style>
#uprall {
    text-transform:uppercase;
}
#upr {
    text-transform:capitalize;
}
</style>







          <div class="row">
            <div class="col-xs-12">
          

              <div class="box" style=" outline:none; border-radius:20px 20px 20px 20px ; border:transparent;">
                <div class="box-header">
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">

          
 

<?php



 				$file_path='uploads/'.$filename;
                $imageData = file_get_contents($file_path); // path to file like /var/tmp/...
                echo sprintf('<center><img width="650em" height="450em" src="data:image/png;base64,%s" class="user-image" alt="User Image" /></center>', base64_encode($imageData));

?>
 <br>


 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
 
