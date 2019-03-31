<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login')!=true){
			redirect(base_url('index.php/login'),'refresh');
		}
	}

	public function index()
	{
		$data['konten']="v_Penggunaan";
		$this->load->model('pelanggan_model','pelanggan');
		$data['data_Penggunaan']=$this->pelanggan->get_pelanggan();
		$this->load->view('template', $data, FALSE);
	}
	
	public function get_detail_Penggunaan($id_pelanggan='')
	{
		$this->load->model('Penggunaan_model');
		$data['data_detail']=$this->Penggunaan_model->detail_Penggunaan($id_pelanggan);
		$this->load->model('pelanggan_model','pelanggan');
		$data['data_pelanggan']=$this->pelanggan->detail_pelanggan($id_pelanggan);
		$data['konten']="v_detail_penggunaan";
		$this->load->view('template', $data, FALSE);
	}
	public function tambah_guna($id_pelanggan)
	{
		$data['konten']="v_tambah_guna";
		$this->load->model('pelanggan_model','pelanggan');
		$data['data_Penggunaan']=$this->pelanggan->detail_pelanggan($id_pelanggan);
		$this->load->view('template', $data, FALSE);
	}
	public function simpan()
	{
		$this->form_validation->set_rules('bulan', 'Bulan', 'trim|required',array('required',"Bulan harus diisi"));
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required',array('required',"Tahun harus diisi"));	
		$this->form_validation->set_rules('meter_awal', 'Meter Awal', 'trim|required',array('required',"Meter Awal harus diisi"));
		$this->form_validation->set_rules('meter_akhir', 'Meter Akhir', 'trim|required',array('required',"Meter akhir harus diisi"));
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">'.validation_errors().'</div>');
			} else {
				$this->load->model('penggunaan_model','penggunaan');
				if($this->penggunaan->cek_penggunaan()==false){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">tagihan bulan ini sudah ada</div>');
					redirect(base_url('index.php/penggunaan'),'refresh');
				}
				$proses=$this->penggunaan->masuk_db();
				if($proses){
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Tambah penggunaan Berhasil</div>');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Tambah penggunaan gagal</div>');
				}
			}
			redirect(base_url('index.php/penggunaan'),'refresh');
	}
	public function hapus($id_pelanggan,$id_penggunaan='')
	{
		$this->load->model('penggunaan_model','penggunaan');
		$proses=$this->penggunaan->hapus($id_penggunaan);
		if($proses){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Menghapus penggunaan Berhasil</div>');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Menghapus penggunaan gagal</div>');
		}
		redirect(base_url('index.php/penggunaan/get_detail_Penggunaan/'.$id_pelanggan),'refresh');
	}
	public function get_detail_tagihan($id_pelanggan='')
	{
		$this->load->model('Penggunaan_model');
		$data['data_detail']=$this->Penggunaan_model->detail_tagihan($id_pelanggan);
		$this->load->model('pelanggan_model','pelanggan');
		$data['data_pelanggan']=$this->pelanggan->detail_pelanggan($id_pelanggan);
		$data['konten']="v_detail_tagihan";
		$this->load->view('template', $data, FALSE);
	}
}

/* End of file Penggunaan.php */
/* Location: ./application/controllers/Penggunaan.php */