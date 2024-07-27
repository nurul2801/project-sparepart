 <?php if($_SESSION['type']=='Administrator'){?>


        <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
             
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tambah Pengguna Baru</li>
          </ol>
        </section>
 <hr>


            <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

          <fieldset>
                     
           


                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "fname">Nama Awal:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="fname" name="fname" placeholder=
                            "Nama Awal" type="text" value="" required>
                      </div>
                    </div>


                     <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "lname">Nama Akhir:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="upr" class="form-control input-sm" id="lname" name="lname" placeholder=
                            "Last Name" type="text" value="" required>
                      </div>
                       </div>


                       <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "mname">Bidang:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="mname" placeholder=
                            "Optional" type="text" value="">
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "username">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="username" name="username" placeholder=
                            "User Name" type="text" value="" required>
                      </div>
                    </div>
                 
                   
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "pass">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder=
                            "Account Password" type="Password" value="" required>
                      </div>
                    </div>
                
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "type">Type:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="type" id="type">
                       <option>Select User Type</option>
                          <option value="Administrator">Administrator</option>
                          <option value="Non-Administrator">Non-Administrator</option>
                  
                        </select> 
                      </div>
                    </div>
                  </div>


<div class="form-group">
 <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "pass">Kontak:</label>

                      <div class="col-md-8">
                        <input name="cont" type="hidden" value="">
                         <input maxlength="11" class="form-control input-sm" id="cont" name="cont" placeholder=
                            "Mobile number" type="text" value="" required>
                      </div>
                    </div>
                       </div>


                  <div class="form-group">
         
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

                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="col-md-4 control-label" for=
                      "image">Profile Pic:</label>

                      <div class="col-md-8">
                      
  <input type="file" style=" font-size:19px; height:28.5px;  border: 1px solid #765942;border-radius: 10px; background:red; color:white;" name="image"/> <span>Profile Picture is Optional</span><br/>
 
                      </div>
                    </div>
                  </div>

 <br>

          <div class="pull-right">
          <button style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" name="save" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
             <button style="background:#0a0;color:white; box-shadow:0px 2px 2px 1px #777; outline:none; border-radius:50px 50px ;" type="submit" name="saveandadd" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Save and Add New</button>
                
        </div>
     
            

              
          </fieldset> 

       
        </form>
      
 
 <?php   }else{

 redirect('../../errorpage/page_404.html');
 

}
?>
  

 
 