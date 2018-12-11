<?php
  require_once 'core/connection.php';
  include 'includes/head.php';
  
  session_start();
  $email = $_SESSION["user"];
  $query = "SELECT * FROM tbl_pria WHERE email='".$email."'";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) == 0){
    $query_insert = "INSERT INTO tbl_pria (email) VALUES ('$email')";
    $insert = mysqli_query($conn, $query_insert);
    if($insert){
      header('Refresh:0');
    }else{
      echo "Error: " . $query_insert . "<br>" . mysqli_error($conn);
    }
  }

  if(isset($_POST['save'])){
    $nama = $_POST['nama'];
    $alias = $_POST['alias'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $warganegara = $_POST['warganegara'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];
    $alamat= $_POST['alamat'];
    $status_kawin = $_POST['status_kawin'];
    $mantan_istri = $_POST['mantan_istri'];

    $query_update = "UPDATE tbl_pria SET
                      nama='$nama',
                      alias='$alias',
                      tempat_lahir='$tempat_lahir',
                      tgl_lahir='$tgl_lahir',
                      warganegara='$warganegara',
                      agama='$agama',
                      pekerjaan='$pekerjaan',
                      alamat='$alamat',
                      status_kawin='$status_kawin',
                      mantan_istri='$mantan_istri'
                    WHERE email='$email'";
    $update = mysqli_query($conn, $query_update);
    if($update){
      header('Refresh:0');
    }else{
      echo "Error: " . $query_update . "<br>" . mysqli_error($conn);
    }
  }
?>

<body class="">
  <div class="wrapper ">
    <?php
      include 'includes/nav.php';
    ?>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-danger navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h4 class="navbar-brand"><?php echo $email; ?></h4>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <input type="submit" value="Simpan" name="save" form="myform" class="btn btn-secondary"/>
            <div class="clearfix"></div>
          </div>
        </div>
      </nav>  
      <div class="content">
        <div class="container-fluid">
          <div class="row">          
            <!--Form Mempelai-->
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">Data Mempelai Pria</h4>
                  <p class="card-category">Lengkapi form di bawah ini.</p>
                </div>
                <div class="card-body">
                <?php
                  while($row = mysqli_fetch_assoc($result)){
                ?>
                  <form method="POST" id="myform">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama" value="<?=$row['nama'];?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Alias</label>
                          <input type="text" class="form-control" name="alias" value="<?=$row['alias'];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tempat_lahir" value="<?=$row['tempat_lahir'];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tanggal Lahir (YYYY-MM-DD)</label>
                          <input type="text" class="form-control" name="tgl_lahir" value="<?=$row['tgl_lahir'];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Agama</label>
                          <input type="text" class="form-control" name="agama" value="<?=$row['agama'];?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Pekerjaan</label>
                          <input type="text" class="form-control" name="pekerjaan" value="<?=$row['pekerjaan'];?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Warganegara</label>
                          <input type="text" class="form-control" name="warganegara" value="<?=$row['warganegara'];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-info"> 
                          <label class="bmd-label-floating">Tempat Tinggal</label>
                          <input type="text" class="form-control" name="alamat" value="<?= $row['alamat'];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Status Perkawinan</label>
                        <div class="row">
                          <div class="col-md-6"> 
                            <div class="form-group has-info">
                              <label class="bmd-label-floating">Jejaka, duda atau beristri..</label>
                              <input class="form-control" name="status_kawin" rows="3" value="<?= $row['status_kawin'];?>"/>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group has-info"> 
                              <label class="bmd-label-floating">Nama Istri Terdahulu</label>
                              <input type="text" class="form-control" name="mantan_istri" value="<?= $row['mantan_istri'];?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <?php } ?>
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