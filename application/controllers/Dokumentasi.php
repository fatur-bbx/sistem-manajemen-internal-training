<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->dataDokumentasi  = $this->Dokumentasi->get_all_dokumentasi();
		$this->dataTraining  = $this->Training->get_all_training();
		$this->akunku = $this->session->userdata('akun');
		if(!$this->session->userdata('akun')){
			redirect('/Authentication', 'refresh');
		}
	}

	public $dataDokumentasi;
	public $dataTraining;
	public $akunku;

	public function index()
	{
		$data = [
			'halaman' => 'Sertifikat',
			'dataDokumentasi' => $this->dataDokumentasi,
			'dataTraining' => $this->dataTraining,
			'akunku' => $this->akunku,
		];
		$this->load->view('template/header', $data);
		$this->load->view('dokumentasi');
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		if (isset($_POST['tambah'])) {
			$fk_dosen = $this->input->post('fk_dosen');
			$fk_training = $this->input->post('fk_training');

			$file = $_FILES['file'];
			$namaFile = $fk_dosen . $fk_training . $file['name'];
			move_uploaded_file($file['tmp_name'], FCPATH . 'assets/upload/' . $namaFile);

			$data = [
				'nama_dokumentasi' => $namaFile,
				'fk_dosen' => $fk_dosen,
				'fk_training' => $fk_training,
			];

			$this->Dokumentasi->insert_dokumentasi($data);
		}

		redirect('/dokumentasi', 'refresh');
	}

	public function hapus()
	{
		if (isset($_POST['hapus'])) {
			$id_dokumentasi = $this->input->post('id_dokumentasi');

			$datadokumen = $this->Dokumentasi->get_dokumentasi($id_dokumentasi);

			$namaDokumen = $datadokumen['nama_dokumentasi'];
			unlink(FCPATH . '/assets/upload/' . $namaDokumen);

			$this->Dokumentasi->delete_dokumentasi($id_dokumentasi);
		}
		redirect('/dokumentasi', 'refresh');
	}

	public function dokumentasi_user()
	{
		$data = [
			'halaman' => 'Sertifikat',
			'dataDokumentasi' => $this->dataDokumentasi,
			'dataTraining' => $this->dataTraining,
			'akunku' => $this->akunku,
		];
		$this->load->view('template/header', $data);
		$this->load->view('dokumen_user');
		$this->load->view('template/footer');
	}
}

/* End of file Dokumentasi.php and path \application\controllers\Dokumentasi.php */
