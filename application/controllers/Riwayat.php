<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->akunku = $this->session->userdata('akun');
		$this->dataRiwayat = $this->Riwayat->get_all_riwayat($this->akunku['id_dosen']);
		if(!$this->session->userdata('akun')){
			redirect('/Authentication', 'refresh');
		}
    }

	public $dataRiwayat;
	public $akunku;

    public function index()
    {
		$data = [
			'halaman' => 'Riwayat',
			'dataRiwayat' => $this->dataRiwayat,
			'akunku' => $this->akunku,
		];
		$this->load->view('template/header', $data);
		$this->load->view('riwayat');
		$this->load->view('template/footer');
    }
}

/* End of file Riwayat.php and path \application\controllers\Riwayat.php */
