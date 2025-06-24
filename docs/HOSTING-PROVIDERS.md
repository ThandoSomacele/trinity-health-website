# Hosting Provider Configuration Guide

Specific configuration instructions for popular hosting providers in South Africa and internationally.

## 🇿🇦 South African Hosting Providers

### Afrihost
**Most common South African provider**

```bash
# FTP Configuration
FTP_HOST="ftp.yourdomain.co.za"
FTP_USER="username@yourdomain.co.za"
FTP_PASS="your_cpanel_password"
FTP_REMOTE_PATH="/public_html"
```

**Setup Steps:**
1. Log into Afrihost control panel
2. Go to **File Manager** or **FTP Accounts**
3. Use your main cPanel credentials
4. Database import via **phpMyAdmin**

**Notes:**
- PHP version: Usually 8.1+ available
- SSL: Free Let's Encrypt available
- Database: Create via cPanel → MySQL Databases

---

### Hetzner (VPS)
**Recommended for advanced users**

```bash
# FTP Configuration  
FTP_HOST="your-server-ip"
FTP_USER="root"
FTP_PASS="your_root_password"
FTP_REMOTE_PATH="/var/www/html"
```

**Setup Steps:**
1. Install WordPress on your VPS
2. Configure SFTP access
3. Use command line for database import:
   ```bash
   mysql -u root -p database_name < database-export.sql
   ```

**Notes:**
- Full server control
- Requires technical knowledge
- Cost: ~€4.51/month (R80)

---

### WebAfrica
```bash
# FTP Configuration
FTP_HOST="ftp.yourdomain.co.za"
FTP_USER="your_username"
FTP_PASS="your_password"
FTP_REMOTE_PATH="/public_html"
```

---

### Domains.co.za
```bash
# FTP Configuration
FTP_HOST="ftp.yourdomain.co.za"
FTP_USER="username@yourdomain.co.za"
FTP_PASS="your_password"
FTP_REMOTE_PATH="/httpdocs"
```

**Note:** Uses `/httpdocs` instead of `/public_html`

---

## 🌍 International Hosting Providers

### SiteGround
```bash
# FTP Configuration
FTP_HOST="ftp.yourdomain.com"
FTP_USER="your_cpanel_username"
FTP_PASS="your_cpanel_password"
FTP_REMOTE_PATH="/public_html"
```

**Features:**
- Excellent WordPress optimization
- Free SSL certificates
- Built-in caching

---

### Bluehost
```bash
# FTP Configuration
FTP_HOST="ftp.yourdomain.com"
FTP_USER="your_username@yourdomain.com"
FTP_PASS="your_password"
FTP_REMOTE_PATH="/public_html"
```

---

### HostGator
```bash
# FTP Configuration
FTP_HOST="ftp.yourdomain.com"
FTP_USER="your_cpanel_username"
FTP_PASS="your_cpanel_password"
FTP_REMOTE_PATH="/public_html"
```

---

### GoDaddy
```bash
# FTP Configuration
FTP_HOST="ftp.yourdomain.com"
FTP_USER="your_hosting_username"
FTP_PASS="your_hosting_password"
FTP_REMOTE_PATH="/public_html"
```

**Note:** GoDaddy sometimes uses different FTP hostnames

---

## 🔍 How to Find Your FTP Details

### cPanel Hosting (Most Common)
1. Log into your hosting control panel
2. Look for **"FTP Accounts"** or **"File Manager"**
3. FTP details usually match your main account:
   - **Host:** `ftp.yourdomain.com` or `ftp.yourdomain.co.za`
   - **Username:** Your cPanel username or `username@yourdomain.com`
   - **Password:** Your cPanel password
   - **Path:** `/public_html` (most common)

### Alternative Paths
- **cPanel:** `/public_html`
- **Plesk:** `/httpdocs`
- **DirectAdmin:** `/public_html`
- **Custom:** Check with your provider

---

## 🗄️ Database Import Methods by Provider

### phpMyAdmin (Most Common)
1. Login to hosting control panel
2. Find **"phpMyAdmin"** or **"Databases"**
3. Select your database
4. Click **"Import"** tab
5. Upload `database-export.sql`
6. Click **"Go"**

### Command Line (VPS/Dedicated)
```bash
# Upload file first, then:
mysql -h localhost -u username -p database_name < database-export.sql
```

### Hosting Control Panel Import
Some providers offer database import via their control panel:
- Upload `database-export.sql` via file manager
- Use hosting control panel's database import feature

---

## 🔧 Provider-Specific Notes

### Afrihost
- **Database Prefix:** They often suggest custom prefixes
- **PHP Version:** Can be changed via control panel
- **Email:** Set up email accounts for contact forms
- **SSL:** Free Let's Encrypt available in control panel

### Hetzner
- **Firewall:** Configure ports 80, 443, 22
- **Security:** Regular system updates required
- **Backup:** Set up automated backups
- **Domain:** Point DNS A record to server IP

### International Providers
- **Time Zone:** May affect scheduled posts
- **CDN:** Many offer CloudFlare integration
- **Staging:** Some provide staging environments
- **Support:** 24/7 chat support typically available

---

## 🚨 Common Provider Issues

### Afrihost
- **Issue:** FTP connection timeout
- **Solution:** Use SFTP instead of FTP, or check firewall

### GoDaddy
- **Issue:** File upload limits
- **Solution:** Upload wp-content in chunks, or use their file manager

### Shared Hosting General
- **Issue:** Memory limits for large imports
- **Solution:** Split database into smaller files

### VPS Providers
- **Issue:** Permission errors
- **Solution:** Check file ownership and permissions:
  ```bash
  chown -R www-data:www-data /var/www/html/wp-content/
  chmod -R 755 /var/www/html/wp-content/
  ```

---

## 📞 Getting Help from Your Provider

When contacting support, provide:
1. **Domain name**
2. **Specific error messages**
3. **What you're trying to accomplish**
4. **Steps you've already tried**

**Questions to Ask:**
- "What are my FTP/SFTP connection details?"
- "What is the correct path for WordPress files?"
- "How do I import a MySQL database?"
- "What PHP version do you recommend for WordPress?"

---

## ✅ Pre-Deployment Checklist by Provider Type

### Shared Hosting (cPanel)
- [ ] Verify FTP credentials work
- [ ] Create database via control panel
- [ ] Note database name, username, password
- [ ] Check PHP version (should be 8.1+)
- [ ] Test file upload permissions

### VPS/Cloud Hosting
- [ ] Verify SSH access works
- [ ] Install WordPress if not already installed
- [ ] Configure firewall (ports 80, 443)
- [ ] Set up database server
- [ ] Configure web server (Apache/Nginx)

---

**💡 Tip:** When in doubt, consult your hosting provider's knowledge base or contact their support team. Most providers have WordPress-specific documentation.