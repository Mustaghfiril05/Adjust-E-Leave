<!-- Begin Page Content -->
<style>
  body {
     background-color: #f9f9fa
 }

 .flex {
     -webkit-box-flex: 1;
     -ms-flex: 1 1 auto;
     flex: 1 1 auto
 }

 @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }

 .padding {
     padding: 5rem
 }

 .container {
     margin-top: 100px
 }

 .progress.progress-md {
     height: 5px
 }

 .template-demo .progress {
     margin-top: 1.5rem
 }

 .progress {
     border-radius: 10px;
     height: 10px
 }
</style>
<div class="container-fluid" style="background-color: white; height: 800px;">
<ol class="breadcrumb" style="background-color: #3a3a3a;"> 
            <li class="breadcrumb-item">
              <a href="" style="color: white;">List E-Leave</a>
            </li>
            <li class="breadcrumb-item active" style="color: white;">Overview</li>
          </ol>
<!-- Page Heading -->
<!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

  <?php if(validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
   <?php endif; ?>

   <?= $this->session->flashdata('message'); ?>
   <style>
    .card {
    flex: 1 1 auto;
    padding: 1.25rem;
    border-radius: 2rem;
    background-color: #ffffff;
}

.row1 {
    display: flex;
    flex-wrap: wrap;
    margin-right: -6.75rem;
    margin-left: -0.75rem;
    margin-bottom: 0rem;
}
   </style>

<!-- <form class="form-inline" method="get" action="<?= base_url('cuti_karyawan/index'); ?>"></form> -->
<div class="row1">
  <div class="col-xl-4 "> 
    <!-- <a class="btn btn-success btn-sm" href="<?= base_url('adj_leave_input/')?>">Adjust Cuti Baru</a> -->
  </div>
</div>


 <hr>
<div class="card shadow mb-4">
<div class="card-header py-1" style="background-color:#000000;">
</div>
<div class="card-body" style="height:37rem; width:auto;">
<div class="table-responsive" style="height:35rem;">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="20%" >
<thead class="thead">
<tr >
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Tanggal Pembuatan</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Status</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">No. Badge</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Name</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Department</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Cuti yang Di minta</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Tahun Cuti</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Delegasi</th>
      <th scope="col" class='text-center' style="color:black; font-size: 14px;">Action</th> 
  </tr>
</thead>
<tbody>
  <?php 
  if( ! empty($ecuti)){
  foreach ($ecuti as $d) : ?>
    <tr>
        <td class='text-center' style="color:black; font-size: 14px;"><?=date('d M Y',strtotime($d['tanggal_pembuatan']))?></td>
        <td class='text-center' style="color:black; font-size: 14px;">
        <?php
          if($d['status'] == 'Request') {
           ?>
           <span class="badge badge-warning">Request</span>
          <?php }?>

          <?php
          if($d['status'] == 'Approve HOD') {
           ?>
           <span class="badge badge-success">Approved HOD</span>
          <?php }?>

          <?php
          if($d['status'] == 'Approve BOD') {
           ?>
           <span class="badge badge-primary">Approve BOD</span>
          <?php }?>

          <?php
          if($d['status'] == 'Approve HRD') {
           ?>
           <span class="badge badge-primary">Approve HRD</span>
          <?php }?>

          <?php
          if($d['status'] == 'Rejected HOD') {
           ?>
           <span class="badge badge-danger">Rejected HOD</span>
          <?php }?>

          <?php
          if($d['status'] == 'Rejected BOD') {
           ?>
           <span class="badge badge-danger">Rejected BOD</span>
          <?php }?>

          <?php
          if($d['status'] == 'Rejected HRD') {
           ?>
           <span class="badge badge-danger">Rejected HRD</span>
          <?php }?>

        </td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['id_user']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['name']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['jenis_departement']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;">
        <a href="" onclick="open_list_wmr('<?php echo  $d['id_cuti']?>')" class="badge badge-info" data-toggle="modal" data-target="#edit">
        <?= $d['jumlah'];?> Hari</a></td>
        <td class='text-center' style="color:black; font-size: 14px;"><?= $d['tahun']; ?></td>
        <td class='text-center' style="color:black; font-size: 14px;">
        <a href="" onclick="open_list_delegasi('<?php echo  $d['id_cuti']?>')" class="badge badge-danger" data-toggle="modal" data-target="#edit1">
        <?php
            // $nm['wmr'] = $nm['wmr'];
            echo count(explode(",",$d['delegasi'])). " Orang";
        ?>
        </a>
      </td>
        <td class='text-center' style="color: black; font-size: 14px;">
          <a class="badge badge-success" title="Detail & Progress" href="<?= base_url('adj_leave/detail_adj_leave/') . $d['id_cuti']; ?>"><i class="fas fa-eye"></i></a>
          <!-- <a class="badge badge-warning" title="Finish Report" data-toggle="modal" data-target="#edit<?php echo $d['id_cuti']; ?>"><i class="fa fa-list"></i></a> -->
          <!-- <a class="badge badge-info" title="Print Report" href="<?= base_url('cuti_karyawan/cetak_cuti_karyawan/') . $d['id_cuti']; ?>"><i class="fa fa-print"></i></a> -->
          <!-- <a class="badge badge-danger" title="Resend Mail" href="<?= base_url('resend_mail/index/') . $d['id_cuti']; ?>"><i class="fas fa-paper-plane"></i></a> -->
          <!-- <a class="btn btn-success btn-sm btn-sm" href="<?= base_url('cuti_karyawan/edit_cuti_karyawan/') . $d['id_cuti']; ?>"><i class="fas fa-pen"></i></a> -->
        </td>
    </tr>
<?php endforeach; ?>
<?php } ?>

</tbody>
</table>	
 </div>
</div>

<div class='modal'  id='edit' tabindex="-1" role="dialog" aria-labelledby="newDepModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content" style="width: 24rem;">
  <div class="modal-header">
  <center>
    <h5 class="modal-title" id="newDepModalLabel"><b style="font-size: 14px; text-align:center;">Detail Tanggal Cuti</b></h5>
  </center>  
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body" id="content_wmr">
  </div>
</div>
</div>
</div>

<div class='modal'  id='edit1' tabindex="-1" role="dialog" aria-labelledby="newDepModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
  <center>
    <h5 class="modal-title" id="newDepModalLabel" style="font-size: 14px;"><b>Detail Delegasi</b></h5>
  </center>  
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body" id="content_delegasi">
  </div>
</div>
</div>
</div>
</div>
</div>
  </div>

<script src="<?= base_url('assets/'); ?>home/js/jquery-3.5.1.min.js"></script>
<!-- /.container-fluid -->
<script type="text/javascript">
	$("#id_departement").change(function(){
		load_pic_departemen($(this).val());
	});
	function load_pic_departemen(id_departemen){
		$.ajax({
	        url: "cuti_karyawan/pic_per_departemen/"+id_departemen,	       
	        success: function(response) {
	          $("#div_pic").html(response);
	        }
      });
	}

  function open_list_wmr(id_cuti){
    $("#content_wmr").html("progress...").load("<?php echo base_url()?>cuti_karyawan_input/detail_jumlah/"+id_cuti);
  }

  function open_list_delegasi(id_cuti){
    $("#content_delegasi").html("progress...").load("<?php echo base_url()?>cuti_karyawan_input/detail_delegasi/"+id_cuti);
  }
</script>




