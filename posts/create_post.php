<?php
session_start();
include '../config.php';

// تأكد إن المستخدم عامل login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['user_id'];

    // تأمين المدخلات
    $type = trim($_POST['type']);
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $budget = floatval($_POST['budget']);
    $tags = trim($_POST['tags']);

    // ❗ منع التكرار (لو نفس البوست اتبعت مرتين بسرعة)
    $check = $conn->prepare("
        SELECT id FROM posts 
        WHERE client_id=? AND title=? AND description=? 
        ORDER BY id DESC LIMIT 1
    ");

    $check->bind_param("iss", $user_id, $title, $description);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        // موجود قبل كده → متسجلش تاني
        header("Location: ../Home/find_work.php");
        exit();
    }

    // ✅ إدخال البيانات
    $stmt = $conn->prepare("
        INSERT INTO posts 
        (client_id, type, title, description, budget, tags) 
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param("isssds", $user_id, $type, $title, $description, $budget, $tags);

    if ($stmt->execute()) {
        header("Location: ../Home/find_work.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>