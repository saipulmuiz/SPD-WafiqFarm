<?php 

class Otentikasi extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Otentikasi_model');

	}

	function index(){
        $data["title"] = "Login - Wafiq Farm";
		$this->load->view('otentikasi/login',$data);
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$user = $this->Otentikasi_model->get($username);
		if(empty($user)){
		$this->session->set_flashdata('message', 'Username tidak ditemukan');
		redirect('otentikasi');
		}else{
		if($password == $user->password){
			$session = array(
			'authenticated'=>true,
			'status'=>'MASUK',
			'id_user'=>$user->id_user,
			'username'=>$user->username,
			'nama'=>$user->nama,
			'level'=>$user->level,
			'foto'=>$user->foto
			);
			$this->session->set_userdata($session); // Buat session sesuai $session
			redirect('overview'); // Redirect ke halaman welcome
		}else{
			$this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
			redirect('otentikasi'); // Redirect ke halaman login
		}
		}
		}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}