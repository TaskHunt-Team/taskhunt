<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $role       = $_POST['user_type'];

    // لو freelancer فيه username
    $username = $_POST['username'] ?? '';

    // تشفير الباسورد
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // check email
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "❌ Email already exists";
        exit();
    }

    // insert
    $sql = $conn->prepare("INSERT INTO users 
    (first_name, last_name, username, email, password, role) 
    VALUES (?, ?, ?, ?, ?, ?)");

    $sql->bind_param("ssssss",
        $first_name,
        $last_name,
        $username,
        $email,
        $hashed_password,
        $role
    );

    if ($sql->execute()) {
        header("Location: ../login/login.php");
        exit();
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>