<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function get_pelanggan()
	{
		return $this->db->join('tarif','tarif.id_tarif=pelanggan.id_tarif')->get('pelanggan')->result();
	}
	 public function masuk_db()
	{
		
			$data_pelanggan=array(
				'nama_pelanggan'=>$this->input->post('nama_pelanggan'),
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'id_tarif'=>$this->input->post('id_tarif'),
				'alamat'=>$this->input->post('alamat'),
				'nomor_kwh'=>$this->input->post('nomor_kwh'),
			);
			$sql_masuk=$this->db->insert('pelanggan', $data_pelanggan);
			return $sql_masuk;	
	}
	public function detail_pelanggan($id_pelanggan)
	{
		return $this->db->where('id_pelanggan',$id_pelanggan)->get('pelanggan')->row();
	}
	public function update_pelanggan()
	{
		
		$dt_up_pelanggan=array(
			'nama_pelanggan'=>$this->input->post('nama_pelanggan'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'alamat'=>$this->input->post('alamat'),
			'nomor_kwh'=>$this->input->post('nomor_kwh'),
			'id_tarif'=>$this->input->post('id_tarif'),
		);
	return $this->db->where('id_pelanggan',$this->input->post('id_pelanggan'))->update('pelanggan', $dt_up_pelanggan);
	}
	public function hapus_pelanggan($id_pelanggan)
	{
		return $this->db->where('id_pelanggan',$id_pelanggan)->delete('pelanggan');
	}
}

/* End of file pelanggan_model.php */
/* Location: ./application/models/pelanggan_model.php */