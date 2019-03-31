<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_admin()
	{
		return $this->db->join('level','level.id_level=admin.id_level')->get('admin')->result();
	}
	 public function masuk_db()
	{
		
			$data_admin=array(
				'nama_admin'=>$this->input->post('nama_admin'),
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'id_level'=>$this->input->post('id_level'),
			);
			$sql_masuk=$this->db->insert('admin', $data_admin);
			return $sql_masuk;	
	}
	public function detail_admin($id_admin)
	{
		return $this->db->where('id_admin',$id_admin)->get('admin')->row();
	}
	public function update_admin()
	{
		
		$dt_up_admin=array(
			'nama_admin'=>$this->input->post('nama_admin'),
		);
	return $this->db->where('id_admin',$this->input->post('id_admin'))->update('admin', $dt_up_admin);
	}
	public function hapus_admin($id_admin)
	{
		return $this->db->where('id_admin',$id_admin)->delete('admin');
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */