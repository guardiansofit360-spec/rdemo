<?php
session_start();

// Load orders
$ordersFile = 'data/orders.json';
$orders = json_decode(file_get_contents($ordersFile), true);
$orders = array_reverse($orders); // Show newest first
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Restaurant Order Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/orders.css">
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

        <main class="orders-content">
            <?php if (empty($orders)): ?>
            <div class="empty-orders">
                <i class="fas fa-receipt"></i>
                <p>No orders yet</p>
                <a href="index.php" class="btn-primary">Start Ordering</a>
            </div>
            <?php else: ?>
            <div class="orders-list">
                <?php foreach ($orders as $order): ?>
                <div class="order-card">
                    <div class="order-header">
                        <div>
                            <h3>Order #<?php echo substr($order['id'], -8); ?></h3>
                            <p class="order-date"><?php echo date('M d, Y H:i', strtotime($order['date'])); ?></p>
                        </div>
                        <span class="order-status <?php echo $order['status']; ?>">
                            <?php echo ucfirst($order['status']); ?>
                        </span>
                    </div>
                    <div class="order-items">
                        <?php foreach ($order['items'] as $item): ?>
                        <div class="order-item">
                            <span><?php echo $item['quantity']; ?>x <?php echo $item['name']; ?></span>
                            <span>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="order-total">
                        <span>Total</span>
                        <span>$<?php echo number_format($order['total'], 2); ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </main>

        <nav class="bottom-nav">
            <a href="index.php" class="nav-item">
                <i class="fas fa-home"></i>
            </a>
            <a href="orders.php" class="nav-item active">
                <i class="fas fa-receipt"></i>
            </a>
            <a href="cart.php" class="nav-item">
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
</body>
</html>
