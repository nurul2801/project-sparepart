<?php /*if($_SESSION['type']=='Administrator'){ */?>
 

 <!-- Content Header (Page header) -->
 <section class="content-header">
   <h1>
    
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
     <li class="active">Daftar Laporan</li>
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

   

           <form action="controller.php?action=delete" Method="POST">  
           <table id="example1" class="table table-bordered table-striped">
             <thead>
               <tr style="background:orange;">
                 

                    <th>Daftar Laporan</th>
                    <th>Actions</th>

               </tr>
             </thead>
             <tbody>



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
         $res= $gid->fetch(PDO::FETCH_ASSOC);  
         
         $userid = $res['oic_id'];  

$query = $conn->prepare("SELECT * FROM sign");
$query->execute();
$row = $query->fetchall();


if($_SESSION['type']=='Administrator'){



foreach($row as $result) {

       echo '<tr style="background:white;">';

       echo'<td> <div class="info-box">
         <!-- Apply any bg-* class to to the icon to color it -->
         <span class="info-box-icon bg-red">';
         $file_path='uploads/'.$result['imagefile'];
         $imageData = file_get_contents($file_path); // path to file like /var/tmp/...
         echo sprintf('<a href = "index.php?view=viewer&id='.$result['sign_id'].'"><img width="80em" height="90em" src="data:image/png;base64,%s" class="user-image" alt="User Image" /></a>', base64_encode($imageData));

         echo' </i></span>
         <div class="info-box-content">

           <span id="upr" class="info-box-text">Nama Lengkap: <b>'.$result['fname'].'  '.$result['lname'].'</b></span>
           <span id="upr" class="info-box-text">Bidang: <b>'.$result['address'].'</b></span>
           <span id="upr" class="info-box-text">NIP: <b>'.$result['contact'].'</b></span>
           <span id="upr" class="info-box-text">Tanggal Upload: <b>'.$result['dateupload'].'</b></span>  
           <span id="upr" class="info-box-text">Uploaded by: <b>'.$result['fuploader'].'</b></span><br>';
           
         
           
        echo' </div><!-- /.info-box-content -->
       </div><!-- /.info-box -->
       </td>';



     echo '<td width="25%"><center> <a id="no" class="btn btn-success" href = "download.php?filename='.$result['imagefile'].'"><i class="fa fa-download"></i> Download</a><a id="no" class="btn btn-danger"  style="color:white;" href = "controller.php?action=delrecord&tid='.$result['sign_id'].'"><i class="fa fa-trash"></i> Delete</a>  </center></td>';

                
       echo '</tr>';
     } 


   }else{


foreach($row as $result) {

     
       echo '<tr style="background:white;">';

       echo'<td> <div class="info-box">
         <!-- Apply any bg-* class to to the icon to color it -->
         <span class="info-box-icon bg-red">';
         $file_path='uploads/'.$result['imagefile'];
         $imageData = file_get_contents($file_path); // path to file like /var/tmp/...
        echo sprintf('<a href = "index.php?view=viewer&id='.$result['sign_id'].'"><img width="80em" height="90em" src="data:image/png;base64,%s" class="user-image" alt="User Image" /></a>', base64_encode($imageData));

         echo' </i></span>
         <div class="info-box-content">

       <span id="upr" class="info-box-text">Nama Lengkap: <b>'.$result['fname'].' '.$result['minitial'].' '.$result['lname'].'</b></span>
           <span id="upr" class="info-box-text">Bidang: <b>'.$result['address'].'</b></span>
           <span id="upr" class="info-box-text">NIP: <b>'.$result['contact'].'</b></span>
           <span id="upr" class="info-box-text">Tanggal Upload: <b>'.$result['dateupload'].'</b></span>  
           <span id="upr" class="info-box-text">Uploaded by: <b>'.$result['fuploader'].'</b></span><br>';
           
         
           
        echo' </div><!-- /.info-box-content -->
       </div><!-- /.info-box -->
       </td>';



     echo '<td width="25%"><center> <a id="no" class="btn btn-success" href = "download.php?filename='.$result['imagefile'].'"><i class="fa fa-download"></i> Download</a></center></td>';

                
       echo '</tr>';
     } 
   }


 ?>



<!-- 
<a id="no" class="btn btn-success" href = "index.php?view=chat&id='.$result['oic_id'].'"><i class="ion-ios-chatboxes-outline text-white"> </i> Chat</a> 
-->


             </tbody>

           </table>  

             <br>
             <div class="pull-left">
                  <a style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" href="index.php?view=add" class="btn btn-default"><i class="ion ion-person-add"></i> Add New File </a>
 


            <!--    <button style="background:red;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash"></i> Delete Selected Contacts</button>
-->               </div><br><br>
           </form>






         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </div><!-- /.col -->
   </div><!-- /.row -->













<?php
/*   }else{

redirect('../../errorpage/page_404.html');


}*/
?>




