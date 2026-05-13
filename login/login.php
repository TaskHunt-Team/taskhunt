<?php
session_start();
include '../config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: ../Dashboard/admin_dashboard.php");
            } elseif ($user['role'] == 'client') {
                header("Location: ../Home/client_home.php");
            } else {
                header("Location: ../Home/freelancer_home.php");
            }

            exit();

        } else {
            $error = "Wrong password";
        }

    } else {
        $error = "Email not found";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TaskHunt</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="logn.css">
</head>
<body>

<div class="login-card">
    <header>
        <h1>Log in to TaskHunt</h1>
        <p class="subtitle">Log in to continue</p>
    </header>

    <div class="social-container">
        <button class="btn-social">
            <i class="fab fa-google"></i> Google
        </button>
        <button class="btn-social">
            <i class="fab fa-facebook-f"></i> Facebook
        </button>
    </div>

    <div class="divider">
        <span>OR LOGIN WITH EMAIL</span>
    </div>

  <form action="login.php" method="POST">

    <div class="form-group">
        <input type="email" name="email" placeholder="Email" required>
    </div>

    <div class="form-group">
        <input type="password" name="password" placeholder="Password" required>
    </div>

    <div class="form-options">
        <label class="checkbox-group">
            <input type="checkbox">
            <span>Remember me</span>
        </label>
    </div>

    <button type="submit" class="btn-submit">Log In</button>

</form>

    <footer>
        Don't have an account? <a href="../signup/asksignup.html">Sign Up</a>
    </footer>
</div>


</body>
</html>