
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Sign Up | Join TaskHunt</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #0090E0;
            --primary-hover: #00A8FF;
            --bg-body: #ffffff;
            --text-main: #001e00;
            --text-muted: #2887bb;
            --border: #cbdfe9;
            --white: #ffffff;
            --shadow: 0 4px 12px rgba(0, 30, 0, 0.05);
            --error: #dc3545;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-body);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
            color: var(--text-main);
        }

        .signup-card {
            background: var(--white);
            width: 100%;
            max-width: 550px;
            padding: 40px;
            border-radius: 12px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
        }

        header {
            text-align: center;
            margin-bottom: 32px;
        }

        h1 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 15px;
        }

        .social-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 24px;
        }

        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 10px;
            border: 1px solid var(--border);
            border-radius: 25px;
            background: #fff;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-social:hover {
            background-color: #f0f7fb;
            border-color: #0090E0;
        }

        .fa-google { color: #DB4437; }
        .fa-facebook-f { color: #0090E0; }

        .divider {
            display: flex;
            align-items: center;
            margin: 24px 0;
            color: #9dbcca;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .divider span {
            padding: 0 12px;
            font-size: 13px;
            font-weight: 500;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: 600;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: all 0.2s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px #d0eefe;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
            cursor: pointer;
            font-size: 14px;
        }

        .checkbox-group input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 25px;
            background-color: #0077B8;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background-color: #3aa2da;
        }

        footer {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: var(--text-muted);
        }

        footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }

        @media (max-width: 480px) {
            .signup-card { padding: 30px 20px; }
            .form-row { grid-template-columns: 1fr; }
            .social-container { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="signup-card">
    <header>
        <h1>Sign up as a Freelancer</h1>
        <p class="subtitle">Create your freelancer account and start earning</p>
    </header>

    <div class="social-container">
        <button class="btn-social" onclick="alert('Google login coming soon!')">
            <i class="fab fa-google"></i> Google
        </button>
        <button class="btn-social" onclick="alert('Facebook login coming soon!')">
            <i class="fab fa-facebook-f"></i> Facebook
        </button>
    </div>

    <div class="divider">
        <span>OR SIGN UP WITH EMAIL</span>
    </div>

    <div id="errorMessage" class="error-message"></div>

    <form id="signupForm" method="POST" action="process_signup.php">
        <input type="hidden" name="user_type" value="freelancer">
        
        <div class="form-row">
            <div class="form-group">
                <input type="text" name="first_name" id="firstName" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="last_name" id="lastName" placeholder="Last Name" required>
            </div>
        </div>
        
        <div class="form-group">
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>
        
        <div class="form-group">
            <input type="email" name="email" id="email" placeholder="Email Address" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <select name="skills" id="skills" required>
                    <option value="" disabled selected>Select your primary skill</option>
                    <option value="Web Developer">💻 Web Developer</option>
                    <option value="Mobile App Developer">📱 Mobile App Developer</option>
                    <option value="Frontend Developer">🎨 Frontend Developer</option>
                    <option value="Backend Developer">⚙️ Backend Developer</option>
                    <option value="Writing & Translation">✍️ Writing & Translation</option>
                    <option value="UI/UX Designer">🎯 UI/UX Designer</option>
                    <option value="Graphic Designer">🖼️ Graphic Designer</option>
                    <option value="Digital Marketing">📈 Digital Marketing</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="country" id="country" placeholder="Country" required>
            </div>
        </div>
        
        <div class="form-group">
            <textarea name="bio" id="bio" placeholder="Tell us about yourself and your experience..."></textarea>
        </div>
        
        <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Password (at least 8 characters)" required>
        </div>
        
        <div class="form-group">
            <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
        </div>

        <label class="checkbox-group">
            <input type="checkbox" id="termsCheckbox" required>
            <span>I agree to the <a href="#" style="color: #00A8FF;">Terms of Service</a> and <a href="#" style="color: #00A8FF;">Privacy Policy</a></span>
        </label>

        <button type="submit" class="btn-submit">Create My Freelancer Account</button>
    </form>

    <footer>
        Already have an account? <a href="../login/login.php">Log In</a>
    </footer>
</div>

<script>
    document.getElementById('signupForm').addEventListener('submit', function(e) {
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confirmPassword').value;
        let errorDiv = document.getElementById('errorMessage');
        
        if (password !== confirmPassword) {
            e.preventDefault();
            errorDiv.style.display = 'block';
            errorDiv.innerHTML = '❌ Passwords do not match!';
            return false;
        }
        
        if (password.length < 8) {
            e.preventDefault();
            errorDiv.style.display = 'block';
            errorDiv.innerHTML = '❌ Password must be at least 8 characters!';
            return false;
        }
        
        if (!document.getElementById('termsCheckbox').checked) {
            e.preventDefault();
            errorDiv.style.display = 'block';
            errorDiv.innerHTML = '❌ You must agree to the Terms and Conditions!';
            return false;
        }
        
        errorDiv.style.display = 'none';
    });
</script>

</body>
</html>