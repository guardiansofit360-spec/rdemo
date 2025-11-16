<?php
session_start();

// Load menu items
function getMenuItems() {
    if (file_exists('data/menu.json')) {
        return json_decode(file_get_contents('data/menu.json'), true);
    }
    return [];
}

$menuItems = getMenuItems();
// For demo, show first 3 items as favorites
$favorites = array_slice($menuItems, 0, 3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites - Restaurant Order Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/favorites.css">
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

        <main class="favorites-content">
            <?php if (empty($favorites)): ?>
            <div class="empty-favorites">
                <i class="fas fa-heart"></i>
                <p>No favorites yet</p>
                <span class="empty-text">Start adding your favorite dishes!</span>
                <a href="index.php" class="btn-primary">Browse Menu</a>
            </div>
            <?php else: ?>
            <div class="favorites-list">
                <?php foreach ($favorites as $item): ?>
                <div class="favorite-card">
                    <div class="favorite-image">
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                        <button class="remove-favorite-btn">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="favorite-info">
                        <h3><?php echo $item['name']; ?></h3>
                        <p class="restaurant-name"><?php echo $item['restaurant']; ?></p>
                        <p class="description"><?php echo $item['description']; ?></p>
                        <div class="favorite-footer">
                            <span class="price">$<?php echo $item['price']; ?></span>
                            <button class="add-to-cart-btn" onclick="addToCart(<?php echo $item['id']; ?>)">
                                <i class="fas fa-shopping-bag"></i>
                                <span>Add to Cart</span>
                            </button>
                        </div>
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
            <a href="orders.php" class="nav-item">
                <i class="fas fa-receipt"></i>
            </a>
            <a href="cart.php" class="nav-item">
                <i class="fas fa-shopping-bag"></i>
            </a>
            <a href="favorites.php" class="nav-item active">
                <i class="fas fa-heart"></i>
            </a>
            <a href="profile.php" class="nav-item">
                <i class="fas fa-user"></i>
            </a>
        </nav>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
