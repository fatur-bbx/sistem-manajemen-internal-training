<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Dosen_model extends CI_Model 
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function get_all_dosen()
	{
		$query = $this->db->get('dosen');
		return $query->result_array();
	}
    
    public function insert_dosen($data) {
        $this->db->insert('dosen', $data);
        return $this->db->insert_id();
    }
    
    public function get_dosen($id) {
        $this->db->where('id_dosen', $id);
        $query = $this->db->get('dosen');
        return $query->result_array();
    }
    
    public function update_dosen($id, $data) {
        $this->db->where('id_dosen', $id);
        $this->db->update('dosen', $data);
    }

	public function login($email, $password){
		$this->db->where('email_dosen', $email);
		$this->db->where('password_dosen', $password);
		$this->db->where('isAccept', 1);
		$query = $this->db->get('dosen');
		return $query->row_array();
	}
}


/* End of file Dosen_model.php and path \application\models\Dosen_model.php */
