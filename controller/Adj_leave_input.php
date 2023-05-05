
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require_once('vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Adj_leave_input extends CI_Controller 
{

public function index($id_dep=0)

	{
		$session = $this->session->get_userdata();
		$id_user = $session['id_user'];
		$id_dep = $session['id_dep'];

		$data['title'] = 'Adjust E-Leave';
		$data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();
		$this->load->model('Check_report_model','username');

		$current_date = date("Y");
		$data['jumlah_user'] = $this->db->query(" SELECT
													CASE WHEN jumlah is null THEN 0 
													ELSE SUM(jumlah) END  AS cuti_yang_diambil
													FROM cuti 
													WHERE id_user = '$id_user'
													AND tahun_cuti = '$current_date'
													AND status = 'Approve HRD'
													AND tipe ='cuti'")->row_array();

		$current_date = date("Y");
		$data['sisa_cuti'] = $this->db->query(" SELECT 12 -
											CASE WHEN jumlah is null THEN 0 
											ELSE SUM(jumlah) END  AS sisa_cuti
											FROM cuti 
											WHERE id_user = '$id_user'
											AND tahun_cuti = '$current_date'
											AND status = 'Approve HRD'
											AND tipe ='cuti'")->row_array();	

		$user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where_in('id_user');
		$list_delegasi = $this->db->get()->result();

		$data['inventaris'] = $this->db->get('inventaris')->result_array();
		$data['lokasi'] = $this->db->get('m_lokasi')->result_array();
		$data['daily_routine'] = $this->db->get('dailyroutine')->result_array();
		$data['userr'] = $this->username->getUseradj($id_dep);
		// $data['userr'] = $this->db->get('user')->result_array();
		$data['device'] = $this->db->get('device')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();
		$data['kontraktor'] = $this->db->get('kontraktor')->result_array();
		$data['klasifikasi'] = $this->db->get('klasifikasi')->result_array();
		$data['inv'] = $this->db->get('inv')->result_array();
        $data['dpt'] = $this->db->query("SELECT * FROM departement where jenis_departement not in ('management','empty')")->result_array();
		$data['admin'] = $this->db->query("SELECT * FROM user where rule ='IT'")->result_array();
		$data['tahuncuti'] = $this->db->query("SELECT * FROM tahun_cuti where tahun AND status in ('1')")->result_array();

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('id_user','Id_User','required');
		$this->form_validation->set_rules('id_dep','Id_Dep','required');
		$this->form_validation->set_rules('id_jabatan','Id_Jabatan','required');
		$this->form_validation->set_rules('tahun_cuti','Tahun_Cuti','required');
		$this->form_validation->set_rules('tipe','Tipe','required');
		$this->form_validation->set_rules('cuti_diambil','Cuti_Diambil');
		$this->form_validation->set_rules('start_date','Start_date');
		$this->form_validation->set_rules('end_date','End_Date');
		$this->form_validation->set_rules('tanggal_pembuatan','Tanggal_Pembuatan');
		$this->form_validation->set_rules('sisa_cuti','Sisa_Cuti','required');
		$this->form_validation->set_rules('cuti_diminta','Cuti_Diminta');
		$this->form_validation->set_rules('jumlah','Jumlah','required');
		$this->form_validation->set_rules('delegasi','Delegasi');
		$this->form_validation->set_rules('no_telp','No_Telp');
		$this->form_validation->set_rules('reason','Reason');

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('adj_leave_input/index', $data);
			$this->load->view('templates/footer');		
		} else {
// insert PGA
		if($user['id_jabatan'] == 30 OR $user['id_jabatan'] == 47) {
			$data = [
				'name' => $this->input->post('name'),
				'id_user' => $this->input->post('id_user'),
				'id_dep' => $this->input->post('id_dep'),
				'id_jabatan' => $this->input->post('id_jabatan'),
				'tahun_cuti' => $this->input->post('tahun_cuti'),
				'tipe' => $this->input->post('tipe'),
				'cuti_diambil' => $this->input->post('cuti_diambil'),
				'start_date' =>	 date('Y-m-d', strtotime($this->input->post('start_date'))),
				'end_date' =>	 date('Y-m-d', strtotime($this->input->post('end_date'))),
				'tanggal_pembuatan' =>	 date('Y-m-d', strtotime($this->input->post('tanggal_pembuatan'))),
				'sisa_cuti' => $this->input->post('sisa_cuti'),
				'jumlah' => $this->input->post('jumlah'),
				'no_telp' => $this->input->post('no_telp'),
				'reason' => $this->input->post('reason'),
				'status' => 'Approve HRD'
		   ];
// insert Manager & SPRD		   
		} elseif ($user['id_jabatan'] == 3 OR $user['id_jabatan'] == 46) {
			$data = [
				'name' => $this->input->post('name'),
				'id_user' => $this->input->post('id_user'),
				'id_dep' => $this->input->post('id_dep'),
				'id_jabatan' => $this->input->post('id_jabatan'),
				'tahun_cuti' => $this->input->post('tahun_cuti'),
				'tipe' => $this->input->post('tipe'),
				'cuti_diambil' => $this->input->post('cuti_diambil'),
				'start_date' =>	 date('Y-m-d', strtotime($this->input->post('start_date'))),
				'end_date' =>	 date('Y-m-d', strtotime($this->input->post('end_date'))),
				'tanggal_pembuatan' =>	 date('Y-m-d', strtotime($this->input->post('tanggal_pembuatan'))),
				'sisa_cuti' => $this->input->post('sisa_cuti'),
				'jumlah' => $this->input->post('jumlah'),
				'no_telp' => $this->input->post('no_telp'),
				'reason' => $this->input->post('reason'),
				'status' => 'Approve HOD'
		   ];
// insert SPV		   
		} elseif ($user['id_jabatan'] == 6) {
			$data = [
				'name' => $this->input->post('name'),
				'id_user' => $this->input->post('id_user'),
				'id_dep' => $this->input->post('id_dep'),
				'id_jabatan' => $this->input->post('id_jabatan'),
				'tahun_cuti' => $this->input->post('tahun_cuti'),
				'tipe' => $this->input->post('tipe'),
				'cuti_diambil' => $this->input->post('cuti_diambil'),
				'start_date' =>	 date('Y-m-d', strtotime($this->input->post('start_date'))),
				'end_date' =>	 date('Y-m-d', strtotime($this->input->post('end_date'))),
				'tanggal_pembuatan' =>	 date('Y-m-d', strtotime($this->input->post('tanggal_pembuatan'))),
				'sisa_cuti' => $this->input->post('sisa_cuti'),
				'jumlah' => $this->input->post('jumlah'),
				'no_telp' => $this->input->post('no_telp'),
				'reason' => $this->input->post('reason'),
				'status' => 'Request'
		   ];
}

			$id_cuti = $this->input->post('id_cuti');
			$id_user = $this->input->post('id_user');
			$id_dep = $this->input->post('id_dep');
			$id_jabatan = $this->input->post('id_jabatan');
			$start_date = $this->input->post('start_date');
		    $end_date = $this->input->post('end_date');
		    $sisa_cuti = $this->input->post('sisa_cuti');
		    $jumlah = $this->input->post('jumlah');
		    $no_telp = $this->input->post('no_telp');
		 
		   $current_date = date("Y-m-d");
		   $delegasi = $_POST['delegasi'];
		   if (is_array($_POST['delegasi']))
       			 {
        		$delegasi = implode(", ", $_POST['delegasi']);
				$this->db->set('delegasi', $delegasi);
        	}
			$action_adjust_by = $this->db->set('action_adjust_by', $id_user);
			$action_adjust_date = $this->db->set('action_adjust_date', $current_date);

// echo ($delegasi);

		// $cuti_diminta = $_POST['cuti_diminta'];
			// if (is_array($_POST['cuti_diminta']))
       		// 	 {
        	// 	$cuti_diminta = implode(", ", $_POST['cuti_diminta']);
			// 	$this->db->set('cuti_diminta', $cuti_diminta);
        	// }
			// ($cuti_diminta);

			// die($upload_file);
// print_r($data); die();
			 $this->db->insert('cuti', $data, $delegasi, $action_adjust_by, $action_adjust_date);


			 $id_cuti = $this->db->insert_id();
			 $name = $this->db->get_where('cuti', ['id_cuti' => $id_cuti])->row()->name;
			 $no_badge = $this->db->get_where('m_user', ['id_user' => $id_user])->row()->id_user;
			 $jabatan = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row()->jabatan;
			 $department = $this->db->get_where('departement', ['id_dep' => $id_dep])->row()->jenis_departement;
			 $tahun_cuti = $this->db->get_where('cuti', ['id_cuti' => $id_cuti])->row()->tahun_cuti;
			 $tahun = $this->db->get_where('ecuti', ['id_cuti' => $id_cuti])->row()->tahun;
			 $tipe = $this->db->get_where('cuti', ['id_cuti' => $id_cuti])->row()->tipe;
			 $tanggal_pembuatan = $this->db->get_where('cuti', ['id_cuti' => $id_cuti])->row()->tanggal_pembuatan;
			 $status = $this->db->get_where('cuti', ['id_cuti' => $id_cuti])->row()->status;
			 $cuti_diambil = $this->db->get_where('cuti', ['id_cuti' => $id_cuti])->row()->cuti_diambil;
			 $email = $this->db->query("SELECT email FROM user WHERE id_jabatan in('3','46') AND id_dep = '$id_dep' ")->result_array();
			// print_r($email);
			// $mail =array();
			foreach ($email as $to) {
				$mail[] = implode(", ",$to);
			}
			$email = implode(", ", $mail);
			$to = $email;	
			// echo ($to);

			$this->notify_mail( $to, 
								$id_cuti, 
								$name, 
								$no_badge, 
								$jabatan, 
								$department, 
								$tahun_cuti, 
								$tahun, 
								$tipe, 
								$tanggal_pembuatan, 
								$status, 
								$cuti_diambil, 
								$start_date, 
								$end_date, 
								$sisa_cuti, 
								$jumlah, 
								$no_telp, 
								$delegasi 
								);

			 $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You Success Create Adjustment E-Leave!</div>');
			redirect('cuti_karyawan');
		}
	}

public function notify_mail($to, 
								$id_cuti,
								$name, 
								$no_badge, 
								$jabatan, 
								$department, 
								$tahun_cuti, 
								$tahun, 
								$tipe, 
								$tanggal_pembuatan, 
								$status, 
								$cuti_diambil, 
								$start_date, 
								$end_date, 
								$sisa_cuti, 
								$jumlah, 
								$no_telp, 
								$delegasi){

	$session = $this->session->get_userdata();
	$id_user = $session['id_user'];
	$data['user'] = $this->db->get_where('m_user', ['username' => 
	$this->session->userdata('username')])->row_array();
									
							
	$user = $this->db->get_where('m_user',['id_user' => $id_user])->row_array();
	// $this->load->library('phpmailer_library');
	// $mail = $this->phpmailer_library->load();
	$mail = new PHPMailer(true);
	// $mail = new Exception();
	// $mail->SMTPDebug = 2;                               // Enable verbose debug output
	$mail->isSMTP();                                     
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                              
	$mail->Username = 'teamesystem@gmail.com';                 
	$mail->Password = 'itbfogutktnrfwfu';                           
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = 465;                                    
	$mail->isHTML(true); 
	

	$delegasi = $this->db->get_where('ecuti', ['id_cuti' => $id_cuti])->row()->delegasi;
			$arr_delegasi = explode(',',$delegasi);
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where_in('id_user',$arr_delegasi);
			$list_delegasi = $this->db->get()->result();

	foreach($list_delegasi as $dmce) :
	$mailContent = 
		"<center>*******************************************************************************************************</br>
		<center><b>.:: Form E-Leave ::.</b></center>
		*******************************************************************************************************
		<table>

		  <tr>
			<td>Nama</td>
			<td>:</td>
			<td>".$name."</td>
		  </tr>

		  <tr>
			<td>No. Badge</td>
			<td>:</td>
			<td>".$no_badge."</td>
		  </tr>

		  <tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>".$jabatan."</td>
		  </tr>

		  <tr>
			<td>Department</td>
			<td>:</td>
			<td>".$department."</td>
		  </tr>

		  <tr>
			<td>Tahun Cuti</td>
			<td>:</td>
			<td>".$tahun."</td>
		  </tr>

		  <tr>
			<td>Tipe</td>
			<td>:</td>
			<td>".$tipe."</td>
		  </tr>

		  <tr>
			<td>Cuti Yang Telah Diambil</td>
			<td>:</td>
			<td>".$cuti_diambil." Hari</td>
		  </tr>

		  <tr>
			<td>Sisa Cuti</td>
			<td>:</td>
			<td>".$sisa_cuti." Hari</td>
		  </tr>

		  <tr>
			<td>Cuti Yang Diminta</td>
			<td>:</td>
			<td>".$jumlah." Hari</td>
		  </tr>

		  <tr>
			<td>Dari Tanggal</td>
			<td>:</td>
			<td>".date('d M Y',strtotime($start_date))."</td>
		  </tr>

		  <tr>
			<td>Sampai Tanggal</td>
			<td>:</td>
			<td>".date('d M Y',strtotime($end_date))."</td>
		  </tr>

		  <tr>
			<td>No/Alamat Yang Bisa Dihubungi</td>
			<td>:</td>
			<td>".$no_telp."</td>
		  </tr>
		  
		  <tr>
			<td>Delegasi</td>
			<td>:</td>
			<td>".$dmce->name."</td>
		  </tr>
		  <tr>
		 
			<td>Status</td>
			<td>:</td>
			<td>".$status."</td>
		  </tr>
		  <tr>
			<td>Tanggal Pembuatan</td>
			<td>:</td>
			<td>".$tanggal_pembuatan."</td>
		  </tr>

		</table>
		*******************************************************************************************************
		<p>Terima kasih telah membuat request cuti pada website.</br>
		Mohon untuk segera cek Request cuti diatas melalui website. Klik link berikut. <a href='http://192.168.10.50/esistem/'></a></p>
		*******************************************************************************************************</center>";	
	endforeach;
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	//end custom code

		$mail->setFrom('teamesystem@gmail.com','E-System E-Leave');
		if($user['id_jabatan'] == 6) {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
			// $addresses = explode(',', $to);                
			// foreach ($addresses as $address) {
    		// 	$mail->addAddress($address);
			// }

			// $addresses = explode(',', $to);                
			// foreach ($addresses as $address) {
			// 	$mail->addReplyTo($address);
			// }
			$mail->Subject = ('E-Leave | ALP E-System');
			$mail->Body    = ($mailContent);
		} 
		
		if($user['id_jabatan'] == 46 OR $user['id_jabatan'] == 3) {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
			$mail->Subject = ('E-Leave | ALP E-System');
			$mail->Body    = ($mailContent);
		} 

		if($user['id_jabatan'] == 47 OR $user['id_jabatan'] == 30) {
			$mail->addAddress('dekfiral@gmail.com');
			$mail->addReplyTo('dekfiral@gmail.com');
			$mail->Subject = ('E-Leave | ALP E-System');
			$mail->Body    = ($mailContent);
		} 
	
		if(!$mail->Send()) {
		// echo "Mailer Error: " . $mail->ErrorInfo;
		// echo $mail->print_debugger();
	 } else {
		// echo "Message has been sent";
		// echo $mail->print_debugger();
	 }
}

public function leave_check_cuti($tahun_cuti, $id=0){

		$data['diambil'] = $this->db->query(" SELECT
													CASE WHEN jumlah is null THEN 0 
													ELSE SUM(jumlah) END  AS diambil
													FROM ecuti 
													WHERE id_user = '$id'
													AND tahun_cuti = '$tahun_cuti'
													AND status = 'Approve HRD'
													AND tipe ='cuti'")->row_array();
		//echo $this->db->last_query();	
		$data['sisacuti'] = $this->db->query(" SELECT 12 -
													CASE WHEN jumlah is null THEN 0 
													ELSE SUM(jumlah) END  AS sisacuti
													FROM ecuti 
													WHERE id_user = '$id'
													AND tahun_cuti = '$tahun_cuti'
													AND status = 'Approve HRD'
													AND tipe ='cuti'")->row_array();

		//echo $this->db->last_query();		// die($tahun_cuti);
		echo json_encode($data);
}

public function load_user($id_dep=0){


	$this->db->where('id_dep',$id_dep);
	$this->db->select('*');
	$this->db->from('user');
	$result =  $this->db->get()->result_array();
	$option = '';
	foreach($result as $r){
		$option .="<option value='".$r['id_user']."'>".$r['name']."</option>";
	}
	// $input = "<select name='delegasi[]' id='multipleSelect' multiple data-search='false' data-silent-initial-value-set='true'>".$option."</select>"; 
	echo $option;
	// echo json_encode($option);
}

  
}