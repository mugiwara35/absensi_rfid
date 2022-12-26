<?php 
include 'koneksi.php';
if(isset($_POST["nip"])){
  $nip = $_POST["nip"];
}else{
  header("Location:index_pegawai.php");
}

$result = mysqli_query($koneksi, "DELETE FROM pegawai WHERE nip = '$nip'");
    // if($result){
    //   $_SESSION['action_akun'] = "Hapus";
    //   $_SESSION['status_akun'] = "Berhasil";
    // }else{
    //   $_SESSION['action_akun'] = "Hapus";
    //   $_SESSION['status_akun'] = "Gagal";
    // }

  header("location:index_pegawai.php");
?>
