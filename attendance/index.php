<!DOCTYPE html>
<html lang="en">

<head>



 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AlphabetSoup Inc. Attendance</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/presentational.css">
    <link rel="shortcut icon" href="images/favicon.ico">
    
    <link rel="stylesheet" href="css/circular-images.css">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">   

    <!-- Temporary navbar container fix -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>

 <style>
#uprall {
    text-transform:uppercase;
}
#upr {
    text-transform:capitalize;
}
</style>



</head>

<body class="index" id="page-top">

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            Menu <i class="fa fa-bars"></i>
        </button>
        <div class="container">
            <a class="navbar-brand" id="upr" href="#page-top"><span style="color:orange;">Alphabet</span><span style="color:yellow;">Soup</span> <span style="color:brown;">Inc.</span></a>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav ml-auto">

                <form method="post" action="#">
                    <li class="nav-item">
                        <input  style="height:30px; width:300px; font-size:20px;" name="id" type="text" placeholder="Employee ID" autofocus required>
                    </li>
                </form>

                    <li class="nav-item">
                          
     <?php //echo "&nbsp;&nbsp;<span style='color:white; font-size:20px;'>".$today."</span>";?>
                  
                    </li>
                </ul>
            </div>
        </div>
    </nav>




<!-- MAIN CONTENT -->



<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "asidatabase";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");



 
   

if(isset($_POST['id'])){

   $id = $_POST['id'];
   $rand = rand();


    $verify = mysql_query("select * from employee where emp_id = '$id'");
    $doconfirm = mysql_fetch_assoc($verify);

    if($doconfirm <> 0){


     date_default_timezone_set('Asia/Manila');
    $current = date("F j, Y, g:i a");  
    $today = date("D M d, Y");
    $time = date('g:i a', strtotime($current));



/*Proper Login*/

$current_time = $time;
$sunrise = "5:00 am";
$sunset = "6:00 pm";
$date1 = DateTime::createFromFormat('H:i a', $current_time);
$date2 = DateTime::createFromFormat('H:i a', $sunrise);
$date3 = DateTime::createFromFormat('H:i a', $sunset);
 
 
 
/*End Proper Login*/


if ($date1 >= $date2 && $date1 < $date3) //login process
{
   

   $confirm = mysql_query("select * from attendance where emp_id = '$id' and datetoday = '$today'");
   $resconfirm = mysql_fetch_array($confirm);
   $aid = $resconfirm['AID'];
   $in = $resconfirm['time_in'];
   $out = $resconfirm['time_out'];


 

   if($in == '' && $out == ''){

    mysql_query("INSERT INTO attendance VALUES ('$rand', '$id', '$time', '', '$today')");


    $sql = mysql_query("select * from employee e, attendance a where e.emp_id = a.emp_id AND e.emp_id = '$id' AND a.datetoday = '$today'");
    $res = mysql_fetch_assoc($sql);
    $fname = $res['fname'];
    $lname = $res['lname'];

    $fullname = $fname.' '.$lname;

    $position = $res['emp_position'];
    $filename = $res['imagefile'];

    $timein = $res['time_in'];
    $timeout = $res['time_out'];
/*    $timein = DATE("g:i a", STRTOTIME($tin));*/
    $datetoday = $res['datetoday'];


echo'
    <header class="masthead">
        <div class="container">';


                $file_path="../modules/employee/uploads/".$filename;
                $imageData = file_get_contents($file_path); // path to file like /var/tmp/...
                //echo sprintf('<center><img width="650em" height="450em" src="data:image/png;base64,%s" class="user-image" alt="User Image" /></center>', base64_encode($imageData));
                 echo sprintf('<img class="circular--landscape" class="img-fluid" src="data:image/png;base64,%s" class="user-image" alt="User Image" >', base64_encode($imageData));
 
echo'
            <div class="intro-text">
                <span style="font-size:30px; text-transform:capitalize;">'.$fullname.'</span><br>
                 <small><span style="font-size:18px; text-transform:capitalize;">'.$position.'</span></small>
                 <small><hr class="star-light"></small>

               <center> <table>
                <tr> 
                <td><span style="color:black;">Date:</span><BR></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$datetoday.'</b></td>
                </tr>

                <tr> 
                <td><span style="color:black;">Time In:</span><BR></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$timein.'</b></td>
                </tr>

                <tr>
                <td><span style="color:black;">Time Out:</span></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$timeout.'</b></td>
                </td>

                    <tr>
                <td><span style="color:black;"> </span></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> </b></td>
                </td>

                    <tr>
                <td><span style="color:black;"> </span></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> </b></td>
                </td>

                </table></center>
  

            </div>
        </div>
    </header>


    ';



}elseif($in <> '' && $out == ''){


    $sql = mysql_query("select * from employee e, attendance a where e.emp_id = a.emp_id AND e.emp_id = '$id' AND a.datetoday = '$today'");
    $res = mysql_fetch_assoc($sql);
    $fname = $res['fname'];
    $lname = $res['lname'];

    $fullname = $fname.' '.$lname;

    $position = $res['emp_position'];
    $filename = $res['imagefile'];

    $timein = $res['time_in'];
    $timeout = $res['time_out'];
    $datetoday = $res['datetoday'];


echo'
    <header class="masthead">
        <div class="container">';


                $file_path="../modules/employee/uploads/".$filename;
                $imageData = file_get_contents($file_path); // path to file like /var/tmp/...
                //echo sprintf('<center><img width="650em" height="450em" src="data:image/png;base64,%s" class="user-image" alt="User Image" /></center>', base64_encode($imageData));
                 echo sprintf('<img class="circular--landscape" class="img-fluid" src="data:image/png;base64,%s" class="user-image" alt="User Image" >', base64_encode($imageData));
 
echo'
            <div class="intro-text">
                <span style="font-size:30px; text-transform:capitalize;">'.$fullname.'</span><br>
                 <small><span style="font-size:18px; text-transform:capitalize;">'.$position.'</span></small>
                 <small><hr class="star-light"></small>

               <center> <table>
                <tr> 
                <td><span style="color:black;">Date:</span><BR></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$datetoday.'</b></td>
                </tr>

                <tr> 
                <td><span style="color:black;">Time In:</span><BR></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$timein.'</b></td>
                </tr>

                <tr>
                <td><span style="color:black;">Time Out:</span></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$timeout.'</b></td>
                </td>
                </table>
<br>
<p>Time out will start at 6:00 PM!!!</p>
<br><br><br>

                </center>
  

            </div>
        </div>
    </header>


    ';


}






/*logout process*/

}elseif($date1 > $date3){




   $confirm = mysql_query("select * from attendance where emp_id = '$id' and datetoday = '$today'");
   $resconfirm = mysql_fetch_array($confirm);
   $aid = $resconfirm['AID'];
   $in = $resconfirm['time_in'];
   $out = $resconfirm['time_out'];


  if($in <> '' && $out == ''){
    
   mysql_query("UPDATE attendance SET time_out = '$time' WHERE emp_id = '$id' and datetoday = '$today'");



    $sql = mysql_query("select * from employee e, attendance a where e.emp_id = a.emp_id AND e.emp_id = '$id' AND a.datetoday = '$today'");
    $res = mysql_fetch_assoc($sql);
    $fname = $res['fname'];
    $lname = $res['lname'];

    $fullname = $fname.' '.$lname;

    $position = $res['emp_position'];
    $filename = $res['imagefile'];

    $timein = $res['time_in'];
    $timeout = $res['time_out'];
    $datetoday = $res['datetoday'];


echo'
    <header class="masthead">
        <div class="container">';


                $file_path="../modules/employee/uploads/".$filename;
                $imageData = file_get_contents($file_path); // path to file like /var/tmp/...
                //echo sprintf('<center><img width="650em" height="450em" src="data:image/png;base64,%s" class="user-image" alt="User Image" /></center>', base64_encode($imageData));
                 echo sprintf('<img class="circular--landscape" class="img-fluid" src="data:image/png;base64,%s" class="user-image" alt="User Image" >', base64_encode($imageData));
 
echo'
            <div class="intro-text">
                <span style="font-size:30px; text-transform:capitalize;">'.$fullname.'</span><br>
                 <small><span style="font-size:18px; text-transform:capitalize;">'.$position.'</span></small>
                 <small><hr class="star-light"></small>

               <center> <table>
                <tr> 
                <td><span style="color:black;">Date:</span><BR></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$datetoday.'</b></td>
                </tr>

                <tr> 
                <td><span style="color:black;">Time In:</span><BR></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$timein.'</b></td>
                </tr>

                <tr>
                <td><span style="color:black;">Time Out:</span></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$timeout.'</b></td>
                </td>


                    <tr>
                <td><span style="color:black;"> </span></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> </b></td>
                </td>

                    <tr>
                <td><span style="color:black;"> </span></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> </b></td>
                </td>

                </table></center>
  

            </div>
        </div>
    </header>


    ';


}elseif($in <> '' && $out <> ''){


    $sql = mysql_query("select * from employee e, attendance a where e.emp_id = a.emp_id AND e.emp_id = '$id' AND a.datetoday = '$today'");
    $res = mysql_fetch_assoc($sql);
    $fname = $res['fname'];
    $lname = $res['lname'];

    $fullname = $fname.' '.$lname;

    $position = $res['emp_position'];
    $filename = $res['imagefile'];

    $timein = $res['time_in'];
    $timeout = $res['time_out'];
    $datetoday = $res['datetoday'];


echo'
    <header class="masthead">
        <div class="container">';


                $file_path="../modules/employee/uploads/".$filename;
                $imageData = file_get_contents($file_path); // path to file like /var/tmp/...
                //echo sprintf('<center><img width="650em" height="450em" src="data:image/png;base64,%s" class="user-image" alt="User Image" /></center>', base64_encode($imageData));
                 echo sprintf('<img class="circular--landscape" class="img-fluid" src="data:image/png;base64,%s" class="user-image" alt="User Image" >', base64_encode($imageData));
 
echo'
            <div class="intro-text">
                <span style="font-size:30px; text-transform:capitalize;">'.$fullname.'</span><br>
                 <small><span style="font-size:18px; text-transform:capitalize;">'.$position.'</span></small>
                 <small><hr class="star-light"></small>

               <center> <table>
                <tr> 
                <td><span style="color:black;">Date:</span><BR></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$datetoday.'</b></td>
                </tr>

                <tr> 
                <td><span style="color:black;">Time In:</span><BR></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$timein.'</b></td>
                </tr>

                <tr>
                <td><span style="color:black;">Time Out:</span></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$timeout.'</b></td>
                </td>



                    <tr>
                <td><span style="color:black;"> </span></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> </b></td>
                </td>

                    <tr>
                <td><span style="color:black;"> </span></td>
                <td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> </b></td>
                </td>

                </table></center>
  

            </div>
        </div>
    </header>


    ';



} 




}else{

echo '<center><br><br><br><br><small><hr class="star-light"></small><span style="fornt-size:24px; color:#0a0;">'.date("D M d, Y").'</span><br><p>Time in will start at 5:00 AM!!!</p></center>';

} 









}else{

echo '<center><br><br><br><br><small><hr class="star-light"></small><p>Employee ID number "'.$id.'" doesnt exist, Please contact your administrator!</p></center>';
    
}

}//end isset
    


?>

<!-- END MAIN CONTENT -->







    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
