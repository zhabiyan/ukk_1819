<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Histori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login')!=true){
			redirect(base_url('index.php/login'),'refresh');
		}
		$this->load->model('histori_model','histori');
		$this->load->model('admin_model','admin');
	}

	public function index()
	{
		$data['konten']="v_histori";
		$data['data_histori']=$this->histori->get_pembayaran();
		$this->load->view('template', $data, FALSE);
	}

}

/* End of file Histori.php */
/* Location: ./application/controllers/Histori.php */