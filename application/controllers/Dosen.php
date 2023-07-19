<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->dataDosen = $this->Dosen->get_all_dosen();
		$this->akunku = $this->session->userdata('akun');
		if(!$this->session->userdata('akun')){
			redirect('/Authentication', 'refresh');
		}
	}

	public $dataDosen;
	public $akunku;

    public function index()
    {
		$data = [
			'halaman' => 'Akun',
			'dataDosen' => $this->dataDosen,
			'akunku' => $this->akunku,
		];
		$this->load->view('template/header', $data);
		$this->load->view('dosen');
		$this->load->view('template/footer');
    }

	public function makeAdmin()
	{
		if(isset($_POST['makeAdmin'])){
			$data = [
				'isAdmin' => 1
			];

			$this->Dosen->update_dosen($this->input->post('id_dosen'), $data);
		}
		redirect('/dosen', 'refresh');
	}

	public function makeBiasa()
	{
		if(isset($_POST['makeBiasa'])){
			$data = [
				'isAdmin' => 0
			];

			$this->Dosen->update_dosen($this->input->post('id_dosen'), $data);
		}
		redirect('/dosen', 'refresh');
	}

	public function konfirmasi()
	{
		if(isset($_POST['konfirmasi'])){
			$data = [
				'isAccept' => 1
			];

			$this->Dosen->update_dosen($this->input->post('id_dosen'), $data);
		}
		redirect('/dosen', 'refresh');
	}

	public function batalkonfirmasi()
	{
		if(isset($_POST['batalkonfirmasi'])){
			$data = [
				'isAccept' => 0
			];

			$this->Dosen->update_dosen($this->input->post('id_dosen'), $data);
		}
		redirect('/dosen', 'refresh');
	}
}

/* End of file Dosen.php and path \application\controllers\Dosen.php */
