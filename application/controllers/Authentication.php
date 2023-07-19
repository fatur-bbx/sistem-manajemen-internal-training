<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		if(!$this->session->userdata('akun')){
			$this->load->view('login');
		}else{
			redirect('/', 'refresh');
		}
    }

	public function registrasi()
	{
		if(!$this->session->userdata('akun')){
			$this->load->view('registrasi');
		}else{
			redirect('/', 'refresh');
		}
	}

	public function doRegis()
	{
		if(isset($_POST['buat']))
		{
			$nama_dosen = $this->input->post('nama_dosen');
			$email_dosen = $this->input->post('email_dosen');
			$password_dosen = $this->input->post('password_dosen');
			$nip = $this->input->post('nip');
			$isAdmin = 0;
			$isAccept = 0;

			$data = [
				'nama_dosen' => $nama_dosen,
				'email_dosen' => $email_dosen,
				'password_dosen' => $password_dosen,
				'nip' => $nip,
				'isAdmin' => $isAdmin,
				'isAccept' => $isAccept,
			];

			$this->Dosen->insert_dosen($data);
			redirect('/Authentication', 'refresh');
		}else{
			redirect('/Authentication/registrasi', 'refresh');
		}
	}

	public function doLogin()
	{
		if(isset($_POST['login']))
		{
			$email_dosen = $this->input->post('email_dosen');
			$password_dosen = $this->input->post('password_dosen');

			$log = $this->Dosen->login($email_dosen, $password_dosen);
			if($log){
				$this->session->set_userdata(array('akun' => $log));
				redirect('/', 'refresh');
			}else{
				redirect('/Authentication', 'refresh');
			}
		}else{
			redirect('/Authentication', 'refresh');
		}
	}

	public function doLogout()
	{
		$this->session->unset_userdata('akun');
		redirect('/Authentication', 'refresh');
	}

}

/* End of file Authentication.php and path \application\controllers\Authentication.php */
