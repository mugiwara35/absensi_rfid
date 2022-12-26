<?php 
    session_start();
    include 'koneksi.php'; 

    if(isset($_SESSION["id_akun"])){
        $id_akun = $_SESSION["id_akun"];
    } else{
    header("Location:index.php");
    }
    
    if(!isset($_POST["username"])){
      header("Location: index.php?error=4");
    }else{
      $nama_akun = $_POST["nama_akun"];
      $username = $_POST["username"];
      $password = $_POST["password"];
    }

    

    if($nama_akun == "" || $username == "" || $password == ""){
        header("Location:akun_edit.php");
    }else{
        $result = mysqli_query($koneksi, "UPDATE akun set nama_akun = '$nama_akun', username = '$username', password = '$password' WHERE id_akun = '$id_akun'");
        // echo $result;
        if($result){
            $_SESSION["nama_akun"] = $nama_akun;
            header("location:akun_edit.php");
        }
    }
?>