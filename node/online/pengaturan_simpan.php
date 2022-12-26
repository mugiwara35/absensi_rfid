<?php
$servername = "localhost";
$dbname = "id19641627_db_absensi";
$username = "id19641627_root";
$password = "Jo9WS!XT/4YomM}|";
$api_key_value = "nY8n42qNJzP-R5WnOn-erT0JVeTvdIduWtidVFoG8RQ9jHxtfc";

$api_key = $id_alat = $ip_alat = $nama_alat = $lokasi_alat = $ssid = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $id_alat = test_input($_POST["id_alat"]);
        $ip_alat = test_input($_POST["ip_alat"]); 
        $nama_alat = test_input($_POST["nama_alat"]); 
        $lokasi_alat = test_input($_POST["lokasi_alat"]);   
        $ssid = test_input($_POST["ssid"]); 
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "UPDATE alat SET ip_alat='$ip_alat', nama_alat='$nama_alat', lokasi_alat='$lokasi_alat', ssid='$ssid' WHERE id_alat='$id_alat'";
        if ($conn->query($sql) == TRUE) {
            echo "/id_alat:".$id_alat."&ip_alat:".$ip_alat."&nama_alat:".$nama_alat."&lokasi_alat:".$lokasi_alat."&ssid:".$ssid;
        } 
        else {
            echo "/id_alat:gagal";
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