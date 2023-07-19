<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->akunku = $this->session->userdata('akun');
		if(!$this->session->userdata('akun')){
			redirect('/Authentication', 'refresh');
		}
	}

	public $akunku;

	public function index()
	{
		$data = [
			'halaman' => 'Dashboard',
			'training' => $this->Training->countAll(),
			'dokumentasi' => $this->Dokumentasi->countAll($this->akunku['id_dosen']),
			'riwayat' => $this->Riwayat->countAll($this->akunku['id_dosen']),
			'akunku' => $this->akunku,
		];
		$this->load->view('template/header', $data);
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}

	public function akun()
	{
		$data = [
			'halaman' => 'Akun Saya',
			'akunku' => $this->akunku,
		];
		$this->load->view('template/header', $data);
		$this->load->view('akun');
		$this->load->view('template/footer');
	}

	public function ubah()
	{
		if (isset($_POST['ubah'])) {
			$id_dosen = $this->input->post('id_dosen');
			$nama_dosen = $this->input->post('nama_dosen');
			$email_dosen = $this->input->post('email_dosen');
			$password_dosen = $this->input->post('password_dosen');
			$nip = $this->input->post('nip');

			$data = [
				'nama_dosen' => $nama_dosen,
				'email_dosen' => $email_dosen,
				'password_dosen' => $password_dosen,
				'nip' => $nip,
			];

			$this->Dosen->update_dosen($id_dosen, $data);

			$data = $this->Dosen->get_dosen($id_dosen);

			$data = $data[0];

			$this->session->unset_userdata('akun');
			$this->session->set_userdata('akun', $data);
		}
		redirect('/Index/akun', 'refresh');
	}
}

/* End of file Index.php and path \application\controllers\Index.php */
