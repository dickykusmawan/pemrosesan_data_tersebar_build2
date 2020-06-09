<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }

    include "data/config.php";
    $sessioname = $_SESSION['username'];
    $queryy1 = "SELECT COUNT(manageraprov) FROM form LEFT JOIN user USING(nik) WHERE manageraprov ='pending' && username='$sessioname' ";
    $result = mysqli_query($koneksi, $queryy1);
    $roww1 = mysqli_fetch_array($result);

    $queryy2 = "SELECT COUNT(manageraprov) FROM form LEFT JOIN user USING(nik) WHERE manageraprov ='approve' && username='$sessioname'";
    $result = mysqli_query($koneksi, $queryy2);
    $roww2 = mysqli_fetch_array($result);

    $queryy3 = "SELECT COUNT(manageraprov) FROM form LEFT JOIN user USING(nik) WHERE manageraprov ='reject' && username='$sessioname' ";
    $result = mysqli_query($koneksi, $queryy3);
    $roww3 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
  <?php include "data/header.php"?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
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
           <h1>Dashboard</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Dashboard</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info">
              <i class="far fi-target"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">
                Pending 
              </span>
              <span class="info-box-text-subtitle">
                Dalam Proses
              </span>
              <span class="info-box-number">
              <?php echo $roww1[0]; ?> Pending
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success">
              <i class="far fi-check"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">
                Approve
              </span>
              <span class="info-box-text-subtitle">
                Lembur Disetujui
              </span>
              <span class="info-box-number">
              <?php echo $roww2[0]; ?> Approve
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger">
              <i class="far fi-x"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">
                Reject
              </span>
              <span class="info-box-text-subtitle">
                Lembur Tidak Disetujui
              </span>
              <span class="info-box-number">
              <?php echo $roww3[0]; ?> Reject
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Recent Activity</h3>

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
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Departement</th>
                      <th>Bagian</th>
                      <th>Jabatan</th>
                      <th>Tanggal</th>
                      <th>Deskripsi</th>
                      <th>Status Approve Kabag</th>
                      <th>Status Approve Manager</th>
                    </tr>
                  </thead>
                  <?php 
                  include "data/config.php";
                  $sessioname = $_SESSION['username'];
                  $query2 = "SELECT * FROM form LEFT JOIN user USING(nik) WHERE username = '$sessioname'";
                  $result = mysqli_query($koneksi, $query2);
                  //$row = mysqli_fetch_array($result);
                  if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                      echo "<tbody>";
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
                      echo " </tr>";
                      echo "</tbody>";
                    }
                  }

                  // echo "<tbody>";
                  // echo " <tr>";
                  // echo " <td>".$row['nik']."</td> ";
                  // echo " <td>".$row['nama_karyawan']."</td> ";
                  // echo " <td>".$row['jenis_kelamin']."</td> ";
                  // echo " <td>".$row['departement']."</td> ";
                  // echo " <td>".$row['bagian']."</td> ";
                  // echo " <td>".$row['jabatan']."</td> ";
                  // echo " <td>".$row['datetime']."</td> ";
                  // echo " <td>".$row['deskripsi']."</td> ";
                  // echo " <td>".$row['kabagaprov']."</td> ";
                  // echo " <td>".$row['manageraprov']."</td> ";
                  // echo " </tr>";
                  // echo "</tbody>";
                  ?>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
