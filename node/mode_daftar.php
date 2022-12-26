<?php
$servername = "localhost";
$dbname = "db_absensi";
$username = "root";
$password = "";
$api_key_value = "nY8n42qNJzP-R5WnOn-erT0JVeTvdIduWtidVFoG8RQ9jHxtfc";

$api_key = $nip = $rfid = $nama = $kelas_jabatan = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $nip = test_input($_POST["nip"]);
        $rfid = test_input($_POST["rfid"]);    
        $nama = test_input($_POST["nama"]); 
        $kelas_jabatan = test_input($_POST["kelas_jabatan"]); 
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM pegawai WHERE rfid='$rfid')";
        $result = $conn->query($sql);
            if (!$result) {    
                $sql1 = "INSERT INTO pegawai (nip, rfid, nama, kelas_jabatan)
                VALUES ('" . $nip . "', '" . $rfid . "' , '" . $nama . "' , '" . $kelas_jabatan . "')";
                if ($conn->query($sql1) === TRUE) {
                    echo "/nip:berhasil";
                } else{
                    echo "/nip:gagal";  
                }
            } else {
                echo "/nip:gagal";
            }
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }
}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}