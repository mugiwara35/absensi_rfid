<?php

/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "localhost";

// REPLACE with your Database name
$dbname = "db_absensi";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $user = $pass = "";
echo "ilham dan shafira selamanya";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $user = test_input($_POST["user"]);
        $pass = test_input($_POST["pass"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM akun WHERE username= '$user' AND password ='$pass'";
        $result = $conn->query($sql);
        // $cek1 = mysqli_num_rows($data1);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "id akun: " . $row["id_akun"]. " - Username: " . $row["username"]. " " . $row["password"]. "<br>";
            }
          } else {
            echo "0 results";
          }
        // $sql = "INSERT INTO akun (id_akun, username, password)
        // VALUES ('', '" . $user . "', '" . $pass . "')";
        
        // if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        // } 
        // else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }
    
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