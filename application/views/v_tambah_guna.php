<div class="block-header">
    <h2>Tambah Data Penggunaan</h2>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <form action="<?=base_url('index.php/penggunaan/simpan')?>" method="post">            
                <table class="table table-hover table-striped">
                    <tr>
                        <td>NAMA PELANGGAN</td><td>
                          <input type="hidden" name="id_pelanggan" value="<?=$data_Penggunaan->id_pelanggan?>">
                          <?=$data_Penggunaan->nama_pelanggan?></td>
                    </tr>
                    <tr>
                        <td>BULAN</td><td>
                          <?php 
                          $arr_bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                          ?>
                          <select name="bulan" class="form-control">
                            <option></option>
                            <?php foreach ($arr_bulan as $key => $bulan): ?>
                              <option value="<?=$key?>"><?=$bulan?></option>
                            <?php endforeach ?>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <td>TAHUN</td><td>
                          <select class="form-control" name="tahun">
                            <option></option>
                            <?php 
                          for($i=2017;$i<2022;$i++){
                            echo '<option value="'.$i.'">'.$i.'</option>';
                          }
                          ?>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <td>METER AWAL</td><td><input type="number" name="meter_awal" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>METER AKHIR</td><td><input type="number" name="meter_akhir" class="form-control"></td>
                    </tr> 
                    <tr>
                        <td></td><td><input type="submit" name="kirim" class="btn btn-success"></td>
                    </tr> 
                 </table>
                 </form>  
                <?php 
                  if($this->session->flashdata('pesan')!=null){
                    echo $this->session->flashdata('pesan');
                  }
                ?>
            </div>
        </div>
    </div>
</div>




