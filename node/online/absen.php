<?php
$servername = "localhost";
$dbname = "id19641627_db_absensi";
$username = "id19641627_root";
$password = "Jo9WS!XT/4YomM}|";
$api_key_value = "nY8n42qNJzP-R5WnOn-erT0JVeTvdIduWtidVFoG8RQ9jHxtfc";

$api_key = $address = $rfid = $waktu = $tanggal = $nip = $id_alat = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $address = test_input($_POST["address"]);
        $rfid = test_input($_POST["rfid"]);
        $waktu = test_input($_POST["waktu"]);
        $tanggal = test_input($_POST["tanggal"]);

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM pegawai WHERE rfid= '$rfid'";
        $result = $conn->query($sql);
        // echo $result;
        if ($result->num_rows > 0) {  
            while($row = $result->fetch_assoc()) {
                $nip = $row["nip"];
            }  
            $sql1 = "SELECT * FROM alat where address='$address'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) {
                    $id_alat = $row1["id_alat"];
                }
                $sql2 = "INSERT INTO absensi (id_absen, nip, id_alat, waktu, tanggal)
                VALUES ('0', '" . $nip . "', '" . $id_alat . "' , '" . $waktu . "' , '" . $tanggal . "')";
                if ($conn->query($sql2) == TRUE) {
                    echo "/absen:berhasil";
                } 
                else {
                    echo "/absensi:gagal";
                }
            } else{
                echo "/absensi:gagal";
            }
        } else{
            echo "/absensi:gagal";
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