<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login')!=true){
			redirect(base_url('index.php/login'),'refresh');
		}
		$this->load->model('verification_model','verification');
		$this->load->model('admin_model','admin');
	}

	public function index()
	{
		$data['konten']="v_verification";
		$data['data_pembayaran']=$this->verification->get_pembayaran();
		$this->load->view('template', $data, FALSE);
	}
	public function verificated($id_pembayaran,$id_tagihan,$status)
	{
		$veri=$this->verification->get_verification($id_pembayaran,$id_tagihan,$status);
		if($veri){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Sukses menverifikasi pembayaran</div>');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Sukses menverifikasi pembayaran</div>');
		}
		redirect(base_url('index.php/verification'),'refresh');
	}

}

/* End of file Verification.php */
/* Location: ./application/controllers/Verification.php */