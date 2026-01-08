<?php
$servername = "localhost";
$username = "root";
$password = ""; // ถ้าใช้ MAMP รหัสอาจจะเป็น root
$dbname = "workshop_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตั้งค่าภาษาไทย
mysqli_set_charset($conn, "utf8");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>