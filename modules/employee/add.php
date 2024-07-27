


<!-- Content Header (Page header) -->
<section class="content-header" >
  <h1>
    Karyawan
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Tambahkan Karyawan Baru</li>
  </ol>
</section>
<hr>




    <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

  <fieldset>
             
   

            <div class="form-group">
            <div class="col-md-4">
              <label class="col-md-4 control-label" for=
              "fname">ID Karyawan:</label>

              <div class="col-md-8">
                <input name="deptid" type="hidden" value="">
                 <input id="upr" class="form-control input-sm" id="id" name="id" placeholder=
                    "Employee ID" type="number" value="" required>
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
                    "Nama Awal" type="text" value="" required>
              </div>
            </div>


             <div class="col-md-4">
              <label class="col-md-4 control-label" for=
              "lname">Nama Akhir:</label>

              <div class="col-md-8">
                <input name="deptid" type="hidden" value="">
                 <input id="upr" class="form-control input-sm" id="lname" name="lname" placeholder=
                    "Nama Akhir" type="text" value="" required>
              </div>
               </div>


               <div class="col-md-4">
              <label class="col-md-4 control-label" for=
              "jname">Jabatan:</label>

              <div class="col-md-8">
                <input name="deptid" type="hidden" value="">
                 <input id="uprall" maxlength="4" class="form-control input-sm" id="mname" name="mname" placeholder=
                    "Optional" type="text" value="">
              </div> 

          </div>


            <div class="col-md-4">
              <label class="col-md-4 control-label" for=
              "aname">Alamat:</label>

              <div class="col-md-8">
                <input name="address" type="hidden" value="">
                 <input id="upr" class="form-control input-sm" name="address" placeholder=
                    "Alamat" type="text" value="" required>
              </div>                                                                                                                                                      
            </div>
         
           
            <div class="col-md-4">
              <label class="col-md-4 control-label" for=
              "pass">Kontak:</label>

              <div class="col-md-8">
                <input name="contact" type="hidden" value="">
                 <input class="form-control input-sm" id="pass" name="contact" placeholder=
                    "Kontak" type="number" value="" required>
              </div>
            </div>
        
            <div class="col-md-4">
              <label class="col-md-4 control-label" for=
              "type">Bidang:</label>

              <div class="col-md-8">
               <select class="form-control input-sm" name="position" id="type">
               <option>Pilih Bidang</option>
               <option value="Sipil">Sipil</option>
               <option value="Keuangan">Keuangan</option>
               <option value="Pengadaan">Pengadaan</option>
               <option value="Inventor Kontrol & Gudang">Inventor Kontrol & Gudang</option>
               <option value="Rendal Pemeliharaan & Outage">Rendal Pemeliharaan & Outage</option>
               <option value="Pemeliharaan Mesin 1">Pemeliharaan Mesin 1</option>
               <option value="Pemeliharaan Mesin 2">Pemeliharaan Mesin 2</option>
                <option value="Lingkungan">Lingkungan</option>
                <option value="K3">K3</option>
                <option value="System Owner">System Owner</option>
                 
                
          
                </select> 
              </div>
            </div>
          </div>


 
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
              "image">Profile Pict:</label>

              <div class="col-md-8">
              
<input type="file" style=" font-size:19px; height:28.5px;  border: 1px solid #765942;border-radius: 10px; background:green; color:white;" name="uploaded_file" required/><br/>

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





