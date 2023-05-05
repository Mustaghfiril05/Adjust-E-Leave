<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class check_report_model extends CI_Model
{

	public function getCheckReport()
	{

		$query = " SELECT * FROM nearmiss";

		return $this->db->query($query)->result_array();
	}


	public function getCheckReportByPic($id_dep)
	{

		$query = " SELECT * FROM nearmiss where id_departement=".$id_dep;

		return $this->db->query($query)->result_array();
	}

	public function getUseradj($id_dep)
	{

		$query = " SELECT * FROM user where id_dep=".$id_dep;

		return $this->db->query($query)->result_array();
	}

	public function getMasterAbsensi()
	{

		$query = " SELECT * FROM user ";

		return $this->db->query($query)->result_array();
	}

	public function getComplaintByPic()
	{

		$query = " SELECT * FROM complaint_ticket";

		return $this->db->query($query)->result_array();
	}

	
	public function getCheckLaporanReport()
	{

		$query = " SELECT * FROM m_user ";

		return $this->db->query($query)->result_array();
	}
}