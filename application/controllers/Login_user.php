<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tarif_model','tarif');
	}

	public function index()
	{
		$data['tarif']=$this->tarif->get_tarif();
		$this->load->view('v_login_user',$data);
	}
	public function proses()
	{
		$this->load->model('login_user_model','l_user');
		$login=$this->l_user->cek_user();
		if($login->num_rows()>0){
			$dt_user=$login->row();
			$data_user = array(
				'id_pelanggan' => $dt_user->id_pelanggan,
				'nama_pelanggan'=> $dt_user->nama_pelanggan,
				'username'=> $dt_user->username,
				'password'=>$dt_user->password,
				'login_user'=>true,
				'id_tarif'=>$dt_user->id_tarif
			);
			$this->session->set_userdata( $data_user );
			redirect(base_url('index.php/dashboard_user'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Username dan password tidak cocok</div>');
			redirect(base_url('index.php/login_user'),'refresh');
		}
	}
	public function simpan()
	{
		$this->load->model('login_user_model','l_user');
		$cek_data=$this->l_user->tambah_user();
		if($cek_data){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Pendaftaran anda sukses</div>');
			redirect(base_url('index.php/login_user'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Pendaftaran anda gagal</div>');
			redirect(base_url('index.php/login_user'),'refresh');
		}
	}

}

/* End of file Login_user.php */
/* Location: ./application/controllers/Login_user.php */