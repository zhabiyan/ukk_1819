<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan_model extends CI_Model {

	public function get_Penggunaan()
	{
		return $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')->get('penggunaan')->result();
	}
	 public function masuk_db()
	{
			$data_Penggunaan=array(
				'id_pelanggan'=>$this->input->post('id_pelanggan'),
				'bulan'=>$this->input->post('bulan'),
				'tahun'=>$this->input->post('tahun'),
				'meter_awal'=>$this->input->post('meter_awal'),
				'meter_akhir'=>$this->input->post('meter_akhir')
			);
			$this->db->insert('penggunaan', $data_Penggunaan);
			if($this->db->affected_rows() > 0){
				$tm_penggunaan=$this->db
							->where('id_pelanggan',$this->input->post('id_pelanggan'))
							->order_by('id_penggunaan','desc')
							->limit(1)
							->get('penggunaan')->row();
			$data_tagihan=array(
				'id_penggunaan'=>$tm_penggunaan->id_penggunaan,
				'bulan'=>$this->input->post('bulan'),
				'tahun'=>$this->input->post('tahun'),
				'jumlah_meter'=>($this->input->post('meter_akhir')-$this->input->post('meter_awal'))
			);
			$this->db->insert('tagihan', $data_tagihan);	
			}
			if($this->db->affected_rows() > 0){
				return TRUE;
			} else {
				return FALSE;
			}
	}
	public function detail_Penggunaan($id_pelanggan)
	{
		return $this->db->where('id_pelanggan',$id_pelanggan)->get('penggunaan')->result();
	}
	public function detail_tagihan($id_pelanggan)
	{
		return $this->db
			->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan')
			->where('id_pelanggan',$id_pelanggan)->get('tagihan')->result();
	}
	public function update_Penggunaan()
	{
		
		$dt_up_Penggunaan=array(
			'nama_Penggunaan'=>$this->input->post('nama_Penggunaan'),
		);
	return $this->db->where('id_Penggunaan',$this->input->post('id_Penggunaan'))->update('Penggunaan', $dt_up_Penggunaan);
	}
	public function hapus($id_Penggunaan)
	{
		return $this->db->where('id_Penggunaan',$id_Penggunaan)->delete('Penggunaan');
	}
	public function cek_penggunaan()
	{
		$cek=$this->db->where('bulan',$this->input->post('bulan'))
					->where('tahun',$this->input->post('tahun'))
					->where('id_pelanggan',$this->input->post('id_pelanggan'))
					->get('penggunaan');
		if($cek->num_rows()>0){
			return false;
		} else {
			return true;
		}
	}
}

/* End of file Penggunaan_model.php */
/* Location: ./application/models/Penggunaan_model.php */