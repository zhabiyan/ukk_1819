<div class="block-header">
    <h2>Data TARIF</h2>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>                      
                <table class="table table-hover table-striped">
                    <tr>
                        <th>NO</th><th>DAYA</th><th>TARIF PERKWH</th><th> AKSI</th>
                    </tr>
                   
                    <?php 
                    $no=0;
                    foreach ($data_tarif as $dt_tarif) {
                        $no++;
                        echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_tarif->daya.'</td>
                                <td>'.$dt_tarif->tarifperkwh.'</td>
                                <td><a href="#update_tarif" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_tarif->id_tarif.')">Update</a> <a href="'.base_url('index.php/tarif/hapus_tarif/'.$dt_tarif->id_tarif).'" onclick="return confirm(\'anda yakin?\')" class="btn btn-danger">Delete</a></td>
                             </tr>';
                    }
                    ?>
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
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Tarif</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/tarif/simpan_tarif')?>" method="post" enctype="multipart/form-data">
            <?php $arr_tarif=array("direktur","Manager","Receptionist");?>
          DAYA
          <input type="text" class="form-control" name="daya">
          <br>
          Tarif PerKWH
          <input type="text" class="form-control" name="tarifperkwh">
          <br>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="update_tarif">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update tarif</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/tarif/update_tarif')?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_tarif" id="id_tarif">
          Daya 
          <input id="daya" type="text" name="daya" class="form-control"><br>
          Tarif perKHW 
          <input id="tarifperkwh" type="text" name="tarifperkwh" class="form-control"><br>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                            

<script>
  
  function tm_detail(id_tarif) {
    $.getJSON("<?=base_url()?>index.php/tarif/get_detail_tarif/"+id_tarif,function(data){
        $("#id_tarif").val(data['id_tarif']);
        $("#daya").val(data['daya']);
        $("#tarifperkwh").val(data['tarifperkwh']);
    });
  }

</script>