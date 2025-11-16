<?php
session_start();

// Load orders from JSON
function getOrders() {
    if (file_exists('data/orders.json')) {
        return json_decode(file_get_contents('data/orders.json'), true);
    }
    return [];
}

// Load menu items from JSON
function getMenuItems() {
    if (file_exists('data/menu.json')) {
        return json_decode(file_get_contents('data/menu.json'), true);
    }
    return [];
}

$menuItems = getMenuItems();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Order Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="mobile-container">
        <!-- Header -->
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
            
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search.." id="searchInput">
                <button class="filter-btn">
                    <i class="fas fa-sliders-h"></i>
                </button>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Promo Banner -->
            <div class="promo-banner">
                <div class="promo-content">
                    <h2 class="promo-discount">27%</h2>
                    <p class="promo-text">EXTRA<br>DISCOUNT</p>
                    <p class="promo-subtext">Enjoy your first order with<br>a special discount!</p>
                </div>
                <div class="promo-image">
                    <img src="assets/promo.png" alt="Promo">
                </div>
            </div>

            <!-- Categories -->
            <div class="categories">
                <div class="category-item active" data-category="burger">
                    <div class="category-icon">
                        <img src="assets/burger.jpg" alt="Burger">
                    </div>
                    <span>Burger</span>
                </div>
                <div class="category-item" data-category="pizza">
                    <div class="category-icon">
                        <img src="assets/pizza.jpg" alt="Pizza">
                    </div>
                    <span>Pizza</span>
                </div>
                <div class="category-item" data-category="fries">
                    <div class="category-icon">
                        <img src="assets/fries.jpg" alt="Fries">
                    </div>
                    <span>Fries</span>
                </div>
                <div class="category-item" data-category="chicken">
                    <div class="category-icon">
                        <img src="assets/chicken.jpg" alt="Chicken">
                    </div>
                    <span>Chicken</span>
                </div>
                <div class="category-item" data-category="pizza">
                    <div class="category-icon">
                        <img src="assets/pizza2.jpg" alt="Pizza">
                    </div>
                    <span>Pizza</span>
                </div>
            </div>

            <!-- Food Items -->
            <div class="food-items" id="foodItems">
                <?php foreach ($menuItems as $item): ?>
                <div class="food-card" data-id="<?php echo $item['id']; ?>">
                    <?php if (!empty($item['discount'])): ?>
                    <div class="discount-badge"><?php echo $item['discount']; ?>% OFF</div>
                    <?php endif; ?>
                    <div class="food-image">
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                    </div>
                    <button class="favorite-btn">
                        <i class="far fa-heart"></i>
                    </button>
                    <div class="food-info">
                        <h3><?php echo $item['name']; ?></h3>
                        <p class="restaurant-name"><?php echo $item['restaurant']; ?></p>
                        <div class="food-footer">
                            <span class="price">$<?php echo $item['price']; ?></span>
                            <button class="add-btn" onclick="addToCart(<?php echo $item['id']; ?>)">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>

        <!-- Bottom Navigation -->
        <nav class="bottom-nav">
            <a href="index.php" class="nav-item active">
                <i class="fas fa-home"></i>
            </a>
            <a href="orders.php" class="nav-item">
                <i class="fas fa-receipt"></i>
            </a>
            <a href="cart.php" class="nav-item">
                <i class="fas fa-shopping-bag"></i>
                <span class="cart-badge" id="cartBadge">0</span>
            </a>
            <a href="favorites.php" class="nav-item">
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
