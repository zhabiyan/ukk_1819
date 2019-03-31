<div class="block-header">
    <h2>Data Admin</h2>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>                      
                <table class="table table-hover table-striped">
                    <tr>
                        <th>NO</th><th>ID ADMIN</th><th>NAMA ADMIN</th><th>USERNAME</th><th>PASSWORD</th><th>admin</th><th>AKSI</th>
                    </tr>
                   
                    <?php 
                    $no=0;
                    foreach ($data_admin as $dt_admin) {
                        $no++;
                        echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_admin->id_admin.'</td>
                                <td>'.$dt_admin->nama_admin.'</td>
                                <td>'.$dt_admin->username.'</td>
                                <td>'.$dt_admin->password.'</td>
                                <td>'.$dt_admin->nama_level.'</td>
                                <td><a href="#update_admin" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_admin->id_admin.')">Update</a> <a href="'.base_url('index.php/admin/hapus_admin/'.$dt_admin->id_admin).'" onclick="return confirm(\'anda yakin?\')" class="btn btn-danger">Delete</a></td>
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
        <h4 class="modal-title">Tambah admin</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/admin/simpan_admin')?>" method="post" enctype="multipart/form-data">
          Nama admin 
          <input type="text" class="form-control" name="nama_admin">
          <br>
          Username 
          <input type="text" class="form-control" name="username">
          <br>
         Password
          <input type="text" class="form-control" name="password">
          <br>
          Level 
          <select name="id_level" class="form-control">
              <option></option>
              <?php foreach ($data_level as $level): ?>
                  <option value="<?=$level->id_level?>"><?=$level->nama_level?></option>
              <?php endforeach ?>
          </select>
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

<div class="modal fade" id="update_admin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update admin</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/admin/update_admin')?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_admin" id="id_admin">
          Nama admin 
          <input id="nama_admin" type="text" name="nama_admin" class="form-control"><br>
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
  
  function tm_detail(id_admin) {
    $.getJSON("<?=base_url()?>index.php/admin/get_detail_admin/"+id_admin,function(data){
        $("#id_admin").val(data['id_admin']);
        $("#nama_admin").val(data['nama_admin']);
    });
  }

</script>