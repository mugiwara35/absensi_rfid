<?php 
  include 'koneksi.php';
  if(isset($_POST["id_alat"])){
    $id_alat = $_POST["id_alat"];
  }else{
    header("Location:index_alat.php");
  }
  $result = mysqli_query($koneksi, "DELETE FROM alat WHERE id_alat = '$id_alat'");
  
  header("location:index_alat.php");
?>