<?php 
session_destroy();
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../index.php?");

	// cek jika user login sebagai karyawan
	}else if($data['level']=="karyawan"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "karyawan";
		// alihkan ke halaman dashboard pegawai
		header("location:../index.php?");

	// cek jika user login sebagai kabag
	}else if($data['level']=="kabag"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "kabag";
		// alihkan ke halaman dashboard kabag
        header("location:../approval.php");
        
        // cek jika user login sebagai manager
	}else if($data['level']=="manager"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "manager";
		// alihkan ke halaman dashboard manager
		header("location:../approval.php");

	}else{
		echo "Username Atau Password Salah";
		// alihkan ke halaman login kembali
		header("location:../index.php?pesan=gagal");
	}	
}else{
	echo "Username Atau Password Salah";
	header("location:../index.php?pesan=gagal");
}

?>