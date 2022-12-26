<?php
$servername = "localhost";
$dbname = "db_absensi";
$username = "root";
$password = "";
$api_key_value = "nY8n42qNJzP-R5WnOn-erT0JVeTvdIduWtidVFoG8RQ9jHxtfc";

$api_key = $address = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $address = test_input($_POST["address"]);  
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM alat WHERE address= '$address'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
             echo "/id_alat:".$row["id_alat"]."&ip_alat:".$row["ip_alat"]."&nama_alat:".$row["nama_alat"]."&lokasi_alat:".$row["lokasi_alat"]."&ssid:".$row["ssid"];
            }
          } else {
            echo "/id_alat:belum";
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