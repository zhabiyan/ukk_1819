<div class="block-header">
    <h2>Data pelanggan</h2>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a><br><br>                   
                <table class="table table-hover table-striped datatable">
                  <thead>
                    <tr>
                        <th>NO</th><th>ID PELANGGAN</th><th>NAMA PELANGGAN</th><th>ALAMAT</th><th>no KWH</th><th>USERNAME</th><th>PASSWORD</th><th>DAYA</th><th>AKSI</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php 
                    $no=0;
                    foreach ($data_pelanggan as $dt_pelanggan) {
                        $no++;
                        echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_pelanggan->id_pelanggan.'</td>
                                <td>'.$dt_pelanggan->nama_pelanggan.'</td>
                                 <td>'.$dt_pelanggan->alamat.'</td>
                                  <td>'.$dt_pelanggan->nomor_kwh.'</td>
                                <td>'.$dt_pelanggan->username.'</td>
                                <td>'.$dt_pelanggan->password.'</td>
                                <td>'.$dt_pelanggan->daya.'</td>
                                <td><a href="#update_pelanggan" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_pelanggan->id_pelanggan.')">Update</a> <a href="'.base_url('index.php/pelanggan/hapus_pelanggan/'.$dt_pelanggan->id_pelanggan).'" onclick="return confirm(\'anda yakin?\')" class="btn btn-danger">Delete</a></td>
                             </tr>';
                    }
                    ?>
                    </tbody>
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
        <h4 class="modal-title">Tambah Pelanggan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/pelanggan/simpan_pelanggan')?>" method="post" enctype="multipart/form-data">
          Nama pelanggan 
          <input type="text" class="form-control" name="nama_pelanggan">
          <br>
         Alamat
         <textarea name="alamat" class="form-control"></textarea>
          <br>
          NO KWH 
          <input type="text" class="form-control" name="nomor_kwh">
          <br>
          Username 
          <input type="text" class="form-control" name="username">
          <br>
         Password
          <input type="text" class="form-control" name="password">
          <br>
          Daya 
          <select name="id_tarif" class="form-control">
              <option></option>
              <?php foreach ($data_tarif as $tarif): ?>
                  <option value="<?=$tarif->id_tarif?>"><?=$tarif->daya?></option>
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

<div class="modal fade" id="update_pelanggan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update pelanggan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/pelanggan/update_pelanggan')?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_pelanggan" id="id_pelanggan">
          Nama pelanggan 
          <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
          <br>
         Alamat
         <textarea name="alamat" class="form-control" id="alamat"></textarea>
          <br>
          NO KWH 
          <input type="text" class="form-control" name="nomor_kwh" id="nomor_kwh">
          <br>
          Username 
          <input type="text" class="form-control" name="username" id="username">
          <br>
         Password
          <input id="password" type="text" class="form-control" name="password">
          <br>
          Daya 
          <select name="id_tarif" id="id_tarif" class="form-control">
              <option></option>
              <?php foreach ($data_tarif as $tarif): ?>
                  <option value="<?=$tarif->id_tarif?>"><?=$tarif->daya?></option>
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

                            

<script>
  
  function tm_detail(id_pelanggan) {
    $.getJSON("<?=base_url()?>index.php/pelanggan/get_detail_pelanggan/"+id_pelanggan,function(data){
        $("#id_pelanggan").val(data['id_pelanggan']);
        $("#nama_pelanggan").val(data['nama_pelanggan']);
        $("#alamat").val(data['alamat']);
        $("#nomor_kwh").val(data['nomor_kwh']);
        $("#username").val(data['username']);
        $("#password").val(data['password']);
        $("#id_tarif").val(data['id_tarif']);
    });
  }

  $(".datatable").dataTable();
</script>