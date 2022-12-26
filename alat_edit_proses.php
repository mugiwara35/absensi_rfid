<?php 
    session_start();
    include 'koneksi.php'; 
    if(!isset($_POST["id_alat"])){
      header("Location: index.php?error=4");
    }else{
      $id_alat = $_POST["id_alat"];
      $ip_alat = $_POST["ip_alat"];
      $nama_alat = $_POST["nama_alat"];
      $lokasi_alat = $_POST["lokasi_alat"];
    }

    // echo $id_alat;
    // echo $ip_alat;
    // echo $nama_alat;
    // echo $lokasi_alat;
    // die;
    $result = mysqli_query($koneksi, "UPDATE alat set ip_alat = '$ip_alat', nama_alat = '$nama_alat', lokasi_alat = '$lokasi_alat' WHERE id_alat = '$id_alat'");
    // echo $result;
    // if($result){
    //     $_SESSION['action_akun'] = "Edit";
    //     $_SESSION['status_akun'] = "Berhasil";
    // }
    header("location:index_alat.php");
?>