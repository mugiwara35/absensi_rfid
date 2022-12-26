<?php 
    session_start();
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $tanggal = date("Y-m-d");
    // echo $username;
    // echo $password;
    // die;
    $data1 = mysqli_query($koneksi, "SELECT * FROM akun WHERE username= '$username' AND password ='$password'");

    $cek1 = mysqli_num_rows($data1);

    if($cek1 > 0){     
        while($d = mysqli_fetch_array($data1)){
            $id_akun = $d['id_akun'];
            $nama_akun = $d['nama_akun'];
        }
        $_SESSION['id_akun'] = $id_akun;
        $_SESSION['nama_akun'] = $nama_akun;
        $_SESSION['tanggal'] = $tanggal;

        header("location:index_absen.php");
    }else{
        header("location:index.php?pesan=Gagal Login");
    }
?>