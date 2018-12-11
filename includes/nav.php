<div class="sidebar" data-color="azure" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="index.php" class="simple-text logo-normal">
          Nikah yuk..
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form_pria.php')){echo 'active';}?>">
            <a class="nav-link" href="form_pria.php">
              <i class="material-icons">assignment</i>
              <p>Mempelai Pria</p>
            </a>
          </li>
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form_wanita.php')){echo 'active';}?>">
            <a class="nav-link" href="form_wanita.php">
              <i class="material-icons">perm_contact_calendar</i>
              <p>Mempelai Wanita</p>
            </a>
          </li>
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form_pria_ortu.php')){echo 'active';}?>">
            <a class="nav-link" href="form_pria_ortu.php">
              <i class="material-icons">wc</i>
              <p>Orangtua Pria</p>
            </a>
          </li>
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form_wanita_ortu.php')){echo 'active';}?>">
            <a class="nav-link" href="form_wanita_ortu.php">
              <i class="material-icons">group</i>
              <p>Orangtua Wanita</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link bg-dark" href="cetak.php">
              <i class="material-icons">print</i>
              <p>CETAK</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!--End Sidebar-->