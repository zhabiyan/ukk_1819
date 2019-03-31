<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login')!=true){
			redirect(base_url('index.php/login'),'refresh');
		}
	}

	public function index()
	{
		$data['konten']="v_level";
		$this->load->model('level_model','level');
		$data['data_level']=$this->level->get_level();
		$this->load->view('template', $data, FALSE);
	}
	public function simpan_level()
	{
		$this->form_validation->set_rules('nama_level', 'Nama level', 'trim|required',
		array('required' => 'nama level harus diisi'));

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('level_model','level');
			$masuk=$this->level->masuk_db();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				//$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/level'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/level'),'refresh');

		}
	}
	public function get_detail_level($id_level='')
	{
		$this->load->model('level_model');
		$data_detail=$this->level_model->detail_level($id_level);
		echo json_encode($data_detail);
	}
	public function update_level()
	{
		$this->form_validation->set_rules('nama_level', 'nama level', 'trim|required',array("required"=>"Nama lvel harus diisi"));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/level'),'refresh');
		} else {
			$this->load->model('level_model');
			$proses_update=$this->level_model->update_level();
			if($proses_update){
				$this->session->set_flashdata('pesan', 'sukses update');
			} else {
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/level'),'refresh');
		}
	}
	public function hapus_level($id_level='')
	{
		$this->load->model('level_model','level');
		$hapus=$this->level->hapus_level($id_level);
		if($hapus){
			$this->session->set_flashdata('pesan', 'sukses hapus data');
			} else {
				$this->session->set_flashdata('pesan', 'gagal hapus data');
			}
			redirect(base_url('index.php/level'),'refresh');
	}

}

/* End of file Level.php */
/* Location: ./application/controllers/Level.php */