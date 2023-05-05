
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require_once('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Adj_leave extends CI_Controller 
{

public function index()
	{

		$session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
		$id_user = $session['id_user'];
		// $id_jabatan = $session['id_jabatan'];

		$data['title'] = 'Adjust E-Leave';
		$data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['inventaris'] = $this->db->get('inventaris')->result_array();
		// $data['ecuti'] = $this->db->get('ecuti')->result_array();
		$data['daily_routine'] = $this->db->get('dailyroutine')->result_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['device'] = $this->db->get('device')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['admin'] = $this->db->query("SELECT * FROM user where rule ='admin'")->result_array();

		$this->load->model('List_cuti_model');

		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $url_export = 'cuti_karyawan/export?filter=1&tanggal='.$tgl;
                $ecuti = $this->List_cuti_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di List_cuti_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $url_export = 'cuti_karyawan/export?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $ecuti = $this->List_cuti_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di List_cuti_model
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $url_export = 'cuti_karyawan/export?filter=3&tahun='.$tahun;
                $ecuti = $this->List_cuti_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di List_cuti_model
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $url_export = 'cuti_karyawan/export';
            $ecuti = $this->List_cuti_model->view_all(); // Panggil fungsi view_all yang ada di List_cuti_model
        }
		$data['url_export'] = base_url($url_export);
		$data['ecuti'] = $ecuti;
        $data['option_tahun'] = $this->List_cuti_model->option_tahun();
		$data['progress'] = $this->db->get('m_progress')->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('adj_leave/index', $data);
			$this->load->view('templates/footer');		
	}

	public function export($id_cuti=0){
		$this->load->model('List_cuti_model');

        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $ecuti = $this->List_cuti_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di List_cuti_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $ecuti = $this->List_cuti_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di List_cuti_model
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $ecuti = $this->List_cuti_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di List_cuti_model
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ecuti = $this->List_cuti_model->view_all(); // Panggil fungsi view_all yang ada di List_cuti_model
        }
		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
		          ->setCellValue('A1', 'NO. BADGE')
		          ->setCellValue('B1', 'NAMA')
		          ->setCellValue('C1', 'DEPARTMENT')
		          ->setCellValue('D1', 'TIPE')
		          ->setCellValue('E1', 'TAHUN CUTI')
		          ->setCellValue('F1', 'CUTI YANG TELAH DIAMBIL')
		          ->setCellValue('G1', 'SISA CUTI')
		          ->setCellValue('H1', 'CUTI YANG DIMINTA')
		          ->setCellValue('I1', 'DELEGASI')
		          ->setCellValue('J1', 'DARI TANGGAL')
		          ->setCellValue('K1', 'SAMPAI TANGGAL')
		          ->setCellValue('L1', 'NO/ALAMAT YANG BISA DIHUBUNGI')
		          ->setCellValue('M1', 'TANGGAL PEMBUATAN');

		$kolom = 2;
		$nomor = 1;
		
		foreach($ecuti as $cuti) {
			$spreadsheet->setActiveSheetIndex(0)
			// ->setCellValue('A' . $kolom, $nomor)
			->setCellValue('A' . $kolom, '#'.$cuti['id_user'])
			->setCellValue('B' . $kolom, $cuti['name'])
			->setCellValue('C' . $kolom, $cuti['jenis_departement'])
			->setCellValue('D' . $kolom, $cuti['tipe'])
			->setCellValue('E' . $kolom, $cuti['tahun_cuti'])
			->setCellValue('F' . $kolom, $cuti['cuti_diambil'])
			->setCellValue('G' . $kolom, $cuti['sisa_cuti'])
			->setCellValue('H' . $kolom, $cuti['jumlah'])
			->setCellValue('I' . $kolom, $cuti['delegasi'])
			->setCellValue('J' . $kolom, date('d M Y',strtotime($cuti['start_date'])))
			->setCellValue('K' . $kolom, date('d M Y',strtotime($cuti['end_date'])))
			->setCellValue('L' . $kolom, $cuti['no_telp'])
			->setCellValue('M' . $kolom, $cuti['tanggal_pembuatan']);

		   $kolom++;
		   $nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="E-Leave_'.date('Y_m_d_H_i_s').'_.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
		
	}

    public function adj_leave_input()
	{
		$session = $this->session->get_userdata();
		$id_dep = $session['id_dep'];
		$id_user = $session['id_user'];

		$data['title'] = 'E- Leave';
		$data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

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
		$data['inventaris'] = $this->db->get('inventaris')->result_array();
		$data['lokasi'] = $this->db->get('m_lokasi')->result_array();
		$data['daily_routine'] = $this->db->get('dailyroutine')->result_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['device'] = $this->db->get('device')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();
		$data['kontraktor'] = $this->db->get('kontraktor')->result_array();
		$data['klasifikasi'] = $this->db->get('klasifikasi')->result_array();
		$data['inv'] = $this->db->get('inv')->result_array();
        $data['dpt'] = $this->db->query("SELECT * FROM departement where jenis_departement not in ('management','empty')")->result_array();
		$data['admin'] = $this->db->query("SELECT * FROM user where rule ='IT'")->result_array();

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('id_user','Id_User','required');
		$this->form_validation->set_rules('id_dep','Id_Dep','required');
		$this->form_validation->set_rules('id_jabatan','Id_Jabatan','required');
		$this->form_validation->set_rules('tahun_cuti','Tahun_Cuti','required');
		$this->form_validation->set_rules('tipe','Tipe','required');
		$this->form_validation->set_rules('cuti_diambil','Cuti_Diambil');
		$this->form_validation->set_rules('start_date','Start_date');
		$this->form_validation->set_rules('end_date','End_Date');
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
			$this->load->view('adj_leave/adj_leave_input', $data);
			$this->load->view('templates/footer');		
		} else {

			if ($user['id_jabatan'] == 30 OR $user['id_jabatan'] == 47) {
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
				'sisa_cuti' => $this->input->post('sisa_cuti'),
				'jumlah' => $this->input->post('jumlah'),
				'no_telp' => $this->input->post('no_telp'),
				'reason' => $this->input->post('reason'),
				'status' => 'Approve HRD'
		   ];
			}else {
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
					'sisa_cuti' => $this->input->post('sisa_cuti'),
					'jumlah' => $this->input->post('jumlah'),
					'no_telp' => $this->input->post('no_telp'),
					'reason' => $this->input->post('reason'),
					'status' => 'Request'
			   ];
			}
		   $delegasi = $_POST['delegasi'];
		   if (is_array($_POST['delegasi']))
       			 {
        		$delegasi = implode(", ", $_POST['delegasi']);
				$this->db->set('delegasi', $delegasi);
        	}

			echo ($delegasi);

			// $cuti_diminta = $_POST['cuti_diminta'];
			// if (is_array($_POST['cuti_diminta']))
       		// 	 {
        	// 	$cuti_diminta = implode(", ", $_POST['cuti_diminta']);
			// 	$this->db->set('cuti_diminta', $cuti_diminta);
        	// }
			// ($cuti_diminta);

			// die($upload_file);
			 $this->db->insert('cuti', $data, $delegasi);
			 $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You Success Create E-Leave!</div>');
			redirect('adj_leave');
		}
	}

	public function keterangan_perklasifikasi($klasifikasi){
		$this->db->where('id_klasifikasi',$klasifikasi);
		$this->db->select('*');
		$this->db->from('klasifikasi');
		$result =  $this->db->get()->result_array();
		$option = "";
		foreach($result as $r){
			$option .="<option value='".$r['id_klasifikasi']."'>".$r['keterangan_klasifikasi']."</option>";
		}
		$select ="<p style='color:red; font-size:12px;' ".$option."</p>"; 
		echo $select;
	}

	public function detail_adj_leave($id_cuti=null)
    {
        $data['title'] = 'Detail E-Leave';
        $data['user'] = $this->db->get_where('m_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$delegasi = $this->db->get_where('ecuti', ['id_cuti' => $id_cuti])->row()->delegasi;
		$arr_delegasi = explode(',',$delegasi);
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where_in('id_user',$arr_delegasi);
		$list_delegasi = $this->db->get()->result();
		
		$data['delegasi'] = $list_delegasi;
		$data['ecuti'] = $this->db->get_where('ecuti', ['id_cuti' => $id_cuti])->row_array();
		$data['userr'] = $this->db->get('user')->result_array();
		$data['cuti'] = $this->db->get('ecuti')->result_array();
		$data['departement'] = $this->db->get('departement')->result_array();

		

        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('adj_leave/detail_adj_leave', $data);
        $this->load->view('templates/footer');
    }

	
}