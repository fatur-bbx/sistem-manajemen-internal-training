<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Training_model extends CI_Model 
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
	public function get_all_training() {
		$query = $this->db->get('training');
		return $query->result_array();
	}	

    public function insert_training($data) {
        $this->db->insert('training', $data);
        return $this->db->insert_id();
    }
    
    public function get_training($id) {
        $this->db->where('id_training', $id);
        $query = $this->db->get('training');
        return $query->row_array();
    }
    
    public function update_training($id, $data) {
        $this->db->where('id_training', $id);
        $this->db->update('training', $data);
    }
	
	public function delete_training($id) {
		$this->deletePesertaBeforeTraining($id);
		$this->db->where('id_training', $id);
		$this->db->delete('training');
	}

	public function deletePesertaBeforeTraining($id){
		$this->db->where('fk_training', $id);
		$this->db->delete('peserta');
	}
	
	public function countAll()
	{
		$this->db->from('training');
		return $this->db->count_all_results();
	}
}


/* End of file Training_model.php and path \application\models\Training_model.php */
