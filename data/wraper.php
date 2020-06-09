<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i> Menu</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Nama Perusahaan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="index.php" class="nav-link" <?php if($_SESSION['level']=="manager" || $_SESSION['level']=="kabag"){echo "style='display:none'";}?>>
              <i class="nav-icon fas fi-home"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          
          <li class="nav-item" <?php if($_SESSION['level']=="manager" || $_SESSION['level']=="kabag"){echo "style='display:none'";}?>>
            <a href="myaccount.php" class="nav-link">
              <i class="nav-icon fas fi-person"></i>
              <p>
                My Info
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item" <?php if($_SESSION['level']=="manager" || $_SESSION['level']=="kabag"){echo "style='display:none'";}?>>
            <a href="FormLembur.php" class="nav-link">
              <i class="nav-icon fas fi-spreadsheet"></i>
              <p>
                Form Lembur
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="approval.php" class="nav-link"<?php if($_SESSION['level']=="karyawan"){echo "style='display:none'";}?>>
              <i class="nav-icon fas fi-task"></i>
              <p>
                Approve & Reject
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item" <?php if($_SESSION['level']=="manager" || $_SESSION['level']=="kabag"){echo "style='display:none'";}?>>
            <a href="changepass.php" class="nav-link">
              <i class="nav-icon fas fi-key"></i>
              <p>
                Change Password
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
              <a href="login.php" class="fi-account-logout" >Logout</a>
            </div>
          </div>
<!-- /.content-wrapper -->