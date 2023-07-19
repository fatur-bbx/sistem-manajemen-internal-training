<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_peserta()
	{
		$query = $this->db->get('peserta');
		return $query->result_array();
	}

	public function insert_peserta($data)
	{
		$this->db->insert('peserta', $data);
		return $this->db->insert_id();
	}

	public function get_peserta($id)
	{
		$this->db->where('id_peserta', $id);
		$query = $this->db->get('peserta');
		return $query->row_array();
	}

	public function update_peserta($id, $data)
	{
		$this->db->where('id_peserta', $id);
		$this->db->update('peserta', $data);
	}

	public function isIkut($id_dosen, $id_training)
	{
		$this->db->where('fk_dosen', $id_dosen);
		$this->db->where('fk_training', $id_training);
		$query = $this->db->get('peserta');
		return $query->row_array();
	}

	public function count_peserta($id_training)
	{
		$this->db->where('fk_training', $id_training);
		$this->db->from('peserta');
		return $this->db->count_all_results();
	}

	public function notIn($id_training)
	{
		$sql = "SELECT id_peserta, dokumentasi.fk_training as fk_training, dokumentasi.fk_dosen as fk_dosen, id_dosen, nama_dosen, email_dosen, password_dosen, nip, isAdmin, isAccept FROM dosen JOIN peserta ON dosen.id_dosen = peserta.fk_dosen LEFT JOIN dokumentasi ON dosen.id_dosen = dokumentasi.fk_dosen WHERE peserta.fk_training = ? AND dokumentasi.id_dokumentasi IS NULL";
		$query = $this->db->query($sql, array($id_training));
		return $query->result_array();
	}
}


/* End of file Peserta_model.php and path \application\models\Peserta_model.php */
