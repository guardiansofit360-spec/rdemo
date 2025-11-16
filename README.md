# Restaurant Order Booking System

A modern, mobile-first restaurant ordering web application built with PHP, JavaScript, and CSS.

![Restaurant Demo](https://img.shields.io/badge/Status-Active-success)
![PHP](https://img.shields.io/badge/PHP-7.4+-blue)
![License](https://img.shields.io/badge/License-MIT-green)

## 🍔 Features

- **User Authentication**
  - Login & Signup functionality
  - Session management
  - Role-based access (Customer, Admin, Manager, Staff)

- **Customer Features**
  - Browse menu with categories
  - Add items to cart
  - Manage favorites
  - Place orders
  - View order history
  - Profile management

- **Modern UI/UX**
  - Mobile-first responsive design
  - Smooth animations and transitions
  - Dark/Light theme support
  - Floating promo banner with stars animation
  - Optimized for all screen sizes

- **Pages Included**
  - Home (Menu browsing)
  - Cart
  - Checkout
  - Orders
  - Favorites
  - Profile
  - Login/Signup

## 🚀 Demo

Visit the live demo: [Restaurant Demo](https://your-demo-url.com)

## 📋 Prerequisites

- PHP 7.4 or higher
- Web server (Apache/Nginx)
- Modern web browser

## 💻 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/guardiansofit360-spec/rdemo.git
   cd rdemo
   ```

2. **Set up web server**
   - For XAMPP: Copy to `htdocs/rdemo`
   - For WAMP: Copy to `www/rdemo`
   - For MAMP: Copy to `htdocs/rdemo`

3. **Start your web server**
   - Start Apache
   - Navigate to `http://localhost/rdemo`

4. **Login with demo credentials**
   - Customer: `customer@example.com` / `customer123`
   - Admin: `admin@restaurant.com` / `admin@2024`

## 📁 Project Structure

```
rdemo/
├── assets/              # Images and media files
├── css/                 # Stylesheets
│   ├── style.css       # Main styles
│   ├── auth.css        # Authentication pages
│   ├── cart.css        # Cart page
│   ├── checkout.css    # Checkout page
│   ├── orders.css      # Orders page
│   ├── favorites.css   # Favorites page
│   └── profile.css     # Profile page
├── data/               # JSON data files
│   ├── menu.json       # Menu items
│   ├── orders.json     # Order history
│   └── users.json      # User accounts
├── js/                 # JavaScript files
│   ├── script.js       # Main scripts
│   ├── cart.js         # Cart functionality
│   └── checkout.js     # Checkout functionality
├── api/                # API endpoints
├── index.php           # Home page
├── login.php           # Login page
├── signup.php          # Registration page
├── logout.php          # Logout handler
├── cart.php            # Shopping cart
├── checkout.php        # Checkout page
├── orders.php          # Order history
├── favorites.php       # Favorite items
├── profile.php         # User profile
├── CREDENTIALS.md      # Login credentials
└── README.md           # This file
```

## 🔐 Login Credentials

### Customer Accounts
- **Email:** customer@example.com | **Password:** customer123
- **Email:** jane.smith@example.com | **Password:** jane2024
- **Email:** demo@customer.com | **Password:** demo123

### Admin Accounts
- **Email:** admin@restaurant.com | **Password:** admin@2024 (Full Access)
- **Email:** manager@restaurant.com | **Password:** manager123 (Manager)
- **Email:** staff@restaurant.com | **Password:** staff123 (Staff)

See [CREDENTIALS.md](CREDENTIALS.md) for complete details.

## 🎨 Features Showcase

### Animated Promo Banner
- Floating animation on promo image
- Twinkling stars background effect
- Responsive design

### Category Filtering
- Dynamic menu filtering by category
- Smooth transitions
- Active state indicators

### Shopping Cart
- Add/remove items
- Quantity management
- Real-time total calculation
- Persistent cart (session-based)

### Order Management
- Order history with status
- Order details view
- Status tracking (Pending, Completed, Cancelled)

## 🛠️ Technologies Used

- **Frontend:**
  - HTML5
  - CSS3 (Flexbox, Grid, Animations)
  - JavaScript (ES6+)
  - Font Awesome Icons

- **Backend:**
  - PHP 7.4+
  - JSON for data storage
  - Session management

## 📱 Responsive Design

The application is fully responsive and optimized for:
- Mobile devices (320px - 430px)
- Tablets (431px - 768px)
- Desktop (769px+)

## 🔒 Security Notes

⚠️ **Important:** This is a demo application with basic authentication.

For production use:
- Implement password hashing (bcrypt/Argon2)
- Use prepared statements for database queries
- Add CSRF protection
- Implement rate limiting
- Use HTTPS
- Add input validation and sanitization
- Implement proper session security

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Authors

- **Your Name** - *Initial work* - [guardiansofit360-spec](https://github.com/guardiansofit360-spec)

## 🙏 Acknowledgments

- Font Awesome for icons
- Google Fonts for typography
- Inspiration from modern food delivery apps

## 📞 Support

For support, email support@restaurant.com or open an issue in the repository.

## 🔄 Updates

- **v1.0.0** (November 2025) - Initial release
  - User authentication
  - Menu browsing
  - Cart and checkout
  - Order management
  - Profile management
  - Favorites system

---

Made with ❤️ by [guardiansofit360-spec](https://github.com/guardiansofit360-spec)
