<h3>Daftar Tagihan Anda</h3>
<div class="col-md-12" style="background:white">
	<div class="row">
		<table class="table table-hover table-striped">
			<thead> 
				<tr>
					<th>ID TAGIHAN</th>
					<th>BULAN</th>
					<th>KWH PENGGUNAAN</th>
					<th>GRANDTOTAL</th>
					<th>BUKTI</th>
					<th>STATUS</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tagihan as $tag):
					$cek_bayar=$this->tagihan->cek_pembayaran($tag->id_tagihan);
					switch ($tag->bulan) {
	                    case '1':$bulan="Januari";break;
	                    case '2':$bulan="Februari";break;
	                    case '3':$bulan="Maret";break;
	                    case '4':$bulan="April";break;
	                    case '5':$bulan="Mei";break;
	                    case '6':$bulan="Juni";break;
	                    case '7':$bulan="Juli";break;
	                    case '8':$bulan="Agustus";break;
	                    case '9':$bulan="September";break;
	                    case '10':$bulan="Oktober";break;
	                    case '11':$bulan="November";break;
	                    case '12':$bulan="Desember";break;
	                    default:
	                      "bukan Nama Bulan";
	                      break;
	                }
				 ?>
					<tr>
						<td><?=$tag->id_tagihan?></td>
						<td><?=$bulan.' '.$tag->tahun?></td>
						<td><?=$tag->jumlah_meter?></td>
						<td><?=($tag->tarifperkwh*$tag->jumlah_meter+2500)?></td>
						<td>
							<?php
							if(@$cek_bayar->bukti!=""){
								echo '<img src="'.base_url().'assets/bukti/'.$cek_bayar->bukti.'" width="40">';
							}
							?>
						</td>
						<td>
							<?php 
							if(@$cek_bayar->status==null){
								echo $tag->status;
							} else{
								echo $cek_bayar->status;
							}
							?>	
						</td>
						<td>
							<?php 
							if(@$cek_bayar->status=='lunas'){
								echo 'LUNAS';
							} else{
								echo '<a href="#upload" data-toggle="modal" onclick=bayar('.$tag->id_tagihan.') class="btn btn-warning">UPLOAD</a>';
							}
							?>
							</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?=$this->session->flashdata('pesan');?>
	</div>
</div>

<div class="modal fade" id=upload>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Upload Bukti Pembayaran</h4>
      </div>
      <div class="modal-body">
		<form method="post" action="<?=base_url('index.php/trans/upload_bukti')?>" enctype="multipart/form-data"> 
			<input type="file" name="bukti" class="form-control"><br>
			<input type="hidden" name="id_tagihan" id="id_tagihan">
			<input type="submit" name="submit" value="Kirim" class="btn btn-success" style="float:left;margin-right:10px">
       
       	</form>
       	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
	function bayar(id_tagihan){
		$("#id_tagihan").val(id_tagihan);
	}
</script>




