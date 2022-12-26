<?php
$servername = "localhost";
$dbname = "db_absensi";
$username = "root";
$password = "";
$api_key_value = "nY8n42qNJzP-R5WnOn-erT0JVeTvdIduWtidVFoG8RQ9jHxtfc";

$api_key = $user = $pass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $user = test_input($_POST["user"]);
        $pass = test_input($_POST["pass"]);
    
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM akun WHERE username= '$user' AND password ='$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            //   echo "id akun: " . $row["id_akun"]. " - Username: " . $row["username"]. " " . $row["password"]. "<br>";
              echo "/id_akun:" . $row["id_akun"];
            }
          } else {
            echo "/id_akun:gagal";
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