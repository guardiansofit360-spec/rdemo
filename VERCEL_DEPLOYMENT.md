# Vercel Deployment Guide

## ⚠️ Important Notice

Vercel **does not support PHP** natively. Your project is PHP-based, so you have two options:

---

## Option 1: Use PHP-Compatible Hosting (Recommended)

Since your project uses PHP, deploy to these platforms instead:

### 1. **Heroku** (Free tier available)
```bash
# Install Heroku CLI
# Create Procfile
echo "web: vendor/bin/heroku-php-apache2" > Procfile

# Deploy
heroku create your-app-name
git push heroku main
```

### 2. **Railway.app** (Free tier available)
- Connect your GitHub repository
- Railway auto-detects PHP
- Deploy automatically

### 3. **Render.com** (Free tier available)
- Connect GitHub repository
- Select "Web Service"
- Choose PHP environment
- Deploy

### 4. **InfinityFree** (Free PHP hosting)
- Upload via FTP
- Supports PHP and MySQL
- Free subdomain included

### 5. **000webhost** (Free PHP hosting)
- Free PHP & MySQL hosting
- Upload via File Manager or FTP
- Free subdomain

---

## Option 2: Convert to Static HTML (For Vercel)

I've created `index.html` for you. To fully convert:

### Steps:

1. **Convert all PHP files to HTML:**
   - `index.php` → `index.html` ✅ (Done)
   - `login.php` → `login.html`
   - `signup.php` → `signup.html`
   - `cart.php` → `cart.html`
   - etc.

2. **Replace PHP backend with JavaScript:**
   - Use localStorage for cart
   - Use localStorage for user sessions
   - Load data from JSON files

3. **Update vercel.json** (Already created)

4. **Deploy to Vercel:**
   ```bash
   vercel --prod
   ```

---

## Quick Fix for Current Vercel Deployment

### Method 1: Add index.html as entry point

1. I've created `index.html` for you
2. Push to GitHub:
   ```bash
   git add index.html vercel.json
   git commit -m "Add static HTML version for Vercel"
   git push origin main
   ```

3. Vercel will auto-redeploy

### Method 2: Configure Vercel Settings

1. Go to your Vercel dashboard
2. Select your project
3. Go to Settings → General
4. Set "Framework Preset" to "Other"
5. Set "Output Directory" to `.`
6. Redeploy

---

## Recommended: Deploy to Railway (Easiest for PHP)

1. **Go to Railway.app**
   - Sign up with GitHub

2. **Create New Project**
   - Select "Deploy from GitHub repo"
   - Choose `guardiansofit360-spec/rdemo`

3. **Configure**
   - Railway auto-detects PHP
   - Click "Deploy"

4. **Done!**
   - Your PHP app will work perfectly
   - Get a free subdomain like `rdemo.up.railway.app`

---

## Alternative: Use Netlify with Netlify Functions

Convert PHP to Netlify Functions (serverless):

1. Create `netlify.toml`:
```toml
[build]
  publish = "."
  functions = "netlify/functions"

[[redirects]]
  from = "/*"
  to = "/index.html"
  status = 200
```

2. Convert PHP API to JavaScript functions in `netlify/functions/`

---

## Best Solution Summary

| Platform | PHP Support | Free Tier | Ease | Recommendation |
|----------|-------------|-----------|------|----------------|
| **Railway** | ✅ Yes | ✅ Yes | ⭐⭐⭐⭐⭐ | **Best Choice** |
| **Render** | ✅ Yes | ✅ Yes | ⭐⭐⭐⭐ | Great |
| **Heroku** | ✅ Yes | ⚠️ Limited | ⭐⭐⭐ | Good |
| **InfinityFree** | ✅ Yes | ✅ Yes | ⭐⭐⭐ | Good |
| **Vercel** | ❌ No | ✅ Yes | ⭐⭐ | Need conversion |
| **Netlify** | ❌ No | ✅ Yes | ⭐⭐ | Need conversion |

---

## Quick Deploy to Railway (5 minutes)

1. Visit: https://railway.app
2. Click "Start a New Project"
3. Select "Deploy from GitHub repo"
4. Choose your repository
5. Click "Deploy"
6. Done! ✅

Your PHP app will work perfectly with all features!

---

## Need Help?

- Railway Docs: https://docs.railway.app
- Render Docs: https://render.com/docs
- Contact: support@restaurant.com

---

Last Updated: November 16, 2025
