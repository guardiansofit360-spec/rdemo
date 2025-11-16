<?php
session_start();

// If already logged in, redirect to home
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validation
    if (empty($name) || empty($email) || empty($phone) || empty($password)) {
        $error = 'All fields are required';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters';
    } else {
        // Load existing users
        $users = json_decode(file_get_contents('data/users.json'), true);
        
        // Check if email already exists
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                $error = 'Email already registered';
                break;
            }
        }
        
        if (!$error) {
            // Create new user
            $newUser = [
                'id' => count($users) + 1,
                'email' => $email,
                'password' => $password,
                'name' => $name,
                'phone' => $phone,
                'address' => '',
                'role' => 'customer',
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $users[] = $newUser;
            file_put_contents('data/users.json', json_encode($users, JSON_PRETTY_PRINT));
            
            // Auto login
            $_SESSION['user_id'] = $newUser['id'];
            $_SESSION['user_name'] = $newUser['name'];
            $_SESSION['user_email'] = $newUser['email'];
            $_SESSION['user_role'] = $newUser['role'];
            
            header('Location: index.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Restaurant Order Booking</title>
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
                <h1>Create Account</h1>
                <p>Sign up to start ordering</p>
            </div>

            <?php if ($error): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $error; ?>
            </div>
            <?php endif; ?>

            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label>Full Name</label>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" placeholder="Enter your full name" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Email Address</label>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Enter your email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <div class="input-group">
                        <i class="fas fa-phone"></i>
                        <input type="tel" name="phone" placeholder="Enter your phone number" required value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Create a password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="confirm_password" placeholder="Confirm your password" required>
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" required>
                        <span>I agree to Terms & Conditions</span>
                    </label>
                </div>

                <button type="submit" class="btn-auth">Create Account</button>
            </form>

            <div class="auth-divider">
                <span>OR</span>
            </div>

            <div class="social-login">
                <button class="btn-social google">
                    <i class="fab fa-google"></i>
                    <span>Sign up with Google</span>
                </button>
                <button class="btn-social facebook">
                    <i class="fab fa-facebook-f"></i>
                    <span>Sign up with Facebook</span>
                </button>
            </div>

            <div class="auth-footer">
                <p>Already have an account? <a href="login.php">Sign In</a></p>
            </div>
        </div>
    </div>
</body>
</html>
