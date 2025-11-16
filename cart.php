<?php
session_start();

$cart = $_SESSION['cart'] ?? [];
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
    <title>Cart - Restaurant Order Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
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

        <main class="cart-content">
            <?php if (empty($cart)): ?>
            <div class="empty-cart">
                <i class="fas fa-shopping-bag"></i>
                <p>Your cart is empty</p>
                <a href="index.php" class="btn-primary">Start Shopping</a>
            </div>
            <?php else: ?>
            <div class="cart-items">
                <?php foreach ($cart as $index => $item): ?>
                <div class="cart-item">
                    <div class="item-image">
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                    </div>
                    <div class="item-details">
                        <h3><?php echo $item['name']; ?></h3>
                        <p class="item-price">$<?php echo $item['price']; ?></p>
                        <div class="quantity-controls">
                            <button onclick="updateQuantity(<?php echo $index; ?>, -1)">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span><?php echo $item['quantity']; ?></span>
                            <button onclick="updateQuantity(<?php echo $index; ?>, 1)">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="remove-btn" onclick="removeItem(<?php echo $index; ?>)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
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
                <a href="checkout.php" class="btn-checkout">Proceed to Checkout</a>
            </div>
            <?php endif; ?>
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

    <script src="js/cart.js"></script>
</body>
</html>
