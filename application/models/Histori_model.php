<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Histori_model extends CI_Model {

	public function get_pembayaran()
	{
		return $this->db
				->join('tagihan','tagihan.id_tagihan=pembayaran.id_tagihan')
				->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan')
				->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
				->order_by('id_pembayaran','desc')
				->get('pembayaran')->result();
	}

}

/* End of file Verification_model.php */
/* Location: ./application/models/Verification_model.php */