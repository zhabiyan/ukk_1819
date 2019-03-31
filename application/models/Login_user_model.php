<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user_model extends CI_Model {

	public function cek_user()
	{
		return $this->db->where('username',$this->input->post('username'))->where('password',$this->input->post('password'))->get('pelanggan');
	}
	public function tambah_user()
	{
		$object=array(
			'nama_pelanggan'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'nomor_kwh'=>$this->input->post('nomor_kwh'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'id_tarif'=>$this->input->post('id_tarif')
		);
		return $this->db->insert('pelanggan', $object);
	}
}

/* End of file Login_user_model.php */
/* Location: ./application/models/Login_user_model.php */