


<?php

 require_once("../../includes/initialize.php");
 include('../../db.php');

 confirm_logged_in();
 




 if(isset($_GET['logout'])){
        unset($_SESSION['acct_id']);
        session_destroy();
        header("location: ../../login.php");//directing to main form login.php
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




 <?php  

 
$query = $conn->prepare("select imagename,imagefile from accounts where oic_id = '$_SESSION[oic_id]'");
$query->execute();
$result = $query->fetchall();


  foreach($result as $row) {

 

                $dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
   
/*********************PDO QUERY*****************************/
                $sql = "SELECT concat(oic.oic_lname,', ',oic.oic_fname,' ',oic.oic_mname)as FullName, a.type, a.signupdate
            FROM oic oic, accounts a WHERE oic.oic_id = a.oic_id and oic.oic_id ='$_SESSION[oic_id]'";
                $gid = $conn->query($sql);
                $gid->execute();
                $rows= $gid->fetch(PDO::FETCH_ASSOC);  
                $fullname = $rows['FullName'];
                $type = $rows['type'];
                $signed = $rows['signupdate'];






 echo '<body class="hold-transition lockscreen">
 
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
       <a href="" style="color:red;l"><b>LOCKED!!!</a>

       </div>
 
      <div class="lockscreen-name" id="upr">'.$fullname.'</div>
 
      <div class="lockscreen-item">
 
        <div class="lockscreen-image">
          <img src="data:image;base64,'.$row[1].'" alt="User Image">
        </div>
 

         
        <form action="#" method="post" class="lockscreen-credentials">
          <div class="input-group">
            <input autofocus name="pass" type="password" class="form-control" placeholder="password">
            <div class="input-group-btn">
              <button type="submit" name="log" class="btn"  ><i class="fa fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </form> 

';

/*******************END***********************************************/

 
    }
 
  ?>




      </div><!-- /.lockscreen-item -->
      <div class="help-block text-center">
        Enter your password unlock your account
      </div>
      <div class="text-center">
        <a href="?logout">Or sign in as a different user</a>
      </div>
      <div class="lockscreen-footer text-center">
        Copyright &copy; 2017 <b><a href="" class="text-black">Ennocent</a></b><br>
        All rights reserved
      </div>
    </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>




<?php



if(isset($_POST['log'])){

$pass = $_POST['pass'];


/*********************SELECT LAST pass*****************************/
                $sql = "SELECT password FROM accounts WHERE acct_id = '$_SESSION[acct_id]'";
                $gid = $conn->query($sql);
                $gid->execute();
                $row= $gid->fetch(PDO::FETCH_ASSOC);  
                $password = $row['password'];
/*******************END***********************************************/

if($password == md5($pass)){
 
                $dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
   
/*********************SELECT LAST INSERT ID*****************************/
                $sql = "SELECT oic_id FROM accounts WHERE acct_id = '$_SESSION[acct_id]'";
                $gid = $conn->query($sql);
                $gid->execute();
                $row= $gid->fetch(PDO::FETCH_ASSOC);  
                $oic_id = $row['oic_id'];
/*******************END***********************************************/


                $sql = "UPDATE accounts SET screenlock = 'OFF' WHERE oic_id = '$oic_id' AND password=md5('$pass')";
                $stmt = $conn->prepare($sql);                                    
                $stmt->execute(); 
                redirect('../../index.php');
               // header("location: ../../index.php");//directing to main form index.php

}else{
    ?>

     <audio id="soundHandle" style="display: none;"></audio>
<script>
  soundHandle = document.getElementById('soundHandle');
  soundHandle.src ="<?php echo WEB_ROOT; ?>/sound/accessdenied.mp3";

//With your message alert function....
alert("Invalid Password!")
soundHandle.play();

</script>

        <?php
} 
}
