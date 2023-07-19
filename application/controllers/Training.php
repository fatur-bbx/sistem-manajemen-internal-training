<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->dataTraining  = $this->Training->get_all_training();
		$this->akunku = $this->session->userdata('akun');
		if(!$this->session->userdata('akun')){
			redirect('/Authentication', 'refresh');
		}
    }

	public $dataTraining;
	public $akunku;

    public function index()
    {
		$data = [
			'halaman' => 'Training',
			'dataTraining' => $this->dataTraining,
			'akunku' => $this->akunku,
		];
		$this->load->view('template/header', $data);
		$this->load->view('training');
		$this->load->view('template/footer');
    }

	public function tambah()
	{
		if(isset($_POST['tambah']))
		{
			$nama_training = $this->input->post('nama_training');
			$deskripsi_training = $this->input->post('deskripsi_training');
			$jadwal_training = $this->input->post('jadwal_training');

			$data = [
				'nama_training' => $nama_training,
				'deskripsi_training' => $deskripsi_training,
				'jadwal_training' => $jadwal_training,
			];

			$result = $this->Training->insert_training($data);
			if(!$result){
				echo $result;
			}
		}

		redirect('/training', 'refresh');
	}

	public function hapus()
	{
		if(isset($_POST['hapus']))
		{
			$id_training = $this->input->post('id_training');

			$doc = $this->Dokumentasi->get_dokumentasi_training($id_training);

			foreach($doc as $d):
				unlink(FCPATH . '/assets/upload/' . $d['nama_dokumentasi']);
				$this->Dokumentasi->delete_dokumentasi($d['id_dokumentasi']);
			endforeach;

			$this->Training->delete_training($id_training);
		}
		redirect('/training', 'refresh');
	}

	public function edit()
	{
		if(isset($_POST['edit']))
		{
			$id_training = $this->input->post('id_training');
			$nama_training = $this->input->post('nama_training');
			$deskripsi_training = $this->input->post('deskripsi_training');
			$jadwal_training = $this->input->post('jadwal_training');

			$data = [
				'nama_training' => $nama_training,
				'deskripsi_training' => $deskripsi_training,
				'jadwal_training' => $jadwal_training,
			];

			$this->Training->update_training($id_training, $data);
		}
		redirect('/training', 'refresh');
	}

	public function ikuti()
	{
		if(isset($_POST['ikuti']))
		{
			$id_training = $this->input->post('id_training');
			$id_dosen = $this->input->post('id_dosen');

			$data = [
				'fk_training' => $id_training,
				'fk_dosen' => $id_dosen,
			];

			$this->Peserta->insert_peserta($data);

			// Riwayat
			$dTraining = $this->Training->get_training($id_training);
			$data = [
				'nama_training' => $dTraining['nama_training'],
				'fk_dosen' => $id_dosen,
			];

			$this->Riwayat->insert_riwayat($data);
		}
		redirect('/training', 'refresh');
	}
}

/* End of file Training.php and path \application\controllers\Training.php */
