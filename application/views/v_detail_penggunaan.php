<div class="block-header">
    <h2>Data Detail Penggunaan <?=$data_pelanggan->nama_pelanggan?></h2>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                                     
                <table class="table table-hover table-striped datatable">
                  <thead>
                    <tr>
                        <th>BULAN</th><th>TAHUN</th><th>METER AWAL</th><th>METER AKHIR</th><th>TOTAL PENGGUNAAN</th><th>AKSI</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php 
                     $no=0;
                      foreach ($data_detail as $Penggunaan) {
                          $no++;
                          switch ($Penggunaan->bulan) {
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
                          echo '<tr>
                                  <td>'.$bulan.'</td>
                                  <td>'.$Penggunaan->tahun.'</td>

                                  <td>'.$Penggunaan->meter_awal.'</td>
                                  <td>'.$Penggunaan->meter_akhir.'</td>
                                  <td>'.($Penggunaan->meter_akhir-$Penggunaan->meter_awal).'</td>  
                                  <td><a href="'.base_url().'index.php/penggunaan/hapus/'.$Penggunaan->id_pelanggan.'/'.$Penggunaan->id_penggunaan.'"  class="btn btn-info">Hapus</a></td>
                               </tr>';
                      }
                      ?>
                   </tbody>
                   
                    
                 </table>


                <?php 
                  if($this->session->flashdata('pesan')!=null){
                    echo $this->session->flashdata('pesan');
                  }
                ?>
            </div>
        </div>
    </div>
</div>


                            

<script>
  $(".datatable").dataTable();
</script>
