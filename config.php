<?php
$conn = new mysqli("localhost", "root", "", "taskhunt");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>