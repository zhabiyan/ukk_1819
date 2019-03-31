<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | PPOB Cepat Habis</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url()?>assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url()?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url()?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">PPOB</b></a>
            <small>PPOB Cepat Habis</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="<?=base_url('index.php/login_user/proses')?>" method="POST">
                    <div class="msg">Silahkan Login Pelanggan</div>
                    
                    <?=$this->session->flashdata('pesan');?>
                    
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username"  autofocus>
                        </div>
                        
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <a class="btn btn-block bg-green waves-effect" data-toggle="modal" data-target="#daftar">DAFTAR</a>
                        </div>
                        <div class="col-xs-4 pull-right">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="daftar">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Pendaftaran Pelanggan</h4>
          </div>
          <div class="modal-body">
            <form action="<?=base_url('index.php/login_user/simpan')?>" method="post">
            <table style="width:100%">
                <tr>
                    <td>Nama</td><td><input required type="text" name="nama" class="form-control"></td>
                </tr>
                <tr>
                    <td>Alamat</td><td><textarea required name="alamat" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>Nomor KWH</td><td><input required type="text" name="nomor_kwh" class="form-control"></td>
                </tr>
                <tr>
                    <td>Daya</td>
                    <td>
                        <select name="id_tarif" class="form-control">
                            <option></option>    
                            <?php foreach ($tarif as $tarif): ?>
                                <option value="<?=$tarif->id_tarif?>"><?=$tarif->daya?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td>Username</td><td><input required type="text" name="username" class="form-control"></td>
                </tr>
                <tr>
                    <td>Password</td><td><input required type="password" name="password" class="form-control"></td>
                </tr>
            </table>
            <input type="submit" class="btn btn-info" name="daftar" value="DAFTAR">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Jquery Core Js -->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url()?>assets/js/admin.js"></script>
    <script src="<?=base_url()?>assets/js/pages/examples/sign-in.js"></script>
</body>

</html>