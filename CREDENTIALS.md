# Restaurant Order Booking - Login Credentials

## Customer Login Credentials

### Customer Account 1
- **Email:** customer@example.com
- **Password:** customer123
- **Name:** John Doe
- **Phone:** +1 (555) 123-4567
- **Address:** 123 Main Street, New York, NY 10001

### Customer Account 2
- **Email:** jane.smith@example.com
- **Password:** jane2024
- **Name:** Jane Smith
- **Phone:** +1 (555) 987-6543
- **Address:** 456 Park Avenue, New York, NY 10022

### Customer Account 3
- **Email:** demo@customer.com
- **Password:** demo123
- **Name:** Demo User
- **Phone:** +1 (555) 555-5555
- **Address:** 789 Broadway, New York, NY 10003

---

## Admin Login Credentials

### Admin Account 1 (Super Admin)
- **Email:** admin@restaurant.com
- **Password:** admin@2024
- **Role:** Super Administrator
- **Access Level:** Full Access (Orders, Menu, Users, Settings, Reports)

### Admin Account 2 (Manager)
- **Email:** manager@restaurant.com
- **Password:** manager123
- **Role:** Restaurant Manager
- **Access Level:** Orders, Menu, Reports

### Admin Account 3 (Staff)
- **Email:** staff@restaurant.com
- **Password:** staff123
- **Role:** Staff Member
- **Access Level:** Orders, Basic Menu View

---

## Default Test Credentials (For Development)

### Quick Test Account
- **Email:** test@test.com
- **Password:** test123

---

## Security Notes

⚠️ **IMPORTANT:** These are demo credentials for development and testing purposes only.

### For Production Deployment:
1. Change all default passwords immediately
2. Use strong passwords (minimum 12 characters, mixed case, numbers, symbols)
3. Enable two-factor authentication (2FA)
4. Implement password hashing (bcrypt or Argon2)
5. Add rate limiting for login attempts
6. Use HTTPS for all authentication requests
7. Implement session timeout
8. Add CAPTCHA for login forms
9. Log all authentication attempts
10. Regular security audits

---

## Password Reset

If you need to reset passwords, use the "Forgot Password" feature or contact:
- **Support Email:** support@restaurant.com
- **Support Phone:** +1 (555) 100-2000

---

## Database Setup

To set up these credentials in your database, run:

```sql
-- Customer accounts
INSERT INTO users (email, password, name, phone, role) VALUES
('customer@example.com', '$2y$10$hashed_password', 'John Doe', '+1 (555) 123-4567', 'customer'),
('jane.smith@example.com', '$2y$10$hashed_password', 'Jane Smith', '+1 (555) 987-6543', 'customer'),
('demo@customer.com', '$2y$10$hashed_password', 'Demo User', '+1 (555) 555-5555', 'customer');

-- Admin accounts
INSERT INTO users (email, password, name, role, access_level) VALUES
('admin@restaurant.com', '$2y$10$hashed_password', 'Admin User', 'admin', 'full'),
('manager@restaurant.com', '$2y$10$hashed_password', 'Manager User', 'manager', 'limited'),
('staff@restaurant.com', '$2y$10$hashed_password', 'Staff User', 'staff', 'basic');
```

---

## API Access (If Applicable)

### API Keys for Testing
- **Customer API Key:** `cust_test_key_123456789`
- **Admin API Key:** `admin_test_key_987654321`

**Note:** API keys should be regenerated for production use.

---

Last Updated: November 16, 2025
