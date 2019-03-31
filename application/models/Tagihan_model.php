<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {

	public function daftar_tagihan()
		{
			return $this->db
			->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan')
			->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
			->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
			->where('penggunaan.id_pelanggan',$this->session->userdata('id_pelanggan'))
			->order_by('id_tagihan','desc')
			->get('tagihan')->result();
		}	
	public function cek_pembayaran($id_tagihan)
	{
		return $this->db
			->where('id_tagihan',$id_tagihan)
			->get('pembayaran')->row();
	}
	public function update_bayar()
	{

		$cek_bayar=$this->db
				->where('id_tagihan',$this->input->post('id_tagihan'))
				->get('pembayaran');

		$dt_tagihan=$this->db
				->where('id_tagihan',$this->input->post('id_tagihan'))
				->get('tagihan')->row();

		$tarif_perkwh=$this->db->where('id_tarif',$this->session->userdata('id_tarif'))->get('tarif')->row();
		$biaya_admin=2500;
		if($cek_bayar->num_rows()>0){
			$dt_bayar=$cek_bayar->row();
			$data=array(
				'bukti'=>$this->upload->data('file_name'),
				'status'=>'pending'
			);
			return $this->db->where('id_pembayaran',$dt_bayar->id_pembayaran)->update('pembayaran',$data);
		} else {
			$data=array(
				'id_tagihan'=>$this->input->post('id_tagihan'),
				'tanggal_pembayaran'=>date('Y-m-d'),
				'bulan_bayar'=>$dt_tagihan->bulan.'-'.$dt_tagihan->tahun,
				'biaya_admin'=>$biaya_admin,
				'total_bayar'=>($biaya_admin+($dt_tagihan->jumlah_meter*$tarif_perkwh->tarifperkwh)),
				'status'=>'pending',
				'bukti'=>$this->upload->data('file_name'),
			);
			return $this->db->insert('pembayaran',$data);
			
		}

		
	}

}

/* End of file Tagihan_model.php */
/* Location: ./application/models/Tagihan_model.php */