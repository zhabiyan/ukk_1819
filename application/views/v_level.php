<div class="block-header">
    <h2>Data Level</h2>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>                      
                <table class="table table-hover table-striped">
                    <tr>
                        <th>NO</th><th>ID LEVEL</th><th>NAMA LEVEL</th><th> AKSI</th>
                    </tr>
                    <?php 
                    $no=0;
                    foreach ($data_level as $dt_level) {
                        $no++;
                        echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_level->id_level.'</td>
                                <td>'.$dt_level->nama_level.'</td>
                                <td><a href="#update_level" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_level->id_level.')">Update</a> <a href="'.base_url('index.php/level/hapus_level/'.$dt_level->id_level).'" onclick="return confirm(\'anda yakin?\')" class="btn btn-danger">Delete</a></td>
                             </tr>';
                    }
                    ?>
                 </table>
                <?php 
                  if($this->session->flashdata('pesan')!=null){
                    echo '<div class="alert alert-danger">'.$this->session->flashdata('pesan').'</div>';
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
        <h4 class="modal-title">Tambah level</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/level/simpan_level')?>" method="post" enctype="multipart/form-data">
            <?php $arr_level=array("direktur","Manager","Receptionist");?>
          Nama level 
          <input type="text" class="form-control" name="nama_level">
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

<div class="modal fade" id="update_level">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update Level</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/level/update_level')?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_level" id="id_level">
          Nama level 
          <input id="nama_level" type="text" name="nama_level" class="form-control"><br>
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
  
  function tm_detail(id_level) {
    $.getJSON("<?=base_url()?>index.php/level/get_detail_level/"+id_level,function(data){
        $("#id_level").val(data['id_level']);
        $("#nama_level").val(data['nama_level']);
    });
  }

</script>