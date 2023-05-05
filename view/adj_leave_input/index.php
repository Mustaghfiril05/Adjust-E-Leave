<!-- Begin Page Content -->
<div class="container-fluid" style="height:800px; background-color: white; ">
<ol class="breadcrumb" style="background-color: #3a3a3a;">
		<li class="breadcrumb-item">
			<a style="color: white;">Create Adjust E-Leave</a>
		</li>
		<li class="breadcrumb-item active" style="color: white;">Overview</li>
	</ol>
	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
<hr>
	<?php if (validation_errors()) : ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
	<?php endif; ?>

	<?= $this->session->flashdata('message'); ?>
	<style>
    textarea.form-control {
    height: 6rem;
}
	.vscomp-toggle-button{
		border-radius: 11px;
	}

	.form-control {
		border-radius: 11px;
		border: 1px solid #00000040;
	}
</style>
<style>
	.vscomp-toggle-button {
    align-items: center;
    background-color: #fff;
    border: 1px solid #ddd;
    cursor: pointer;
    display: flex;
    padding: 7px 30px 7px 10px;
    position: relative;
    width: 100%;
	border-radius: 11px;
	}

	.vscomp-wrapper {
    color: #333;
    display: inline-flex;
    flex-wrap: wrap;
    font-family: sans-serif;
    font-size: 14px;
    position: relative;
    text-align: left;
    width: 320px
}

	textarea.form-control {
    height: 7rem;
}

input[type=file]::file-selector-button {
  margin-right: 10px;
  border: none;
  background: #606060;
  padding: 2px 6px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

input[type=file]::file-selector-button:hover {
  background: #0d45a5;
}

 .col-lg-6{
    position: relative;
    width: 100%;
    padding-right: 0.75rem;
    padding-left: 4.75rem;
}
</style>



	<center>
        <p>
          <b>  .:: Create Report <a style="color: #2b9d48;">Adjust</a> E-Leave ::. </b>
        </p>
    </center>
    <hr style="width: 20rem;">
	<?= form_open_multipart('adj_leave_input'); ?>

	<div class="table-responsive" style="height:650px; width: 74rem; overflow-x:hidden;" >
    <fieldset>
    <center>
         <div class="col-lg-10 col-md-6">
         <div class="form-group row">
                <a style="color: black;"><b>No. Badge &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: No. Karyawan ::.</p></b></a>
				    <div class="col-sm-4">
              <select name="id_user" id="id_user" class="form-control" required>
						        <option value=""> .:: No. Badge ::. </option>
						    <?php foreach ($userr as $d) : ?>
						        <option value="<?= $d['id_user']; ?>#<?= $d['name']; ?>#<?= $d['email']; ?>|<?= $d['id_jabatan']; ?>#<?= $d['jabatan']; ?>|<?= $d['id_dep']; ?>#<?= $d['jenis_departement']; ?>"><?= $d['id_user']; ?></option>
					        <?php endforeach; ?>
					    </select>
				    </div>
			     </div>
            <div class="form-group row">
            <a style="color: black;"><b>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&nbsp;&ensp;: <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Nama ::.</p></b></a>
				<div class="col-sm-4">
              <input name="name" id="name" class="form-control"  type="text" readonly>
				</div>&nbsp;
        <div class="col-sm-4">
              <input name="email" id="email" class="form-control"  type="text" readonly>
				</div>
			  </div>

      <div class="form-group row">
        <a style="color: black;"><b>Position/Dept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Jabatan/Dept ::.</p></b></a>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="jabatan" id="jabatan" readonly>
            <input type="hidden" class="form-control" name="id_jabatan" id="id_jabatan" readonly>
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="departement" id="departement" readonly>
            <input type="hidden" class="form-control" name="id_dep" id="id_dep" readonly>
				</div>
			</div>

      <div class="form-group row">
      <a style="color: black;"><b>Entitled leave in &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;: <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Hak Cuti Tahun ::.</p></b></a>
				<div class="col-sm-3">
            <!-- <input type="text" class="form-control form-control-user" name="tahun_cuti" id="tahun_cuti" value="<?= date('Y'); ?>" readonly> -->
            <select name="tahun_cuti" id="tahun_cuti" class="form-control" required>
						      <option value=""> .:: Choose Year ::. </option>
					          <?php foreach ($tahuncuti as $l) : ?>
						      <option value="<?= $l['id_tahun_cuti']; ?>"><?= $l['tahun']; ?></option>
					          <?php endforeach; ?>
				    </select>
				</div>
			</div>

      <div class="form-group row">
      <a style="color: black;"><b>Submission Date &ensp;&nbsp;&ensp;&ensp;: <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Tanggal Pembuatan ::.</p></b></a>
				<div class="col-sm-3">
            <input type="date" class="form-control form-control-user" name="tanggal_pembuatan" id="tanggal_pembuatan" required>
				</div>
			</div>

			  <div class="form-group row">
          <a style="color: black;"><b>Type &nbsp;&ensp; &nbsp;&ensp;&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;: <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: tipe ::.</p></b></a>
            <div class="col-sm-2">
                <select name="tipe" id="tipe" class="form-control" required>
                  <option value="">.:: Type ::.</option>
                  <option value="Cuti">Cuti</option>
                </select>
				  </div>
            <!-- <div class="col-sm-3" style="display:none" id="div_cuti">
                <select name="" id="" class="form-control">
                  <option value="">.:: ID Rest ::.</option>
                </select>
				    </div> -->
			  </div>

            <div class="form-group row">
        <a style="color: black;"><b>Previous leave taken : <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Cuti yang telah diambil ::.</p></b></a>
        <div class="col-sm-1">
                <input type="text" class="form-control form-control-user" id="cuti_diambil" name="cuti_diambil" readonly>
				</div>
               
                <a style="color: black;"><b>Day/s <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: hari ::.</p></b></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a style="color: black;"><b>Balance of leave : <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: sisa cuti ::.</p></b></a>
        <div class="col-sm-1">
                <input type="text" class="form-control form-control-user" id="sisa_cuti" name="sisa_cuti" readonly> 
                </div>  
                <a style="color: black;"><b>Day/s <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: hari ::.</p></b></a>
			</div>

            <div class="form-group row">
                <a style="color: black;"><b>Leave will be taken : <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Cuti yang diminta ::.</p></b></a>
                <div>
                  <hr>
                </div>
            </div>
            

            <div class="form-group row">
                  <a style="color: black;"><b>From : <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Pilih tanggal ::.</p></b></a>
                <div class="col-sm-3">
                  <input type="date" class="form-control form-control-user" id="start_date" name="start_date" required>
				          <!-- <input type="text" class="form-control date" placeholder="Pick the multiple dates" id="cuti_diminta" name="cuti_diminta[]"> -->
				        </div>
                <a style="color: black;"><b>Up To : <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: S/d ::.</p></b></a>
                <div class="col-sm-3">
                  <input type="date" class="form-control form-control-user" id="end_date" name="end_date" onchange="getDays()" required>
                </div>
                <div>
                <a style="color: black;"><b>Total Hari: <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Total Hari ::.</p></b></a>
                </div>
                
                <!-- <div class="col-form-label">
                  <b>Total leave : <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Total Cuti ::.</p></b>
                </div>
                &nbsp;&nbsp; -->
               
				        <div class="col-sm-1">
                <input type="text" class="form-control form-control-user" id="jumlah" name="jumlah" readonly> 
                </div>  
                <a style="color: black;"><b>Day/s <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: hari ::.</p></b></a>
            </div> 

			<!-- <div class="form-group row">
        <a style="color: black;"><b>During on leave, the daily owrk will be delegated by &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Selama cuti pekerjaan sehari-hari didelegasikan kepada ::.</p></b></a>
        <div class="col-sm-3">
            <select id=multipleSelect multiple name="delegasi[]" placeholder=".:: Delegated For ::." data-search="false" data-silent-initial-value-set="true">
						 <?php foreach ($delegasi as $l) : ?>
							<option value="<?= $l['id_user']; ?>"><?= $l['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div> -->

    <div class="form-group row">
        <a style="color: black;"><b>During on leave, the daily owrk will be delegated by &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Selama cuti pekerjaan sehari-hari didelegasikan kepada ::.</p></b></a>
        <div class="col-sm-3">
            <select id=multipleSelect multiple name="delegasi[]" placeholder=".:: Delegated For ::." data-search="false" data-silent-initial-value-set="true" required>
						<?php foreach ($userr as $l) : ?>
							<option value="<?= $l['id_user']; ?>"><?= $l['name']; ?></option>
						<?php endforeach; ?> 
					</select>
				</div>
			</div>

			<div class="form-group row">
        <a style="color: black;"><b>Address/phone number can be contacted during on leave : <p style="color: #2b9d48; font-size:60%;" class="text-left">.:: Alamat/Nomor Telepon yang bisa dihubungi selama cuti ::.</p></b></a>
        <div class="col-sm-5">
				<textarea type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Ketik Disini...." required></textarea>
				</div>
			</div>
                   <hr>             
      <div class="form-group ">
				<div class="col-sm-3">
					<button type="submit" class="btn btn-success  btn-block">Submit</button>
				</div>
			</div>
</center>
	</fieldset>
	</div>

	</form>
	<br>
</div>
</div>

<script src="<?= base_url('assets/'); ?>home/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>home/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>virtual-select-master/dist/virtual-select.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-1.8.3.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<!-- /.container-fluid -->
<script type="text/javascript">
	$(document).ready(function() {
		$("body").on("change", "#tipe", function(e) {
			if ($(this).val() == "Rest") {
				$("#div_cuti").show();
			} else $("#div_cuti").hide();
		});
	});
</script>



<script>
  $(document).ready(function(){
      setTimeout(function(){
        $('#id_user').select2();
        $('#id_user').on("select2:select", function(e) { 
          var id = e.params.data.id;
          load_user(id);
        });
      },100);
      
  });
  var id_global=0;
	function load_user(id){
    var split_badge = id.split("|");
    var split_nama = split_badge[0].split("#");
    var split_email = split_badge[0].split("#");
    var id = split_nama[0];
    var nama = split_nama[1];
    var email = split_email[2];
    var split_jabatan = split_badge[1].split("#");
    var id_jabatan = split_jabatan[0];
    var jabatan = split_jabatan[1];
    var split_departemen = split_badge[2].split("#");
    var id_dep = split_departemen[0];
    var departemen = split_departemen[1];
    id_global=id;
    $("#name").val(nama);
    $("#email").val(email);
    $("#jabatan").val(jabatan);
    $("#id_jabatan").val(id_jabatan);
    $("#departement").val(departemen);
    $("#id_dep").val(id_dep);
	}

  $("#tahun_cuti").change(function(){
		load_check_leave($(this).val(),id_global);
	});
	function load_check_leave(tahun_cuti, id){
		$.ajax({
      url: "adj_leave_input/leave_check_cuti/"+tahun_cuti +'/'+id_global, 	       
        success: function(response) {
         var cuti =jQuery.parseJSON(response);
         $("#cuti_diambil").val(cuti.diambil['diambil']);
         $("#sisa_cuti").val(cuti.sisacuti['sisacuti']);
         console.log(response.id_cuti);
         // $("#cuti_diambil").html(response);
        }
      });
	}
</script>





<script>
	var expanded = false;
	function showCheckboxes(){
		var checkboxes = document.getElementById("box");
		if(!expanded){
			checkboxes.style.display = "block";
			expanded = true;
		} else{
			checkboxes.style.display = "none";
			expanded = false;
		}
	}
</script>

<script>
 
	VirtualSelect.init({ 
  ele: '#multipleSelect' 
});

$('.date').datepicker({
  multidate: true,
	format: 'dd-mm-yyyy'
});
</script>

<script>
  function calculateDays(){
    var start_date= document.f=getElementById(start_date).value;
    var end_date= document.f=getElementById(end_date).value;
    const dateOne = new Date(start_date);
    const dateTwo = new Date(end_date);
    const time = Math.abs(dateTwo - dateOne);
    const days = Math.ceil(time / (1000 * 60 * 60 * 24));
    document.getElementById("jumlah").innerHTML=days;
    }
</script>

<script>
  function getDays(){
 var start_date = new Date(document.getElementById('start_date').value);
    var end_date = new Date(document.getElementById('end_date').value);
    //Here we will use getTime() function to get the time difference
    var time_difference = (end_date.getTime()+86400000) - start_date.getTime();
    //Here we will divide the above time difference by the no of miliseconds in a day
    var days_difference = time_difference / (1000*3600*24);
    //alert(days);
    document.getElementById('jumlah').value = days_difference;
  }
</script>

<script>

</script> 