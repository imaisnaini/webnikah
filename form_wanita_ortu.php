<?php
  require_once 'core/connection.php';
  include 'includes/head.php';
  
  session_start();
  $email = $_SESSION["user"];
  $query_ayah = "SELECT * FROM tbl_ayah_wanita WHERE email='".$email."'";
  $query_ibu = "SELECT * FROM tbl_ibu_wanita WHERE email='".$email."'";
  $result_ayah = mysqli_query($conn, $query_ayah);
  $result_ibu =  mysqli_query($conn, $query_ibu);
  
  if(mysqli_num_rows($result_ayah) == 0 || mysqli_num_rows($result_ayah) == 0){
    $query_insert_ayah = "INSERT INTO tbl_ayah_wanita (email) VALUES ('$email')";
    $query_insert_ibu = "INSERT INTO tbl_ibu_wanita (email) VALUES ('$email')";
    $insert_ayah = mysqli_query($conn, $query_insert_ayah);
    $insert_ibu = mysqli_query($conn, $query_insert_ibu);
    if($insert_ayah && $insert_ibu){
      header('Refresh:0');
    }else{
      echo "Error: " . $query_insert_ayah . " && " . $query_insert_ibu. "<br>" . mysqli_error($conn);
    }
  }

  if(isset($_POST['save'])){
    $ayah_nama = $_POST['ayah_nama'];
    $ayah_tempat_lahir = $_POST['ayah_tempat_lahir'];
    $ayah_tgl_lahir = $_POST['ayah_tgl_lahir'];
    $ayah_warganegara = $_POST['ayah_warganegara'];
    $ayah_agama = $_POST['ayah_agama'];
    $ayah_pekerjaan = $_POST['ayah_pekerjaan'];
    $ayah_alamat= $_POST['ayah_alamat'];

    $ibu_nama = $_POST['ibu_nama'];
    $ibu_tempat_lahir = $_POST['ibu_tempat_lahir'];
    $ibu_tgl_lahir = $_POST['ibu_tgl_lahir'];
    $ibu_warganegara = $_POST['ibu_warganegara'];
    $ibu_agama = $_POST['ibu_agama'];
    $ibu_pekerjaan = $_POST['ibu_pekerjaan'];
    $ibu_alamat= $_POST['ibu_alamat'];

    $query_update_ayah = "UPDATE tbl_ayah_wanita SET
                      nama='$ayah_nama',
                      tempat_lahir='$ayah_tempat_lahir',
                      tgl_lahir='$ayah_tgl_lahir',
                      warganegara='$ayah_warganegara',
                      agama='$ayah_agama',
                      pekerjaan='$ayah_pekerjaan',
                      alamat='$ayah_alamat'
                    WHERE email='$email'";

    $query_update_ibu = "UPDATE tbl_ibu_wanita SET
                      nama='$ibu_nama',
                      tempat_lahir='$ibu_tempat_lahir',
                      tgl_lahir='$ibu_tgl_lahir',
                      warganegara='$ibu_warganegara',
                      agama='$ibu_agama',
                      pekerjaan='$ibu_pekerjaan',
                      alamat='$ibu_alamat'
                    WHERE email='$email'";

    $update_ayah = mysqli_query($conn, $query_update_ayah);
    $update_ibu = mysqli_query($conn, $query_update_ibu);
    if($update_ayah && $update_ibu){
      header('Refresh:0');
    }else{
      echo "Error: " . $query_update_ayah . " && " . $query_update_ibu . "<br>" . mysqli_error($conn);
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
      <nav class="navbar navbar-expand-lg navbar-dark bg-success navbar-absolute fixed-top ">
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
          <!--Form Ayah-->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Data Ayah</h4>
                  <p class="card-category">Lengkapi form di bawah ini.</p>
                </div>
                <div class="card-body">
                <form method="POST" id="myform">
                <?php
                  while($ayah = mysqli_fetch_assoc($result_ayah)){
                ?>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Nama Lengkap</label>
                        <input type="text" class="form-control" name="ayah_nama" value="<?=$ayah['nama'];?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Agama</label>
                        <input type="text" class="form-control" name="ayah_agama" value="<?=$ayah['agama'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Tempat Lahir</label>
                        <input type="text" class="form-control" name="ayah_tempat_lahir" value="<?=$ayah['tempat_lahir'];?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Tanggal Lahir (DD/MM/YYYY)</label>
                        <input type="text" class="form-control" name="ayah_tgl_lahir" value="<?=$ayah['tgl_lahir'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Warga Negara</label>
                        <input type="text" class="form-control" name="ayah_warganegara" value="<?=$ayah['warganegara'];?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Pekerjaan</label>
                        <input type="text" class="form-control" name="ayah_pekerjaan" value="<?=$ayah['pekerjaan'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Tempat Tinggal</label>
                        <input type="text" class="form-control" name="ayah_alamat" value="<?=$ayah['alamat'];?>">
                      </div>
                    </div>
                  </div>
                <?php }?>
              </div>
            </div>
          </div>            
        <!--End Form Ayah-->

          <!--Form Ibu-->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title">Data Ibu</h4>
                <p class="card-category">Lengkapi form di bawah ini.</p>
              </div>
              <div class="card-body">
              <?php
                while($ibu = mysqli_fetch_assoc($result_ibu)){
              ?>  
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Nama Lengkap</label>
                        <input type="text" class="form-control" name="ibu_nama" value="<?=$ibu['nama'];?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Agama</label>
                        <input type="text" class="form-control" name="ibu_agama" value="<?=$ibu['agama'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Tempat Lahir</label>
                        <input type="text" class="form-control" name="ibu_tempat_lahir" value="<?=$ibu['tempat_lahir'];?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Tanggal Lahir (DD/MM/YYYY)</label>
                        <input type="text" class="form-control" name="ibu_tgl_lahir" value="<?=$ibu['tgl_lahir'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Warga Negara</label>
                        <input type="text" class="form-control" name="ibu_warganegara" value="<?=$ibu['warganegara'];?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Pekerjaan</label>
                        <input type="text" class="form-control" name="ibu_pekerjaan" value="<?=$ibu['pekerjaan'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group has-info"> 
                        <label class="bmd-label-floating">Tempat Tinggal</label>
                        <input type="text" class="form-control" name="ibu_alamat" value="<?=$ibu['alamat'];?>">
                      </div>
                    </div>
                  </div>
                </form>
                  <?php } ?>
                </div>
              </div>
            </div>
          <!--End Form Ibu-->
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  include 'includes/footer.php';
?>