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


                      <!-- <tr>
                        <td>20170801374</td>
                        <td>Dicky Kusmawan</td>
                        <td>01-06-2020</td>
                        <td><span class="tag tag-success">Pending</span></td>
                        <td>Ganti Battrei Server</td>
                        <td>
                          <button type="button" class="btn btn-block btn-primary btn-sm">Accept</button>
                        </td>
                        <td>
                          <button type="button" class="btn btn-block btn-danger btn-sm">Reject</button>
                        </td>
                      </tr>
                      <tr>
                        <td>20170801374</td>
                        <td>Dicky Kusmawan</td>
                        <td>02-06-2020</td>
                        <td><span class="tag tag-success">Pending</span></td>
                        <td>Ganti Kabel Listrik Server</td>
                        <td>
                          <button type="button" class="btn btn-block btn-primary btn-sm" onclick="location.href = 'login.php';">Accept</button>
                        </td>
                        <td>
                          <button type="button" class="btn btn-block btn-danger btn-sm">Reject</button>
                        </td>
                      </tr>
                      <tr>
                        <td>20170801374</td>
                        <td>Dicky Kusmawan</td>
                        <td>03-06-2020</td>
                        <td><span class="tag tag-success">Pending</span></td>
                        <td>Ganti Kabel Lan Server</td>
                        <td>
                          <button type="button" class="btn btn-block btn-primary btn-sm">Accept</button>
                        </td>
                        <td>
                          <button type="button" class="btn btn-block btn-danger btn-sm">Reject</button>
                        </td>
                      </tr> -->
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

<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
  
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()
  
      //Date range picker
      $('#reservationdate').datetimepicker({
          format: 'L'
      });
      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )
  
      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })
      
      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()
  
      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()
  
      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      });
  
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
  
    })
  </script>
</body>
</html>
