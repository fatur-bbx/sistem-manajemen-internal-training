<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_dokumentasi()
	{
		$query = $this->db->get('dokumentasi');
		return $query->result_array();
	}

	public function insert_dokumentasi($data)
	{
		$this->db->insert('dokumentasi', $data);
		return $this->db->insert_id();
	}

	public function get_dokumentasi($id)
	{
		$this->db->where('id_dokumentasi', $id);
		$query = $this->db->get('dokumentasi');
		return $query->row_array();
	}

	public function get_dokumentasi_training($id_training)
	{
		$this->db->where('fk_training', $id_training);
		$query = $this->db->get('dokumentasi');
		return $query->result_array();
	}

	public function update_dokumentasi($id, $data)
	{
		$this->db->where('id_dokumentasi', $id);
		$this->db->update('dokumentasi', $data);
	}

	public function delete_dokumentasi($id)
	{
		$this->db->where('id_dokumentasi', $id);
		$this->db->delete('dokumentasi');
	}

	public function countAll($id_dosen)
	{
		$this->db->where('fk_dosen', $id_dosen);
		$this->db->from('dokumentasi');
		return $this->db->count_all_results();
	}

	public function userDok($id_dosen)
	{
		$this->db->where('fk_dosen', $id_dosen);
		$query = $this->db->get('dokumentasi');
		return $query->result_array();
	}
}


/* End of file Dokumentasi_model.php and path \application\models\Dokumentasi_model.php */
