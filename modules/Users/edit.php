 

      <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            Profil Pengguna 
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Edit Profil Pengguna</li>
          </ol>
        </section>
 <hr>






<?php
$id = $_GET['id'];


                $dbhost = "localhost";
                $dbname = "asidatabase";
                $dbusername = "root";
                $dbpassword = "";                    
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
   
/*********************PDO QUERY*****************************/
                $sql = "SELECT * FROM oic oic, accounts acct WHERE oic.oic_id = oic.oic_id  AND oic.oic_id  = '$id' AND acct.oic_id = '$id'";
                $gid = $conn->query($sql);
                $gid->execute();
                $rs= $gid->fetch(PDO::FETCH_ASSOC);  

                $rs['oic_id'];  
                $_SESSION['oic_fname'] = $rs['oic_fname'];   
                $_SESSION['oic_lname'] = $rs['oic_lname'];   
                $_SESSION['oic_mname'] = $rs['oic_mname'];  
                $_SESSION['contact'] = $rs['contact'];  
                $_SESSION['username'] = $rs['username'];  
                $_SESSION['password'] = $rs['password'];   
     
/*******************END***********************************************/
 


$query = $conn->prepare("SELECT imagename,imagefile FROM accounts WHERE oic_id = '$id'");
$query->execute();
$res = $query->fetchall();


  foreach($res as $row) {

echo '<div class="box box-solid box-solid">

<p style="color:black; background:#FFC700; font-size:24px;">Gambar Profil</p><br><center>';

    echo '<img style="width:12em; height:12em; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:0px 0px 0px 0px ;"  title="Profile picture" class="art-lightbox" src="data:image;base64,'.$row[1].'">';
    }
  
 echo '
    <hr><a href="index.php?view=changepf"<p style="color:black;"><button style="width:12em;  box-shadow:0px 2px 2px 1px #777;" color:black">Update Gambar Profil</button></p></a>
    ';


echo '</center><br></div>';





echo'

<div class="box box-solid box-solid" > 
<p style="color:black; background:#FFC700; font-size:24px;">Profil Informasi</p>
<form class="form-horizontal span6" action="controller.php?action=editadmin" method="POST" enctype="multipart/form-data" >
          <fieldset>
           <center> <legend style="color:darkred;" ></legend>    </center>                                 
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "idnum">ID:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input  class="form-control input-sm" id="idnum" name="idnum" placeholder=
                            "Account ID" type="text" value="'.$_SESSION['oic_id'].'" readonly>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">Nama Awal:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="fname" name="fname" placeholder=
                            "Nama Awal" type="text" value="'.$_SESSION['oic_fname'].'" required>
                      </div>
                    </div>


                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Nama Akhir:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="lname" placeholder=
                            "Nama Akhir" type="text" value="'.$_SESSION['oic_lname'].'" required>
                      </div>
                       </div>


                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Bidang:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="mname" placeholder=
                            "Optional" type="text" value="'.$_SESSION['oic_mname'].'">
                      </div>
                    </div>
                  </div>


     <div class="form-group">
                  <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="cont" name="username" placeholder=
                            "User name" type="text" value="'.$_SESSION['username'].'" required>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="cont" name="password" placeholder=
                            "Password" type="text" value="'.$_SESSION['password'].'" required>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">Kontak:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input maxlength="11" id="upr" class="form-control input-sm" id="cont" name="cont" placeholder=
                            "Kontak" type="text" value="'.$_SESSION['contact'].'" required>
                      </div>
                    </div>
                           </div>

                



                      <div class="col-md-8">
                        <br>
                               <button style="width:12em;  box-shadow:0px 2px 2px 1px #777; ;" type="submit" name="adminupdate" class="color:black"> Update Profil Informasi</button>
           </div>



                  
 <br/>
 <br/>
 <br/>
 <div class="form-group">
      <div class="rows">
        <div class="col-md-6">
          <div class="col-md-6"></div>
            </div>
          
      </div>
    </div>                                    
        </fieldset>
            <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>
                      <div class="col-md-6">                   
                    </div>
                  </div>
                <div class="col-md-6" align="right">                  
              </div>  
            </div>
          </div>
        </form>
    </div>
'; 
 
 
?>

<style>
#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
 


input {
    border: none;
    overflow: auto;
    outline: none;
COLOR:BLACK;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
</style>

 




