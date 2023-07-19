<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Riwayat_model extends CI_Model 
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function get_all_riwayat($id_dosen) {
		$this->db->where('fk_dosen', $id_dosen);
		$query = $this->db->get('riwayat');
		return $query->result_array();
	}
    
    public function insert_riwayat($data) {
        $this->db->insert('riwayat', $data);
        return $this->db->insert_id();
    }
    
    public function get_riwayat($id) {
        $this->db->where('id_riwayat', $id);
        $query = $this->db->get('riwayat');
        return $query->row_array();
    }
    
    public function update_riwayat($id, $data) {
        $this->db->where('id_riwayat', $id);
        $this->db->update('riwayat', $data);
    }              

	public function countAll($id_dosen){
		$this->db->where('fk_dosen', $id_dosen);
        $this->db->from('riwayat');
        return $this->db->count_all_results();
	}
}


/* End of file Riwayat_model.php and path \application\models\Riwayat_model.php */
