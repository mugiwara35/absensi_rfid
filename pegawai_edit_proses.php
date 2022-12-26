<?php 
    session_start();
    include 'koneksi.php'; 
    if(!isset($_POST["nip"])){
      header("Location: index.php?error=4");
    }else{
      $nip = $_POST["nip"];
      $rfid = $_POST["rfid"];
      $nama = $_POST["nama"];
      $kelas_jabatan = $_POST["kelas_jabatan"];
    }
    $result = mysqli_query($koneksi, "UPDATE pegawai set rfid = '$rfid', nama = '$nama', kelas_jabatan = '$kelas_jabatan' WHERE nip = '$nip'");
    // echo $result;
    // if($result){
    //     $_SESSION['action_akun'] = "Edit";
    //     $_SESSION['status_akun'] = "Berhasil";
    // }
    header("location:index_pegawai.php");
?>