


<?php

 require_once("../../includes/initialize.php");
 include('../../db.php');


  //login confirmation
 confirm_logged_in();
 




                $dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
 
                $sql = "SELECT screenlock FROM accounts WHERE acct_id = '$_SESSION[acct_id]'";
                $gid = $conn->query($sql);
                $gid->execute();
                $row= $gid->fetch(PDO::FETCH_ASSOC);  
                $screenstat = $row['screenlock'];
                

if( $screenstat == 'OFF'){


 

if(isset($_POST['lock'])){



 // Mengambil nilai acct_id dari $_SESSION dengan aman
    $acct_id = $_SESSION['acct_id'];

    // Membuat query untuk mengupdate data dengan menggunakan prepared statement
    $query = "UPDATE accounts SET screenlock = 'ON' WHERE acct_id = :acct_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':acct_id', $acct_id);

    // Menjalankan query
    try {
        $stmt->execute();
        header("location: lockscreen.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

 ?>

 


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>


 <style>
#uprall {
    text-transform:uppercase;
}
#upr {
    text-transform:capitalize;
}
</style>



 <body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
       <a href=""><b>APAKAH ANDA INGIN MENGKUNCI AKUN ANDA?</a>

       </div>


<form action="#" method="post">

 <br>
 <center>      
                      <button style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" class="btn btn-default" name="lock"><i class="fa fa-lock"></i></button>
                      <a style="background:red;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" href="../../index.php" class="btn btn-default"><i class="fa fa-circle"></i> Cancel</a>  
 </center>                   

</form>
      
      <div class="lockscreen-footer text-center">
        Copyright &copy; 2024 <b><a href="" class="text-black"></a></b><br>
        Politeknik Negeri Malang
      </div>
    </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>




<?php


}else{
 
        redirect('lockscreen.php');
 
}

?>