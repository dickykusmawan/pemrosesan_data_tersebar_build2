<?php
    include "config.php";
    session_start();
    $sesionusername=$_SESSION['username'];
    $sesionlevel=$_SESSION['level'];
    if(isset($_POST['nik'])) {
        $nik            =$_POST['nik'];
        $nama           =$_POST['nama_karyawan'];
        $jeniskelamin   =$_POST['jenis_kelamin'];
        $departement    =$_POST['departement'];
        $bagian         =$_POST['bagian'];
        $jabatan        =$_POST['jabatan'];
        $datetime       =$_POST['datetime'];
        $deskripsi      =$_POST['deskripsi'];

        //$query = "insert into a (kulum) VALUES ('a')";
        $query = "INSERT INTO form (nik,nama_karyawan,jenis_kelamin,departement,bagian,jabatan,datetime,deskripsi)VALUES('$nik','$nama','$jeniskelamin','$departement','$bagian','$jabatan','$datetime','$deskripsi')";
        mysqli_query($koneksi, $query);
        header("location:../formlembur.php");
    }

    if(isset($_POST['password_lama'])){
        $passlama = $_POST['password_lama'];
        $passbaru1 = $_POST['password_baru1'];
        $passbaru2 = $_POST['password_baru2'];

        if($passbaru1==$passbaru2){
            $query2 = "SELECT password FROM user WHERE username = '$sesionusername'";
            $result = mysqli_query($koneksi, $query2);
            $row = mysqli_fetch_array($result);
            if($passlama==$row['password']){
                $query2 = "UPDATE user SET PASSWORD = '$passbaru1' WHERE username = '$sesionusername'";
                mysqli_query($koneksi, $query2);
                header("location:../changepass.php");
            }
            else{
                echo "Password lama anda salah";
            }
        }
        else{
            echo "Password tidak sama";
        }
        //header("location:../changepass.php");
    }

    if(isset($_GET['val'])){
        $data=$_GET['id'];
        if($_GET['val']=='1'){
            if($sesionlevel=='kabag'){
                $query = "UPDATE form SET kabagaprov='Approve' WHERE id_form='$data'";
                mysqli_query($koneksi, $query);
                header("location:../approval.php");
            }
            else if($sesionlevel=='manager'){
                $query = "UPDATE form SET manageraprov='Approve' WHERE id_form='$data'";
                mysqli_query($koneksi, $query);
                header("location:../approval.php");
            }
        }
        else if($_GET['val']=='2'){
            if($sesionlevel=='kabag'){
                $query = "UPDATE form SET kabagaprov='Reject' WHERE id_form='$data'";
                mysqli_query($koneksi, $query);
                header("location:../approval.php");
            }
            else if($sesionlevel=='manager'){
                $query = "UPDATE form SET manageraprov='Reject' WHERE id_form='$data'";
                mysqli_query($koneksi, $query);
                header("location:../approval.php");
            }
        }
    }
?>