<?php
session_start();
include '../config.php';

// تأكد إن المستخدم عامل login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

// تأكد إن الطلب POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $freelancer_id = $_SESSION['user_id'];

    // استلام البيانات
    $post_id = $_POST['post_id'];
    $message = $_POST['message'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];

    // حماية بسيطة
    $post_id = intval($post_id);
    $price = floatval($price);
    $message = trim($message);
    $duration = trim($duration);

    // منع التكرار (لو قدم قبل كده على نفس البوست)
    $check = $conn->prepare("
        SELECT id FROM proposals 
        WHERE post_id=? AND freelancer_id=?
        LIMIT 1
    ");
    $check->bind_param("ii", $post_id, $freelancer_id);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        // قدم قبل كده
        header("Location: ../Home/find_work.php");
        exit();
    }

    // إدخال البيانات
    $stmt = $conn->prepare("
        INSERT INTO proposals 
        (post_id, freelancer_id, message, price, duration) 
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->bind_param("iisds", $post_id, $freelancer_id, $message, $price, $duration);

    if ($stmt->execute()) {
        header("Location: ../Home/find_work.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>