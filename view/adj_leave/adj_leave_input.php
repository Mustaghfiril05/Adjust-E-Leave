<!-- Begin Page Content -->
<div class="container-fluid" style="height:800px; background-color: white; ">
<ol class="breadcrumb" style="background-color: #3a3a3a;">
		<li class="breadcrumb-item">
			<a style="color: white;">Create E-Leave</a>
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
	.datepicker {
  padding: 4px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  direction: ltr;
}
.datepicker-inline {
  width: 220px;
}
.datepicker.datepicker-rtl {
  direction: rtl;
}
.datepicker.datepicker-rtl table tr td span {
  float: right;
}
.datepicker-dropdown {
  top: 0;
  left: 0;
}
.datepicker-dropdown:before {
  content: '';
  display: inline-block;
  border-left: 7px solid transparent;
  border-right: 7px solid transparent;
  border-bottom: 7px solid #999999;
  border-top: 0;
  border-bottom-color: rgba(0, 0, 0, 0.2);
  position: absolute;
}
.datepicker-dropdown:after {
  content: '';
  display: inline-block;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 6px solid #ffffff;
  border-top: 0;
  position: absolute;
}
.datepicker-dropdown.datepicker-orient-left:before {
  left: 6px;
}
.datepicker-dropdown.datepicker-orient-left:after {
  left: 7px;
}
.datepicker-dropdown.datepicker-orient-right:before {
  right: 6px;
}
.datepicker-dropdown.datepicker-orient-right:after {
  right: 7px;
}
.datepicker-dropdown.datepicker-orient-bottom:before {
  top: -7px;
}
.datepicker-dropdown.datepicker-orient-bottom:after {
  top: -6px;
}
.datepicker-dropdown.datepicker-orient-top:before {
  bottom: -7px;
  border-bottom: 0;
  border-top: 7px solid #999999;
}
.datepicker-dropdown.datepicker-orient-top:after {
  bottom: -6px;
  border-bottom: 0;
  border-top: 6px solid #ffffff;
}
.datepicker > div {
  display: none;
}
.datepicker table {
  margin: 0;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.datepicker td,
.datepicker th {
  text-align: center;
  width: 20px;
  height: 20px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  border: none;
}
.table-striped .datepicker table tr td,
.table-striped .datepicker table tr th {
  background-color: transparent;
}
.datepicker table tr td.day:hover,
.datepicker table tr td.day.focused {
  background: #eeeeee;
  cursor: pointer;
}
.datepicker table tr td.old,
.datepicker table tr td.new {
  color: #999999;
}
.datepicker table tr td.disabled,
.datepicker table tr td.disabled:hover {
  background: none;
  color: #999999;
  cursor: default;
}
.datepicker table tr td.highlighted {
  background: #d9edf7;
  border-radius: 0;
}
.datepicker table tr td.today,
.datepicker table tr td.today:hover,
.datepicker table tr td.today.disabled,
.datepicker table tr td.today.disabled:hover {
  background-color: #fde19a;
  background-image: -moz-linear-gradient(to bottom, #fdd49a, #fdf59a);
  background-image: -ms-linear-gradient(to bottom, #fdd49a, #fdf59a);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fdd49a), to(#fdf59a));
  background-image: -webkit-linear-gradient(to bottom, #fdd49a, #fdf59a);
  background-image: -o-linear-gradient(to bottom, #fdd49a, #fdf59a);
  background-image: linear-gradient(to bottom, #fdd49a, #fdf59a);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fdd49a', endColorstr='#fdf59a', GradientType=0);
  border-color: #fdf59a #fdf59a #fbed50;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  color: #000;
}
.datepicker table tr td.today:hover,
.datepicker table tr td.today:hover:hover,
.datepicker table tr td.today.disabled:hover,
.datepicker table tr td.today.disabled:hover:hover,
.datepicker table tr td.today:active,
.datepicker table tr td.today:hover:active,
.datepicker table tr td.today.disabled:active,
.datepicker table tr td.today.disabled:hover:active,
.datepicker table tr td.today.active,
.datepicker table tr td.today:hover.active,
.datepicker table tr td.today.disabled.active,
.datepicker table tr td.today.disabled:hover.active,
.datepicker table tr td.today.disabled,
.datepicker table tr td.today:hover.disabled,
.datepicker table tr td.today.disabled.disabled,
.datepicker table tr td.today.disabled:hover.disabled,
.datepicker table tr td.today[disabled],
.datepicker table tr td.today:hover[disabled],
.datepicker table tr td.today.disabled[disabled],
.datepicker table tr td.today.disabled:hover[disabled] {
  background-color: #fdf59a;
}
.datepicker table tr td.today:active,
.datepicker table tr td.today:hover:active,
.datepicker table tr td.today.disabled:active,
.datepicker table tr td.today.disabled:hover:active,
.datepicker table tr td.today.active,
.datepicker table tr td.today:hover.active,
.datepicker table tr td.today.disabled.active,
.datepicker table tr td.today.disabled:hover.active {
  background-color: #fbf069 \9;
}
.datepicker table tr td.today:hover:hover {
  color: #000;
}
.datepicker table tr td.today.active:hover {
  color: #fff;
}
.datepicker table tr td.range,
.datepicker table tr td.range:hover,
.datepicker table tr td.range.disabled,
.datepicker table tr td.range.disabled:hover {
  background: #eeeeee;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
}
.datepicker table tr td.range.today,
.datepicker table tr td.range.today:hover,
.datepicker table tr td.range.today.disabled,
.datepicker table tr td.range.today.disabled:hover {
  background-color: #f3d17a;
  background-image: -moz-linear-gradient(to bottom, #f3c17a, #f3e97a);
  background-image: -ms-linear-gradient(to bottom, #f3c17a, #f3e97a);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f3c17a), to(#f3e97a));
  background-image: -webkit-linear-gradient(to bottom, #f3c17a, #f3e97a);
  background-image: -o-linear-gradient(to bottom, #f3c17a, #f3e97a);
  background-image: linear-gradient(to bottom, #f3c17a, #f3e97a);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3c17a', endColorstr='#f3e97a', GradientType=0);
  border-color: #f3e97a #f3e97a #edde34;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
}
.datepicker table tr td.range.today:hover,
.datepicker table tr td.range.today:hover:hover,
.datepicker table tr td.range.today.disabled:hover,
.datepicker table tr td.range.today.disabled:hover:hover,
.datepicker table tr td.range.today:active,
.datepicker table tr td.range.today:hover:active,
.datepicker table tr td.range.today.disabled:active,
.datepicker table tr td.range.today.disabled:hover:active,
.datepicker table tr td.range.today.active,
.datepicker table tr td.range.today:hover.active,
.datepicker table tr td.range.today.disabled.active,
.datepicker table tr td.range.today.disabled:hover.active,
.datepicker table tr td.range.today.disabled,
.datepicker table tr td.range.today:hover.disabled,
.datepicker table tr td.range.today.disabled.disabled,
.datepicker table tr td.range.today.disabled:hover.disabled,
.datepicker table tr td.range.today[disabled],
.datepicker table tr td.range.today:hover[disabled],
.datepicker table tr td.range.today.disabled[disabled],
.datepicker table tr td.range.today.disabled:hover[disabled] {
  background-color: #f3e97a;
}
.datepicker table tr td.range.today:active,
.datepicker table tr td.range.today:hover:active,
.datepicker table tr td.range.today.disabled:active,
.datepicker table tr td.range.today.disabled:hover:active,
.datepicker table tr td.range.today.active,
.datepicker table tr td.range.today:hover.active,
.datepicker table tr td.range.today.disabled.active,
.datepicker table tr td.range.today.disabled:hover.active {
  background-color: #efe24b \9;
}
.datepicker table tr td.selected,
.datepicker table tr td.selected:hover,
.datepicker table tr td.selected.disabled,
.datepicker table tr td.selected.disabled:hover {
  background-color: #9e9e9e;
  background-image: -moz-linear-gradient(to bottom, #b3b3b3, #808080);
  background-image: -ms-linear-gradient(to bottom, #b3b3b3, #808080);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#b3b3b3), to(#808080));
  background-image: -webkit-linear-gradient(to bottom, #b3b3b3, #808080);
  background-image: -o-linear-gradient(to bottom, #b3b3b3, #808080);
  background-image: linear-gradient(to bottom, #b3b3b3, #808080);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b3b3b3', endColorstr='#808080', GradientType=0);
  border-color: #808080 #808080 #595959;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.datepicker table tr td.selected:hover,
.datepicker table tr td.selected:hover:hover,
.datepicker table tr td.selected.disabled:hover,
.datepicker table tr td.selected.disabled:hover:hover,
.datepicker table tr td.selected:active,
.datepicker table tr td.selected:hover:active,
.datepicker table tr td.selected.disabled:active,
.datepicker table tr td.selected.disabled:hover:active,
.datepicker table tr td.selected.active,
.datepicker table tr td.selected:hover.active,
.datepicker table tr td.selected.disabled.active,
.datepicker table tr td.selected.disabled:hover.active,
.datepicker table tr td.selected.disabled,
.datepicker table tr td.selected:hover.disabled,
.datepicker table tr td.selected.disabled.disabled,
.datepicker table tr td.selected.disabled:hover.disabled,
.datepicker table tr td.selected[disabled],
.datepicker table tr td.selected:hover[disabled],
.datepicker table tr td.selected.disabled[disabled],
.datepicker table tr td.selected.disabled:hover[disabled] {
  background-color: #808080;
}
.datepicker table tr td.selected:active,
.datepicker table tr td.selected:hover:active,
.datepicker table tr td.selected.disabled:active,
.datepicker table tr td.selected.disabled:hover:active,
.datepicker table tr td.selected.active,
.datepicker table tr td.selected:hover.active,
.datepicker table tr td.selected.disabled.active,
.datepicker table tr td.selected.disabled:hover.active {
  background-color: #666666 \9;
}
.datepicker table tr td.active,
.datepicker table tr td.active:hover,
.datepicker table tr td.active.disabled,
.datepicker table tr td.active.disabled:hover {
  background-color: #006dcc;
  background-image: -moz-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -ms-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
  background-image: -webkit-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -o-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: linear-gradient(to bottom, #0088cc, #0044cc);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
  border-color: #0044cc #0044cc #002a80;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.datepicker table tr td.active:hover,
.datepicker table tr td.active:hover:hover,
.datepicker table tr td.active.disabled:hover,
.datepicker table tr td.active.disabled:hover:hover,
.datepicker table tr td.active:active,
.datepicker table tr td.active:hover:active,
.datepicker table tr td.active.disabled:active,
.datepicker table tr td.active.disabled:hover:active,
.datepicker table tr td.active.active,
.datepicker table tr td.active:hover.active,
.datepicker table tr td.active.disabled.active,
.datepicker table tr td.active.disabled:hover.active,
.datepicker table tr td.active.disabled,
.datepicker table tr td.active:hover.disabled,
.datepicker table tr td.active.disabled.disabled,
.datepicker table tr td.active.disabled:hover.disabled,
.datepicker table tr td.active[disabled],
.datepicker table tr td.active:hover[disabled],
.datepicker table tr td.active.disabled[disabled],
.datepicker table tr td.active.disabled:hover[disabled] {
  background-color: #0044cc;
}
.datepicker table tr td.active:active,
.datepicker table tr td.active:hover:active,
.datepicker table tr td.active.disabled:active,
.datepicker table tr td.active.disabled:hover:active,
.datepicker table tr td.active.active,
.datepicker table tr td.active:hover.active,
.datepicker table tr td.active.disabled.active,
.datepicker table tr td.active.disabled:hover.active {
  background-color: #003399 \9;
}
.datepicker table tr td span {
  display: block;
  width: 23%;
  height: 54px;
  line-height: 54px;
  float: left;
  margin: 1%;
  cursor: pointer;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.datepicker table tr td span:hover {
  background: #eeeeee;
}
.datepicker table tr td span.disabled,
.datepicker table tr td span.disabled:hover {
  background: none;
  color: #999999;
  cursor: default;
}
.datepicker table tr td span.active,
.datepicker table tr td span.active:hover,
.datepicker table tr td span.active.disabled,
.datepicker table tr td span.active.disabled:hover {
  background-color: #006dcc;
  background-image: -moz-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -ms-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
  background-image: -webkit-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -o-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: linear-gradient(to bottom, #0088cc, #0044cc);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
  border-color: #0044cc #0044cc #002a80;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.datepicker table tr td span.active:hover,
.datepicker table tr td span.active:hover:hover,
.datepicker table tr td span.active.disabled:hover,
.datepicker table tr td span.active.disabled:hover:hover,
.datepicker table tr td span.active:active,
.datepicker table tr td span.active:hover:active,
.datepicker table tr td span.active.disabled:active,
.datepicker table tr td span.active.disabled:hover:active,
.datepicker table tr td span.active.active,
.datepicker table tr td span.active:hover.active,
.datepicker table tr td span.active.disabled.active,
.datepicker table tr td span.active.disabled:hover.active,
.datepicker table tr td span.active.disabled,
.datepicker table tr td span.active:hover.disabled,
.datepicker table tr td span.active.disabled.disabled,
.datepicker table tr td span.active.disabled:hover.disabled,
.datepicker table tr td span.active[disabled],
.datepicker table tr td span.active:hover[disabled],
.datepicker table tr td span.active.disabled[disabled],
.datepicker table tr td span.active.disabled:hover[disabled] {
  background-color: #0044cc;
}
.datepicker table tr td span.active:active,
.datepicker table tr td span.active:hover:active,
.datepicker table tr td span.active.disabled:active,
.datepicker table tr td span.active.disabled:hover:active,
.datepicker table tr td span.active.active,
.datepicker table tr td span.active:hover.active,
.datepicker table tr td span.active.disabled.active,
.datepicker table tr td span.active.disabled:hover.active {
  background-color: #003399 \9;
}
.datepicker table tr td span.old,
.datepicker table tr td span.new {
  color: #999999;
}
.datepicker .datepicker-switch {
  width: 145px;
}
.datepicker .datepicker-switch,
.datepicker .prev,
.datepicker .next,
.datepicker tfoot tr th {
  cursor: pointer;
}
.datepicker .datepicker-switch:hover,
.datepicker .prev:hover,
.datepicker .next:hover,
.datepicker tfoot tr th:hover {
  background: #eeeeee;
}
.datepicker .cw {
  font-size: 10px;
  width: 12px;
  padding: 0 2px 0 5px;
  vertical-align: middle;
}
.input-append.date .add-on,
.input-prepend.date .add-on {
  cursor: pointer;
}
.input-append.date .add-on i,
.input-prepend.date .add-on i {
  margin-top: 3px;
}
.input-daterange input {
  text-align: center;
}
.input-daterange input:first-child {
  -webkit-border-radius: 3px 0 0 3px;
  -moz-border-radius: 3px 0 0 3px;
  border-radius: 3px 0 0 3px;
}
.input-daterange input:last-child {
  -webkit-border-radius: 0 3px 3px 0;
  -moz-border-radius: 0 3px 3px 0;
  border-radius: 0 3px 3px 0;
}
.input-daterange .add-on {
  display: inline-block;
  width: auto;
  min-width: 16px;
  height: 18px;
  padding: 4px 5px;
  font-weight: normal;
  line-height: 18px;
  text-align: center;
  text-shadow: 0 1px 0 #ffffff;
  vertical-align: middle;
  background-color: #eeeeee;
  border: 1px solid #ccc;
  margin-left: -5px;
  margin-right: -5px;
}

.col-form-label {
    padding-top: calc(0.375rem + 1px);
    padding-bottom: calc(0.375rem + 1px);
    margin-bottom: 0;
    font-size: inherit;
    line-height: 0;
}
</style>

	<center>
        <p>
          <b>  .:: Create Report E-Leave ::. </b>
        </p>
    </center>
    <hr style="width: 20rem;">
	<?= form_open_multipart('adj_leave/adj_leave_input'); ?>

	<div class="table-responsive" style="height:650px; width: 74rem; overflow-x:hidden;" >
    <fieldset>
    <center>
         <div class="col-lg-10 col-md-6">
            <div class="form-group row">
            <a style="color: black;"><b>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Nama ::.</p></b></a>
				<div class="col-sm-4">
                <select name="name" id="name" class="form-control">
						            <option value=""> .:: Select Name ::. </option>
						          <?php foreach ($userr as $d) : ?>
							          <option value="<?= $d['id_user']; ?>"><?= $d['name']; ?></option>
						          <?php endforeach; ?>
					      </select>
				</div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group row">
                <a style="color: black;"><b>No. Badge : <p style="color: red; font-size:60%;" class="text-left">.:: No. Karyawan ::.</p></b></a>
				           <div class="col-sm-6" >
                    <div id="div_no">
                      <input type="input" class="form-control form-control-user" id="id_user" name="id_user" placeholder=".:: No. Bagde ::." readonly>
                    </div>
				           </div>
			          </div>
			  </div>

      <div class="form-group row">
        <a style="color: black;"><b>Position/Dept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: Jabatan/Dept ::.</p></b></a>
        <div class="col-sm-3">
            <select name="id_jabatan" id="id_jabatan" class="form-control" readonly>
			  			<?php foreach ($jabatan as $r) : ?>
							<?php if( $r['id_jabatan'] == $user['id_jabatan'] ) : ?>
				  		<option value="<?= $r['id_jabatan']; ?>" selected> <?= $r['jabatan']; ?></option>
							<?php else : ?>
				  		<option disabled value="<?= $r['id_jabatan']; ?>"><?= $r['jabatan']; ?></option>
							<?php endif ; ?>
			  			<?php endforeach; ?>  
					  </select>
        </div>
        <div class="col-sm-3">
            <select name="id_dep" id="id_dep" class="form-control" readonly>
			  			<?php foreach ($departement as $r) : ?>
							<?php if( $r['id_dep'] == $user['id_dep'] ) : ?>
				  		<option value="<?= $r['id_dep']; ?>" selected> <?= $r['jenis_departement']; ?></option>>
							<?php else : ?>
				  		<option disabled value="<?= $r['id_dep']; ?>"><?= $r['jenis_departement']; ?></option>
							<?php endif ; ?>
			  			<?php endforeach; ?>  
					  </select>
				</div>
			</div>

      <div class="form-group row">
      <a style="color: black;"><b>Entitled leave in &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ensp;: <p style="color: red; font-size:60%;" class="text-left">.:: Hak Cuti Tahun ::.</p></b></a>
				<div class="col-sm-2">
            <input type="text" class="form-control form-control-user" name="tahun_cuti" id="tahun_cuti" value="<?= date('Y'); ?>" readonly>
				</div>
			</div>

			  <div class="form-group row">
          <a style="color: black;"><b>Type &nbsp;&ensp; &nbsp;&ensp;&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;: <p style="color: red; font-size:60%;" class="text-left">.:: tipe ::.</p></b></a>
            <div class="col-sm-2">
                <select name="tipe" id="tipe" class="form-control">
                  <option value="">.:: Type ::.</option>
                  <option value="Cuti">Cuti</option>
                  <option value="Rest">Rest</option>
                </select>
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
                <input type="text" class="form-control form-control-user" id="cuti_diambil" name="cuti_diambil" value="<?= number_format($jumlah_user['cuti_yang_diambil']); ?>" readonly>
				</div>
               
                <a style="color: black;"><b>Day/s <p style="color: red; font-size:60%;" class="text-left">.:: hari ::.</p></b></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a style="color: black;"><b>Balance of leave : <p style="color: red; font-size:60%;" class="text-left">.:: sisa cuti ::.</p></b></a>
        <div class="col-sm-1">
                <input type="text" class="form-control form-control-user" id="sisa_cuti" name="sisa_cuti"  value="<?= number_format($sisa_cuti['sisa_cuti']); ?>" readonly> 
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
                <div class="col-sm-3">
                  <input type="date" class="form-control form-control-user" id="start_date" name="start_date">
				          <!-- <input type="text" class="form-control date" placeholder="Pick the multiple dates" id="cuti_diminta" name="cuti_diminta[]"> -->
				        </div>
                <a style="color: black;"><b>Up To : <p style="color: red; font-size:60%;" class="text-left">.:: S/d ::.</p></b></a>
                <div class="col-sm-3">
                  <input type="date" class="form-control form-control-user" id="end_date" name="end_date" onchange="getDays()">
                </div>
                <div>
                <a style="color: black;"><b>Total Hari: <p style="color: red; font-size:60%;" class="text-left">.:: Total Hari ::.</p></b></a>
                </div>
                
                <!-- <div class="col-form-label">
                  <b>Total leave : <p style="color: red; font-size:60%;" class="text-left">.:: Total Cuti ::.</p></b>
                </div>
                &nbsp;&nbsp; -->
               
				        <div class="col-sm-1">
                <input type="text" class="form-control form-control-user" id="jumlah" name="jumlah" readonly> 
                </div>  
                <a style="color: black;"><b>Day/s <p style="color: red; font-size:60%;" class="text-left">.:: hari ::.</p></b></a>
            </div> 

			<div class="form-group row">
        <a style="color: black;"><b>During on leave, the daily owrk will be delegated by &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <p style="color: red; font-size:60%;" class="text-left">.:: Selama cuti pekerjaan sehari-hari didelegasikan kepada ::.</p></b></a>
        <div class="col-sm-3">
                	<select id=multipleSelect multiple name="delegasi[]" placeholder=".:: Delegated For ::." data-search="false" data-silent-initial-value-set="true">
						<?php foreach ($userr as $l) : ?>
							<option value="<?= $l['id_user']; ?>"><?= $l['username']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
        <a style="color: black;"><b>Address/phone number can be contacted during on leave : <p style="color: red; font-size:60%;" class="text-left">.:: Alamat/Nomor Telepon yang bisa dihubungi selama cuti ::.</p></b></a>
        <div class="col-sm-5">
				<textarea type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Ketik Disini...."></textarea>
				</div>
			</div>

			<!-- <div class="form-group row">
			  <strong for="no_telp" class="col-form-label">Reason Leave : <p style="color: red; font-size:60%;" class="text-left">.:: Alasan Cuti ::.</p></strong>
				<div class="col-sm-5">
				<textarea type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Ketik Disini...."></textarea>
				</div>
			</div> -->

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
	
	$("#name").change(function(){
		load_no_per_user($(this).val());
	});
	function load_no_per_user(name){
		$.ajax({
	        url: "adj_leave/no_per_user/"+name,	       
	        success: function(response) {
	          $("#div_no").html(response);
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
    var time_difference = end_date.getTime() - start_date.getTime();
    //Here we will divide the above time difference by the no of miliseconds in a day
    var days_difference = time_difference / (1000*3600*24);
    //alert(days);
    document.getElementById('jumlah').value = days_difference;
  }
</script>
