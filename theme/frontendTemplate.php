<?php 



    include(SITE_ROOT.'/db.php');
 
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






    if(isset($_GET['logout'])){
        
        /*UPDATE ACCOUNTS TO OFFLINE*/


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


                $sql = "UPDATE accounts SET status = 'Offline' WHERE oic_id = '$oic_id'";
                $stmt = $conn->prepare($sql);                                    
                $stmt->execute(); 
                 

        unset($_SESSION['index.php']);
        session_destroy();
        ?>
        <script type="text/javascript">
        window.location = "<?php echo WEB_ROOT; ?>login.php";
        </script>
        <?php
       // header("Location: login.php");//redirecting to login form when session is destroyed
        exit;
    }
?>




 <style>
#uprall {
    text-transform:uppercase;
}
#upr {
    text-transform:capitalize;
}
</style>





<!DOCTYPE html>
<html data-ng-app="">
  <head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MONITORING SPAREPART IT</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <!-- icon -->
  
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/ionicons-2.0.1/css/ionicons.min.css">
      <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>plugins/datatables/dataTables.bootstrap.css">
        <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- Theme style -->  
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>dist/css/skins/skin-blue-light.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="shortcut icon" href="<?php echo WEB_ROOT; ?>images/pjb.png" type="image/x-icon"/>


<!--angular framework-->
 
  </head>
<!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
 <!--  <body class="hold-transition skin-blue sidebar-mini"> -->
 <body class="fixed skin-blue-light sidebar-mini ">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>IT</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>MONITORING IT</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle " data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
  <?php  
 
$query = $conn->prepare("select imagename,imagefile from accounts where oic_id = '$_SESSION[oic_id]'");
$query->execute();
$result = $query->fetchall();


  foreach($result as $row) {

      echo'<img title="Profile picture"  src="data:image;base64,'.$row[1].'" class="user-image" alt="User Image"> ';
        


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


/*******************END***********************************************/


 
          echo '<span class="hidden-xs" id="upr">'.$fullname.'</span>';

                 
               echo' </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">';
                  echo '<img title="Profile picture"  src="data:image;base64,'.$row[1].'" class="img-circle" alt="User Image">';

                  echo'<p id="upr">
                      '.$fullname.'
                      <small>'.$type.'</small>
                    </p>
                  </li>';
    }
 
  ?>
                  <!-- Menu Body -->
                  <li class="user-body">
             <!--        <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div> -->

                      <center>  
                      <a style="background:green;" href="<?php echo WEB_ROOT; ?>modules/lockscreen/confirmlock.php" class="btn btn-default btn-flat"><i class="fa fa-lock" style="color:white;"></i> <span style="color:white;">Kunci Akun</span></a>          
                    </center>
                  

                  </li>


                  <li class="user-body">
                    <div class="col-xs-12 text-center" style="font-size:12px;">
                      <a href="#">Joined: <?php echo $signed; ?></a>
                    </div>
                  </li>




                  <!-- Menu Footer-->
                  <li class="user-footer" >
                    <div class="pull-left">
                      <a style="background:#FDA403; color:white; border-radius: 50px 50px 50px 50px; outline:none;"  href="<?php echo WEB_ROOT; ?>modules/Users/index.php?view=edit&id=<?php echo $_SESSION['oic_id']; ?>" class="btn btn-default btn-flat"><i class="fa fa-user"></i>Lihat Profil</a>      
                    </div>
                    <div class="pull-right">
                      <a style="background:red; color:white; border-radius: 50px 50px 50px 50px; outline:none;" href="?logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>Keluar Dari Akun</a> 
                    </div>
                  </li>
                </ul>
              </li>
              <li>&nbsp;&nbsp;&nbsp;</li>
              <!-- Control Sidebar Toggle Button -->
        <!--       <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
 

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            
            <!-- Optionally, you can add icons to the links -->
            <li id="dashboard">
              <a href="<?php echo WEB_ROOT; ?>index.php">
                <i class="fa fa-dashboard"></i> <span> Dashboard</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa ion-android-desktop text-aqua"></i>
                <span>Sparepart IT</span>
                
              <?php
                  $randoms = $conn->query('SELECT COUNT(id) FROM random')->fetchColumn(); 
                  echo'<span class="label  pull-right bg-aqua">'. $randoms.'</span>';
                ?>
              
              </a>
                <ul class="treeview-menu">
                <li><a href="<?php echo WEB_ROOT; ?>modules/random/index.php?view=add"><i class="fa fa-plus text-aqua"></i> Tambah Sparepart IT </a></li>
                <li><a href="<?php echo WEB_ROOT; ?>modules/random/index.php"><i class="fa fa-search text-aqua"></i> Daftar Sparepart IT</a></li>

              </ul>
            </li>
               <li class="treeview">
              <a href="#">
                <i class="fa ion-android-document text-yellow"></i>
                <span>Laporan</span>
                
              <?php
                  $sign = $conn->query('SELECT COUNT(sign_id) FROM sign')->fetchColumn(); 
                  echo'<span class="label  pull-right bg-yellow">'. $sign.'</span>';
                ?>
              
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo WEB_ROOT; ?>modules/sign/index.php?view=add"><i class="fa fa-plus text-yellow"></i>Tambah Laporan</a></li>
                <li><a href="<?php echo WEB_ROOT; ?>modules/sign/index.php"><i class="fa fa-search text-yellow"></i>Lihat Daftar Laporan</a></li>

              </ul>
            </li>

            
               <li class="treeview">
              <a href="#">
                <i class="fa fa-users text-green"></i>
                <span>Karyawan</span>
                
              <?php
                  $sign = $conn->query('SELECT COUNT(emp_id) FROM employee')->fetchColumn(); 
                  echo'<span class="label  pull-right bg-green">'. $sign.'</span>';
                ?>
              
              </a>
              <ul class="treeview-menu">
                
       <?php if($_SESSION['type']=='Administrator'){?>
                <li><a href="<?php echo WEB_ROOT; ?>modules/employee/index.php?view=add"><i class="fa fa-plus text-green"></i>Tambah Karyawan Baru</a></li>
                <?php } ?>
                
                <li><a href="<?php echo WEB_ROOT; ?>modules/employee/index.php"><i class="fa fa-search text-green"></i>Lihat Daftar Karyawan</a></li>

              </ul>
            </li>

          
 
       <?php if($_SESSION['type']=='Administrator'){?>
              <li class="treeview">
              <a href="#">
                <i class="ion ion-person-stalker"> </i> 
                <span>Pengguna</span>
              <?php
                 $accounts = $conn->query("SELECT COUNT(acct_id)as accounts FROM accounts WHERE acct_id != '$_SESSION[acct_id]' ")->fetchColumn(); 
                echo'<span class="label   pull-right bg-gray">'. $accounts.'</span>';
                ?>

              </a>
              <ul class="treeview-menu">
           
                <li><a href="<?php echo WEB_ROOT; ?>modules/Users/index.php?view=add"><i class="fa fa-plus text-orange"></i>Tambah Pengguna Baru</a></li>
              
                <li><a href="<?php echo WEB_ROOT; ?>modules/Users/index.php"><i class="fa fa-search text-orange"></i>Lihat Daftar Pengguna</a></li>

              </ul>
            </li>

  <?php } ?>
  
            <?php if($_SESSION['type']=='Administrator'){?>
            <!--   <li>
              <a href="<?php echo WEB_ROOT; ?>modules/Messaging/index.php">
                <i class="fa fa-envelope text-white"></i> <span> SMS</span>
 
              </a>
            </li> -->
            <?php } ?>



             <li class="treeview">
              <a href="<?php echo WEB_ROOT; ?>modules/contacts/index.php">
               <i class="fa fa-phone text-green"></i> 
                <span>Kontak</span>            
                      <?php

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


                 $conts = $conn->query("SELECT COUNT(oic_id)as cont FROM contacts WHERE owner = '$oic_id'")->fetchColumn(); 
                echo'<span class="label   pull-right bg-green">'.$conts.'</span>';
                ?>
                  </a>
            </li>



          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>





      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
        <?php check_message(); ?>
        <?php require_once $content;?>

         <!-- Your Page Content Here -->


          <!--End Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer" id="no">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          <b>POLITEKNIK NEGERI MALANG</b> 
        </div>

        <?php
       date_default_timezone_set('Asia/Manila');
        $date = date('Y'); 
        ?>

        <!-- Default to the left -->
         <strong>Copyright &copy; <?php echo $date; ?> | APLIKASI MONITORING SPAREPART IT</strong> | <b>TUGAS AKHIR</b>
      
      </footer>

     
    <!-- REQUIRED JS SCRIPTS -->
 

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
          <!-- jQuery 2.1.4 -->
    <script src="<?php echo WEB_ROOT; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo WEB_ROOT; ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo WEB_ROOT; ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo WEB_ROOT; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo WEB_ROOT; ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo WEB_ROOT; ?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo WEB_ROOT; ?>dist/js/demo.js"></script>
        <!-- fullCalendar 2.2.5 -->
    <script src="<?php echo WEB_ROOT; ?>js/moment.min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>plugins/fullcalendar/fullcalendar.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>



      <script>
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1),
              backgroundColor: "#f56954", //red
              borderColor: "#f56954" //red
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d - 5),
              end: new Date(y, m, d - 2),
              backgroundColor: "#f39c12", //yellow
              borderColor: "#f39c12" //yellow
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false,
              backgroundColor: "#0073b7", //Blue
              borderColor: "#0073b7" //Blue
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false,
              backgroundColor: "#00c0ef", //Info (aqua)
              borderColor: "#00c0ef" //Info (aqua)
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d + 1, 19, 0),
              end: new Date(y, m, d + 1, 22, 30),
              allDay: false,
              backgroundColor: "#00a65a", //Success (green)
              borderColor: "#00a65a" //Success (green)
            },
            {
              title: 'Click for Google',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://google.com/',
              backgroundColor: "#3c8dbc", //Primary (light-blue)
              borderColor: "#3c8dbc" //Primary (light-blue)
            }
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          }
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });
      });
    </script>


    <script>
  function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
   function checkNumber(textBox){
        while (textBox.value.length > 0 && isNaN(textBox.value)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }
      //
      function checkText(textBox)
      {
        var alphaExp = /^[a-zA-Z]+$/;
        while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }

      
</script>





  </body>
</html>



<?php


}else{
 
        redirect('modules/lockscreen/lockscreen.php');
 
}

?>