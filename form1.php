<?php
  require_once 'core/connection.php';
  include 'includes/head.php';

  $token = $GLOBAL['token'];

  $query = "SELECT * FROM tbl_form1 WHERE id='$token'";
  $result = mysqli_fetch_assoc($conn->query($query));
?>

<body class="">
  <div class="wrapper ">
    <?php
      include 'includes/nav.php';
    ?>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-info navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Surat Keterangan Untuk Menikah</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <a href="form1.php?save=<?= $token?>" class="btn btn-secondary" role="button" aria-disabled="true">Simpan</a>
            <div class="clearfix"></div>
          </div>
        </div>
      </nav>  
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          <!--Form KAU-->
            <div class="col-md-4">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Data Kantor</h4>
                  <p class="card-category">Lengkapi form di bawah ini.</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-info">                          
                          <label class="bmd-label-floating ">Kantor Desa / Kelurahan</label>
                          <input type="text" class="form-control" value="<?= ((!empty($result))?$result['desa']:'');?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Kecamatan</label>
                          <input type="text" class="form-control" value="<?= ((!empty($result))?$result['kecamatam']:'');?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Kabupaten / Kota</label>
                          <input type="email" class="form-control" value="<?= ((!empty($result))?$result['kota']:'');?>">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!--Form Mempelai-->
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Data Mempelai</h4>
                  <p class="card-category">Lengkapi form di bawah ini.</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Nama Lengkap</label>
                          <input type="text" class="form-control" value="<?= ((!empty($result))?$result['nama']:'');?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Alias</label>
                          <input type="text" class="form-control" value="<?= ((!empty($result))?$result['alias']:'');?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group"> 
                          <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Jenis Kelamin
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Laki-laki</a>
                              <a class="dropdown-item" href="#">Perempuan</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Agama</label>
                          <input type="text" class="form-control" value="<?= ((!empty($result))?$result['agama']:'');?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Pekerjaan</label>
                          <input type="text" class="form-control" value="<?= ((!empty($result))?$result['pekerjaan']:'');?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Nama Ayah</label>
                          <input type="text" class="form-control" value="<?= ((!empty($result))?$result['nama_ayah']:'');?>">
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tempat Tinggal</label>
                          <input type="text" class="form-control" value="<?= ((!empty($result))?$result['alamat']:'');?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Status Perkawinan</label>
                        <div class="row">
                        <div class="col-md-6"> 
                          <div class="form-group has-info">
                            <label class="bmd-label-floating">Jika pria, terangkan jejaka, duda atau beristri dan berapa istrinya</label>
                            <textarea class="form-control" rows="3"><?= ((!empty($result))? $result['status_kawin']:'');?></textarea>
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group has-info">
                            <label class="bmd-label-floating">Jika wanita, terangkan perawan atau janda</label>
                            <textarea class="form-control" rows="3"><?= ((!empty($result))? $result['status_kawin']:'');?></textarea>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Nama Suami / Istri Terdahulu</label>
                          <input type="text" class="form-control" value="<?= ((!empty($result))?$result['nama_mantan']:'');?>">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  include 'includes/footer.php';
?>