<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Restaurant Order Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
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

        <main class="profile-content">
            <div class="profile-section">
                <div class="profile-avatar">
                    <img src="assets/profile.jpg" alt="Profile">
                    <button class="edit-avatar-btn">
                        <i class="fas fa-camera"></i>
                    </button>
                </div>
                <h2 class="profile-name">John Doe</h2>
                <p class="profile-email">john.doe@example.com</p>
            </div>

            <div class="profile-menu">
                <div class="menu-section">
                    <h3 class="section-title">Account</h3>
                    <a href="#" class="menu-item">
                        <div class="menu-item-left">
                            <i class="fas fa-user"></i>
                            <span>Edit Profile</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <a href="#" class="menu-item">
                        <div class="menu-item-left">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Addresses</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <a href="#" class="menu-item">
                        <div class="menu-item-left">
                            <i class="fas fa-credit-card"></i>
                            <span>Payment Methods</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>

                <div class="menu-section">
                    <h3 class="section-title">Preferences</h3>
                    <a href="#" class="menu-item">
                        <div class="menu-item-left">
                            <i class="fas fa-bell"></i>
                            <span>Notifications</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <a href="#" class="menu-item">
                        <div class="menu-item-left">
                            <i class="fas fa-language"></i>
                            <span>Language</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>

                <div class="menu-section">
                    <h3 class="section-title">Support</h3>
                    <a href="#" class="menu-item">
                        <div class="menu-item-left">
                            <i class="fas fa-question-circle"></i>
                            <span>Help Center</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <a href="#" class="menu-item">
                        <div class="menu-item-left">
                            <i class="fas fa-shield-alt"></i>
                            <span>Privacy Policy</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>

                <a href="logout.php" class="logout-btn" onclick="return confirm('Are you sure you want to logout?')">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
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
            <a href="favorites.php" class="nav-item">
                <i class="fas fa-heart"></i>
            </a>
            <a href="profile.php" class="nav-item active">
                <i class="fas fa-user"></i>
            </a>
        </nav>
    </div>
</body>
</html>
