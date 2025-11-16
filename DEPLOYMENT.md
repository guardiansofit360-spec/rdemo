# Deployment Guide

## Deploy to GitHub

### Method 1: Using the Deployment Script (Windows)

1. **Run the deployment script:**
   ```bash
   deploy.bat
   ```

2. **Enter your commit message** when prompted (or press Enter for default)

3. **Authenticate with GitHub** if prompted

4. Done! Your project is now on GitHub.

---

### Method 2: Manual Deployment

1. **Initialize Git repository:**
   ```bash
   git init
   ```

2. **Add all files:**
   ```bash
   git add .
   ```

3. **Commit changes:**
   ```bash
   git commit -m "Initial commit - Restaurant ordering system"
   ```

4. **Add remote repository:**
   ```bash
   git remote add origin https://github.com/guardiansofit360-spec/rdemo.git
   ```

5. **Push to GitHub:**
   ```bash
   git branch -M main
   git push -u origin main
   ```

---

## Deploy to Web Server

### XAMPP/WAMP/MAMP

1. Copy the entire project folder to:
   - XAMPP: `C:\xampp\htdocs\rdemo`
   - WAMP: `C:\wamp64\www\rdemo`
   - MAMP: `/Applications/MAMP/htdocs/rdemo`

2. Start Apache server

3. Access via: `http://localhost/rdemo`

---

### Shared Hosting (cPanel)

1. **Upload files:**
   - Compress project to ZIP
   - Upload via File Manager or FTP
   - Extract in `public_html` or subdirectory

2. **Set permissions:**
   ```bash
   chmod 755 data/
   chmod 644 data/*.json
   ```

3. **Configure:**
   - Ensure PHP 7.4+ is enabled
   - Check file paths are correct

4. **Access:**
   - `https://yourdomain.com/rdemo`

---

### VPS/Cloud Server (Linux)

1. **Install requirements:**
   ```bash
   sudo apt update
   sudo apt install apache2 php libapache2-mod-php
   ```

2. **Clone repository:**
   ```bash
   cd /var/www/html
   sudo git clone https://github.com/guardiansofit360-spec/rdemo.git
   ```

3. **Set permissions:**
   ```bash
   sudo chown -R www-data:www-data rdemo
   sudo chmod -R 755 rdemo
   sudo chmod -R 644 rdemo/data/*.json
   ```

4. **Configure Apache:**
   ```bash
   sudo nano /etc/apache2/sites-available/rdemo.conf
   ```

   Add:
   ```apache
   <VirtualHost *:80>
       ServerName yourdomain.com
       DocumentRoot /var/www/html/rdemo
       
       <Directory /var/www/html/rdemo>
           Options Indexes FollowSymLinks
           AllowOverride All
           Require all granted
       </Directory>
       
       ErrorLog ${APACHE_LOG_DIR}/rdemo_error.log
       CustomLog ${APACHE_LOG_DIR}/rdemo_access.log combined
   </VirtualHost>
   ```

5. **Enable site and restart:**
   ```bash
   sudo a2ensite rdemo.conf
   sudo systemctl restart apache2
   ```

---

## Environment Configuration

### For Production

1. **Update security settings:**
   - Change all default passwords
   - Implement password hashing
   - Add HTTPS/SSL certificate
   - Enable error logging (not display)

2. **Update file paths:**
   - Check all relative paths
   - Update API endpoints if needed

3. **Database migration (if needed):**
   - Convert JSON to MySQL/PostgreSQL
   - Update connection strings

---

## Post-Deployment Checklist

- [ ] All pages load correctly
- [ ] Login/Signup works
- [ ] Cart functionality works
- [ ] Orders can be placed
- [ ] Images load properly
- [ ] Mobile responsive
- [ ] SSL certificate installed (production)
- [ ] Error logging enabled
- [ ] Backup system in place
- [ ] Security headers configured

---

## Troubleshooting

### Issue: 404 Not Found
**Solution:** Check Apache configuration and .htaccess file

### Issue: Permission Denied
**Solution:** 
```bash
sudo chmod -R 755 /var/www/html/rdemo
sudo chown -R www-data:www-data /var/www/html/rdemo
```

### Issue: JSON files not writable
**Solution:**
```bash
chmod 644 data/*.json
```

### Issue: Session not working
**Solution:** Check PHP session configuration in php.ini

---

## Support

For deployment issues:
- Open an issue on GitHub
- Email: support@restaurant.com
- Check documentation: [README.md](README.md)

---

Last Updated: November 16, 2025
