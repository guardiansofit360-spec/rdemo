<?php
session_start();

// If already logged in, redirect to home
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Load users
    $users = json_decode(file_get_contents('data/users.json'), true);
    
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            
            header('Location: index.php');
            exit;
        }
    }
    
    $error = 'Invalid email or password';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Restaurant Order Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="mobile-container">
        <div class="auth-container">
            <div class="auth-header">
                <div class="logo">
                    <i class="fas fa-utensils"></i>
                </div>
                <h1>Welcome Back</h1>
                <p>Sign in to continue ordering</p>
            </div>

            <?php if ($error): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $error; ?>
            </div>
            <?php endif; ?>

            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label>Email Address</label>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-auth">Sign In</button>
            </form>

            <div class="auth-divider">
                <span>OR</span>
            </div>

            <div class="social-login">
                <button class="btn-social google">
                    <i class="fab fa-google"></i>
                    <span>Continue with Google</span>
                </button>
                <button class="btn-social facebook">
                    <i class="fab fa-facebook-f"></i>
                    <span>Continue with Facebook</span>
                </button>
            </div>

            <div class="auth-footer">
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>

            <div class="demo-credentials">
                <p class="demo-title">Demo Credentials:</p>
                <div class="demo-item">
                    <strong>Customer:</strong> customer@example.com / customer123
                </div>
                <div class="demo-item">
                    <strong>Admin:</strong> admin@restaurant.com / admin@2024
                </div>
            </div>
        </div>
    </div>
</body>
</html>
