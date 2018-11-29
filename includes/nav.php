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
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form1.php')){echo 'active';}?>">
            <a class="nav-link" href="form1.php">
              <i class="material-icons">assignment</i>
              <p>Form 1</p>
            </a>
          </li>
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form2.php')){echo 'active';}?>">
            <a class="nav-link" href="form2.php">
              <i class="material-icons">perm_contact_calendar</i>
              <p>Form 2</p>
            </a>
          </li>
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form3.php')){echo 'active';}?>">
            <a class="nav-link" href="form3.php">
              <i class="material-icons">wc</i>
              <p>Form 3</p>
            </a>
          </li>
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form4.php')){echo 'active';}?>">
            <a class="nav-link" href="form4.php">
              <i class="material-icons">group</i>
              <p>Form 4</p>
            </a>
          </li>
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form5.php')){echo 'active';}?>">
            <a class="nav-link" href="form5.php">
              <i class="material-icons">description</i>
              <p>Form 5</p>
            </a>
          </li>
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form6.php')){echo 'active';}?>">
            <a class="nav-link" href="form6.php">
              <i class="material-icons">rate_review</i>
              <p>Form 6</p>
            </a>
          </li>
          <li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'form7.php')){echo 'active';}?>">
            <a class="nav-link" href="form7.php">
              <i class="material-icons">how_to_reg</i>
              <p>Form 7</p>
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