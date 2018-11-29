<?php
  include 'includes/head.php';
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
            <a class="navbar-brand" href="#pablo">Surat Keterangan Kematian Suami / Istri</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <button type="submit" class="btn btn-info pull-right">Simpan</button>
            <div class="clearfix"></div>
          </div>
        </div>
      </nav>  
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          <!--Form Mantan Suami / Istri-->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Data Mantan Suami / Istri</h4>
                  <p class="card-category">Lengkapi form di bawah ini.</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Nama Lengkap</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Alias</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Nama Ayah</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tempat Lahir</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tanggal Lahir</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Warga Negara</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Agama</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Pekerjaan</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tempat Tinggal</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tempat Wafat</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tanggal Wafat (DD/MM/YYYY)</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--End Form Mantan Suami / Istri-->

            <!--Form Calon Mempelai-->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Data Calon Mempelai</h4>
                  <p class="card-category">Lengkapi form di bawah ini.</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Nama Lengkap</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Alias</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Nama Ayah</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tempat Lahir</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tanggal Lahir</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Warga Negara</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Agama</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Pekerjaan</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tempat Tinggal</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--End Form Mempelai-->
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  include 'includes/footer.php';
?>