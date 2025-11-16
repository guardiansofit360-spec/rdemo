<?php
session_start();

$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    header('Location: cart.php');
    exit;
}

$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Restaurant Order Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="mobile-container">
        <header class="header">
            <div class="header-content">
                <div class="profile-pic">
                    <img src="assets/profile.jpg" alt="Profile" id="profileImg">
                </div>
                
                <div class="location">
                    <span class="location-label">Location</span>
                    <div class="location-value">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>New York, USA</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                
                <div class="notification-icon">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge"></span>
                </div>
            </div>
        </header>

        <main class="checkout-content">
            <form id="checkoutForm">
                <div class="form-section">
                    <h2>Delivery Address</h2>
                    <div class="form-group">
                        <input type="text" name="address" placeholder="Street Address" required>
                    </div>
                    <div class="form-row">
                        <input type="text" name="city" placeholder="City" required>
                        <input type="text" name="zip" placeholder="ZIP" required>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Contact Information</h2>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Phone Number" required>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Payment Method</h2>
                    <div class="payment-options">
                        <label class="payment-option">
                            <input type="radio" name="payment" value="card" checked>
                            <span><i class="fas fa-credit-card"></i> Credit Card</span>
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment" value="cash">
                            <span><i class="fas fa-money-bill"></i> Cash on Delivery</span>
                        </label>
                    </div>
                </div>

                <div class="order-summary">
                    <h2>Order Summary</h2>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>$<?php echo number_format($total, 2); ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Delivery Fee</span>
                        <span>$2.50</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>$<?php echo number_format($total + 2.50, 2); ?></span>
                    </div>
                </div>

                <button type="submit" class="btn-place-order">Place Order</button>
            </form>
        </main>

        <nav class="bottom-nav">
            <a href="index.php" class="nav-item">
                <i class="fas fa-home"></i>
            </a>
            <a href="orders.php" class="nav-item">
                <i class="fas fa-receipt"></i>
            </a>
            <a href="cart.php" class="nav-item active">
                <i class="fas fa-shopping-bag"></i>
            </a>
            <a href="favorites.php" class="nav-item">
                <i class="fas fa-heart"></i>
            </a>
            <a href="profile.php" class="nav-item">
                <i class="fas fa-user"></i>
            </a>
        </nav>
    </div>

    <script src="js/checkout.js"></script>
</body>
</html>
