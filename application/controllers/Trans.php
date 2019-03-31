<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trans extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_user')!=true){
			redirect(base_url('index.php/login_user'),'refresh');
		}
		$this->load->model('tagihan_model','tagihan');
	}

	public function index()
	{
		$data['tagihan']=$this->tagihan->daftar_tagihan();
		$data['konten']="v_daftar_tagihan";
		$this->load->view('template_user', $data);
	}




	public function upload_bukti()
	{
		$config['upload_path'] = './assets/bukti/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '10000';
			$config['max_width']  = '102400';
			$config['max_height']  = '76800';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect(base_url('index.php/trans'),'refresh');
			}
			else{
				$update=$this->tagihan->update_bayar();
				if($update){
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Upload Bukti Sukses</div>');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Upload Bukti Gagal</div>');
				}
				redirect(base_url('index.php/trans'),'refresh');
			}	
	}

}

/* End of file Trans.php */
/* Location: ./application/controllers/Trans.php */