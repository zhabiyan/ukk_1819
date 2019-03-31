<div class="block-header">
    <h2>Data Penggunaan</h2>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                                     
                <table class="table table-hover table-striped datatable">
                  <thead>
                    <tr>
                        <th>PELANGGAN</th><th>NOMOR KWH</th><th>DAYA</th><th>AKSI</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php 
                     $no=0;
                      foreach ($data_Penggunaan as $Penggunaan) {
                          $no++;
                          echo '<tr>
                                  <td>'.$Penggunaan->nama_pelanggan.'</td>
                                  <td>'.$Penggunaan->nomor_kwh.'</td>
                                  <td>'.$Penggunaan->daya.'</td>
                                  <td><a href="'.base_url('index.php/penggunaan/tambah_guna/'.$Penggunaan->id_pelanggan).'" class="btn btn-success">Tambah Penggunaan</a> <a href="'.base_url('index.php/penggunaan/get_detail_Penggunaan/'.$Penggunaan->id_pelanggan).'" class="btn btn-info">Detail Penggunaan</a> <a href="'.base_url('index.php/penggunaan/get_detail_tagihan/'.$Penggunaan->id_pelanggan).'" class="btn btn-primary">Detail Tagihan</a></td>
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
