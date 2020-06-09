<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <?php include "data/header.php"?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php include "data/wraper.php"?>

</aside>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Approval</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Approval</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Approval Status</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jenis.k</th>
                      <th>Departement</th>
                      <th>Bagian</th>
                      <th>Jabatan</th>
                      <th>Tanggal</th>
                      <th>Deskripsi</th>
                      <th>Sts Aprv.Kbag</th>
                      <th>Sts Aprv.Mngr</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    include "data/config.php";
                    $sessioname = $_SESSION['username'];
                    $query2 = "SELECT * FROM form";
                    $result = mysqli_query($koneksi, $query2);
                    //$row = mysqli_fetch_array($result);
                    if ($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                        
                        echo " <tr>";
                        echo " <td>".$row['nik']."</td> ";
                        echo " <td>".$row['nama_karyawan']."</td> ";
                        echo " <td>".$row['jenis_kelamin']."</td> ";
                        echo " <td>".$row['departement']."</td> ";
                        echo " <td>".$row['bagian']."</td> ";
                        echo " <td>".$row['jabatan']."</td> ";
                        echo " <td>".$row['datetime']."</td> ";
                        echo " <td>".$row['deskripsi']."</td> ";
                        echo " <td>".$row['kabagaprov']."</td> ";
                        echo " <td>".$row['manageraprov']."</td> ";
                        echo " <td><button type='button' class='btn btn-block btn-primary btn-sm' onClick=\"document.location.href='data/proses.php?val=1&id=".$row['id_form']."'\">Accept</button></td>";
                        echo " <td><button type='button' class='btn btn-block btn-danger btn-sm' onClick=\"document.location.href='data/proses.php?val=2&id=".$row['id_form']."'\">Reject</button></td> ";
                        echo " </tr>";
                        
                    }
                  }
                  ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>
