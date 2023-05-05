<!-- Begin Page Content -->
<div class="container-fluid" style="height:800px; background-color: white;">
<ol class="breadcrumb" style="background-color: #3a3a3a;"> 
		<li class="breadcrumb-item">
			<a href="" style="color: white;">Detail Report E-Leave</a>
		</li>
		<li class="breadcrumb-item active" style="color: white;">Overview</li>
	</ol>
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1> -->

        
       
<style>
    .form-control:disabled, .form-control[readonly] {
    background-color: #fff6b5;
    opacity: 1;
}

.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #000000;
    background-color: #fff6b5;
    background-clip: padding-box;
    border: 1px solid #000000;
    border-radius: 0.35rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.col-form-label {
    padding-top: calc(0.375rem + 1px);
    padding-bottom: calc(0.375rem + 1px);
    margin-bottom: 0;
    font-size: inherit;
    line-height: 0;
}
</style>
    <!-- /.container-fluid -->
    <center>
        <p>
          <b>  .:: Detail Report E-Leave ::. </b>
        </p>
    </center>
    <hr>
    <div class="table-responsive" style="height:650px; width: 74rem; overflow-x:hidden;" >
    <fieldset>
        <center>
        <div class="col-lg-10 col-md-6">
            <div class="form-group row">
            <a style="color: black;"><b>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Nama ::.</p></b></a>
				<div class="col-sm-4">
                <u><input class="form-control form-control-user" type="input" class="form-control form-control-user" id="name" name="name" value="<?= $ecuti['name']; ?>" readonly></u>
				</div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group row">
                <a style="color: black;"><b>No. Badge : <p style="color: red; font-size:60%;" class="text-left">.:: No. Karyawan ::.</p></b></a>
				    <div class="col-sm-4">
                        <u><b><input type="input" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $ecuti['id_user']; ?>" readonly></b></u>
				    </div>
			    </div>
			</div>

            <div class="form-group row">
            <a style="color: black;"><b>Position/Dept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Jabatan/Dept ::.</p></b></a>
				<div class="col-sm-3">
                <b><u><input type="input" class="form-control form-control-user" id="id_dep" name="id_dep" value="<?= $ecuti['jabatan']; ?> / <?= $ecuti['jenis_departement']; ?>" readonly></u></b>
				</div>
			</div>

      <div class="form-group row">
      <a style="color: black;"><b>Entitled leave in &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Hak Cuti Tahun ::.</p></b></a>
				<div class="col-sm-2">
            <u><b><input type="text" class="form-control form-control-user" name="tahun_cuti" id="tahun_cuti" value="<?= date('Y'); ?>" readonly></b></u>
				</div>
			</div>

		<div class="form-group row">
    <a style="color: black;"><b>Type &nbsp;&ensp; &nbsp;&ensp;&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: tipe ::.</p></b></a>
            <div class="col-sm-2">
              <u><b><input type="text" class="form-control form-control-user" name="tipe" id="tipe" value="<?= $ecuti['tipe']; ?>" readonly></b></u>
			</div>
            <div class="col-sm-3" style="display:none" id="div_cuti">
                <select name="" id="" class="form-control">
                  <option value="">.:: ID Rest ::.</option>
                </select>
			</div>
		</div>

            <div class="form-group row">
            <a style="color: black;"><b>Previous leave taken : <p style="color: red; font-size:60%;" class="text-left">.:: Cuti yang telah diambil ::.</p></b></a>
				<div class="col-sm-1">
                <u><b><input type="input" class="form-control form-control-user" id="cuti_diambil" name="cuti_diambil" value="<?= $ecuti['cuti_diambil']; ?>" readonly></b></u>
				</div>
                <a style="color: black;"><b>Day/s <p style="color: red; font-size:60%;" class="text-left">.:: hari ::.</p></b></a>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <a style="color: black;"><b>Balance of leave : <p style="color: red; font-size:60%;" class="text-left">.:: sisa cuti ::.</p></b></a>
				<div class="col-sm-1">
                <b><u><input type="input" class="form-control form-control-user" id="sisa_cuti" name="sisa_cuti" value="<?= $ecuti['sisa_cuti']; ?>" readonly></u></b>
                </div>  
                <a style="color: black;"><b>Day/s <p style="color: red; font-size:60%;" class="text-left">.:: hari ::.</p></b></a>
			</div>

            <div class="form-group row">
            <a style="color: black;"><b>Leave will be taken : <p style="color: red; font-size:60%;" class="text-left">.:: Cuti yang diminta ::.</p></b></a>
                <div>
                  <hr>
                </div>
            </div>
            

            <div class="form-group row">
                  <a style="color: black;"><b>From : <p style="color: red; font-size:60%;" class="text-left">.:: Pilih tanggal ::.</p></b></a>
                <div class="col-sm-2">
                <u><b><input type="input" class="form-control form-control-user" id="start_date" name="start_date" value="<?=date('d M Y',strtotime($ecuti['start_date']))?>" readonly></b></u>
				          <!-- <input type="text" class="form-control date" placeholder="Pick the multiple dates" id="cuti_diminta" name="cuti_diminta[]"> -->
				        </div>
                <a style="color: black;"><b>Up To : <p style="color: red; font-size:60%;" class="text-left">.:: S/d ::.</p></b></a>
                <div class="col-sm-3">
                <u><b><input type="input" class="form-control form-control-user" id="end_date" name="end_date" value="<?=date('d M Y',strtotime($ecuti['end_date']))?>" readonly></b></u>
                </div>
                <div>
                <a style="color: black;"><b>Total Hari: <p style="color: red; font-size:60%;" class="text-left">.:: Total Hari ::.</p></b></a>
                </div>
                
                <!-- <div class="col-form-label">
                  <b>Total leave : <p style="color: red; font-size:60%;" class="text-left">.:: Total Cuti ::.</p></b>
                </div>
                &nbsp;&nbsp; -->
               
				        <div class="col-sm-1">
                        <b><u><input type="input" class="form-control form-control-user" id="jumlah" name="jumlah" value="<?= $ecuti['jumlah']; ?>" readonly></u></b>
                </div>  
                <a style="color: black;"><b>Day/s <p style="color: red; font-size:60%;" class="text-left">.:: hari ::.</p></b></a>
            </div> 

			<div class="form-group row">
      <a style="color: black;"><b>During on leave, the daily owrk will be delegated by &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <p style="color: red; font-size:60%;" class="text-left">.:: Selama cuti pekerjaan sehari-hari didelegasikan kepada ::.</p></b></a>
				<div class="col-sm-4">
            <?php foreach($delegasi as $dmce) : ?>
                <b><u><input type="input" class="form-control form-control-user" id="jumlah" name="jumlah" value="<?php echo $dmce->name; ?>" readonly></u></b><br>
            <?php endforeach; ?>
          </div>
			</div>

			<div class="form-group row">
      <a style="color: black;"><b>Address/phone number can be contacted during on leave : <p style="color: red; font-size:60%;" class="text-left">.:: Alamat/Nomor Telepon yang bisa dihubungi selama cuti ::.</p></b></a>
				<div class="col-sm-5">
				<u><textarea type="input" class="form-control form-control-user" id="no_telp" name="no_telp" value="" readonly><?= $ecuti['no_telp']; ?></textarea></u>
				</div>
			</div>
        <hr style="width: 30rem;">

        <div class="form-group row justify-content-end">
            <div class="col-lg-6">
<!-- APPROVE HOD -->
            <?php
          if($user['id_jabatan'] == 3 OR $user['id_jabatan'] == 46) { ?>
              <?php if ($ecuti['status'] == 'Request') { ?>
                  <a class="btn btn-success btn-sm" href="<?= base_url('cuti_karyawan/')?>">Kembali</a>
                  <a class="btn btn-success btn-sm btn-sm" data-toggle="modal" data-target="#approvehod" style="color: white;">Approve</a>
              <?php } ?>
              <?php if ($ecuti['status'] == 'Approve HOD') { ?>
                  <a class="btn btn-success btn-sm" href="<?= base_url('cuti_karyawan/')?>">Kembali</a>
             <!-- <a class="btn btn-success btn-sm btn-sm" data-toggle="modal" data-target="#approvehod" style="color: white;">Approve</a> -->
              <?php } ?>
              <?php if ($ecuti['status'] == 'Rejected HOD') { ?>
                  <a class="btn btn-success btn-sm" href="<?= base_url('cuti_karyawan/')?>">Kembali</a>
             <!-- <a class="btn btn-success btn-sm btn-sm" data-toggle="modal" data-target="#approvehod" style="color: white;">Approve</a> -->
              <?php } ?>
              <?php if ($ecuti['status'] == 'Approve HRD') { ?>
                  <a class="btn btn-success btn-sm" href="<?= base_url('cuti_karyawan/')?>">Kembali</a>
             <!-- <a class="btn btn-success btn-sm btn-sm" data-toggle="modal" data-target="#approvehod" style="color: white;">Approve</a> -->
              <?php } ?>
<!-- APPROVE GM -->
          <?php } elseif($user['id_jabatan'] == 10) { ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('cuti_karyawan/')?>">Kembali</a>
            <a class="btn btn-success btn-sm btn-sm" data-toggle="modal" data-target="#approvegm" style="color: white;">Approve</a>
<!-- APPROVE HRD -->
          <?php } elseif($user['id_jabatan'] == 30 OR $user['id_jabatan'] == 47) { ?>
            <a class="btn btn-success btn-sm" href="<?= base_url('adj_leave/')?>">Kembali</a>
            <!-- <a class="btn btn-success btn-sm btn-sm" data-toggle="modal" data-target="#approvehrd" style="color: white;">Approve</a> -->
            <!-- USER -->
          <?php } else {?>
            <a class="btn btn-success btn-sm" href="<?= base_url('cuti_karyawan/')?>">Kembali</a>
          <?php } ?>
            </div>
        </div>
        </center>
    </fieldset>
    </div>
</div>

<style>
  .row1 {
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.75rem;
    margin-left: 0.25rem;
}
</style>

<!-- MODAL  HOD -->
<div class='modal'  id='approvehod' tabindex="-1" role="dialog" aria-labelledby="newDepModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content" style="width: 24rem;">
  <div class="modal-header">
  <center>
    <h5 class="modal-title" id="newDepModalLabel" style="font-size: 14px;"><b>Approve Report E-Leave</b></h5>
  </center>  
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <form action="<?= base_url('cuti_karyawan_input/approvehod/'. $ecuti['id_cuti']); ?>" method="POST" enctype="multipart/form-data">
  <div class="modal-body">
      <div class="form-group row1">
        <a style="color: black;"><b>Approved? : <p style="color: red; font-size:60%;" class="text-left">.:: Setujui? ::.</p></b></a>
				  <div class="col-sm-6">
            <select name="status" id="status" class="form-control">
              <option value=""> --Pilih Status-- </option>
              <option value="Approve HOD">Approved</option>
						  <option value="Rejected HOD">Rejected</option>
            </select>
				  </div>
        </div>
  </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
           <input type="submit" class="btn btn-success btn-sm" value="save" name="save">
        </div>
  </form>
</div>
</div>
</div>

<!-- MODAL HRD -->
<div class='modal'  id='approvehrd' tabindex="-1" role="dialog" aria-labelledby="newDepModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content" style="width: 24rem;">
  <div class="modal-header">
  <center>
    <h5 class="modal-title" id="newDepModalLabel" style="font-size: 14px;"><b>Approve Report E-Leave</b></h5>
  </center>  
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <form action="<?= base_url('cuti_karyawan_input/approvehrd/'. $ecuti['id_cuti']); ?>" method="POST" enctype="multipart/form-data">
  <div class="modal-body">
      <div class="form-group row1">
        <a style="color: black;"><b>Approved? : <p style="color: red; font-size:60%;" class="text-left">.:: Setujui? ::.</p></b></a>
				  <div class="col-sm-6">
            <select name="status" id="status" class="form-control">
              <option value=""> --Pilih Status-- </option>
              <option value="Approve HRD">Approved</option>
						  <option value="Rejected HRD">Rejected</option>
            </select>
				  </div>
        </div>
  </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
           <input type="submit" class="btn btn-success btn-sm" value="save" name="save">
        </div>
  </form>
</div>
</div>
</div>

<!-- MODAL GENERAL MANAGER -->
<div class='modal'  id='approvegm' tabindex="-1" role="dialog" aria-labelledby="newDepModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content" style="width: 24rem;">
  <div class="modal-header">
  <center>
    <h5 class="modal-title" id="newDepModalLabel" style="font-size: 14px;"><b>Approve Report E-Leave</b></h5>
  </center>  
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <form action="<?= base_url('cuti_karyawan_input/approvegm/'. $ecuti['id_cuti']); ?>" method="POST" enctype="multipart/form-data">
  <div class="modal-body">
      <div class="form-group row1">
        <a style="color: black;"><b>Approved? : <p style="color: red; font-size:60%;" class="text-left">.:: Setujui? ::.</p></b></a>
				  <div class="col-sm-6">
            <select name="status" id="status" class="form-control">
              <option value=""> --Pilih Status-- </option>
              <option value="Approve BOD">Approved</option>
						  <option value="Rejected BOD">Rejected</option>
            </select>
				  </div>
        </div>
  </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
           <input type="submit" class="btn btn-success btn-sm" value="save" name="save">
        </div>
  </form>
</div>
</div>
</div>



<script src="<?= base_url('assets/'); ?>home/js/jquery-3.5.1.min.js"></script>
<!-- /.container-fluid -->
<script type="text/javascript">
	$(document).ready(function() {
		$("body").on("change", "#status", function(e) {
			if ($(this).val() == "In Progress") {
				$("#div_kendala").show();
			} else $("#div_kendala").hide();
		});
	});

    $(document).ready(function() {
		$("body").on("change", "#lampiran", function(e) {
			if ($(this).val() == "ya") {
				$("#div_attach").show();
			} else $("#div_attach").hide();
		});
	});

    function open_list_delegasi(id_cuti){
    $("#content_delegasi").html("progress...").load("<?php echo base_url()?>cuti_karyawan_input/detail_delegasi/"+id_cuti);
  }
</script>