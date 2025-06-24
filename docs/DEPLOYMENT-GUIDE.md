# Trinity Health Deployment Guide

Complete documentation for building and deploying your Trinity Health website from development to production.

## Table of Contents

1. [Overview](#overview)
2. [Prerequisites](#prerequisites)
3. [Build Script Usage](#build-script-usage)
4. [FTP Configuration](#ftp-configuration)
5. [Deployment Methods](#deployment-methods)
6. [Post-Deployment Steps](#post-deployment-steps)
7. [Troubleshooting](#troubleshooting)
8. [Security Best Practices](#security-best-practices)

---

## Overview

The Trinity Health deployment system converts your modern Bedrock + Sage development environment into a traditional WordPress installation compatible with shared hosting providers.

### What the Build Script Does

- **Converts Sage Blade templates** → Traditional PHP templates
- **Compiles Vite assets** → Production CSS/JS files
- **Exports database** → SQL file with import instructions
- **Creates wp-content folder** → Ready for upload to existing WordPress
- **Optional FTP deployment** → Automatic upload to hosting provider

---

## Prerequisites

### Required Tools

```bash
# Check if you have required tools
curl --version      # Should be installed
unzip --version     # Should be installed
ddev version        # Should be 1.24.6+

# For FTP deployment (optional)
brew install lftp   # Required only for --deploy flag
```

### Development Environment

Ensure your development environment is running:

```bash
# Start DDEV if not running
ddev start

# Verify WordPress is accessible
ddev wp core is-installed
```

### Theme Assets

Ensure theme assets are built:

```bash
# Navigate to theme directory
cd web/app/themes/trinity-health

# Build production assets
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run build
```

---

## Build Script Usage

### Basic Build (Manual Upload)

```bash
# Build for manual deployment
./build-production.sh
```

**Output:**
- `dist-production/wp-content/` - Upload this to your hosting
- `dist-production/database-export.sql` - Import via hosting control panel
- `dist-production/import-database.txt` - Database import instructions

### Build with Help

```bash
# View all available options
./build-production.sh --help
```

### Build with FTP Deployment

```bash
# Build and automatically deploy via FTP
./build-production.sh --deploy
```

---

## FTP Configuration

### Option 1: External Config File (Recommended)

```bash
# 1. Copy the example configuration
cp ftp-config.example.sh ftp-config.sh

# 2. Edit with your hosting details
nano ftp-config.sh
```

**Example ftp-config.sh:**
```bash
#!/bin/bash
# Trinity Health FTP Configuration

export FTP_HOST="ftp.yourdomain.co.za"
export FTP_USER="username@yourdomain.co.za"
export FTP_PASS="your_secure_password"
export FTP_REMOTE_PATH="/public_html"
```

**Deploy with config:**
```bash
# Source config and deploy
source ftp-config.sh && ./build-production.sh --deploy
```

### Option 2: Direct Script Configuration

Edit the variables directly in `build-production.sh`:

```bash
# Edit the FTP configuration section
nano build-production.sh

# Find and update these lines:
FTP_HOST="ftp.yourdomain.co.za"
FTP_USER="username@yourdomain.co.za" 
FTP_PASS="your_secure_password"
FTP_REMOTE_PATH="/public_html"
```

### Common Hosting Provider Examples

#### Afrihost / cPanel Hosting
```bash
FTP_HOST="ftp.yourdomain.co.za"
FTP_USER="username@yourdomain.co.za"
FTP_REMOTE_PATH="/public_html"
```

#### Hetzner VPS
```bash
FTP_HOST="your-server-ip"
FTP_USER="your-username"
FTP_REMOTE_PATH="/var/www/yourdomain.com"
```

#### SiteGround
```bash
FTP_HOST="ftp.yourdomain.com"
FTP_USER="your-cpanel-username"
FTP_REMOTE_PATH="/public_html"
```

---

## Deployment Methods

### Method 1: Manual Upload (Recommended for First-Time)

1. **Build the project:**
   ```bash
   ./build-production.sh
   ```

2. **Upload files:**
   - Upload `dist-production/wp-content/` to your hosting `wp-content/` directory
   - Upload `database-export.sql` to your hosting account

3. **Import database:**
   - Use hosting control panel (phpMyAdmin)
   - Follow instructions in `import-database.txt`

### Method 2: Automatic FTP Deployment

1. **Configure FTP credentials:**
   ```bash
   cp ftp-config.example.sh ftp-config.sh
   # Edit ftp-config.sh with your details
   ```

2. **Deploy automatically:**
   ```bash
   source ftp-config.sh && ./build-production.sh --deploy
   ```

3. **What gets uploaded:**
   - `wp-content/` → Uploaded to hosting wp-content directory
   - `database-export.sql` → Uploaded to hosting root
   - `import-database.txt` → Uploaded to hosting root

---

## Post-Deployment Steps

### 1. Import Database

**Via phpMyAdmin (Most Common):**
1. Log into your hosting control panel
2. Open phpMyAdmin
3. Select your database
4. Click "Import" tab
5. Choose `database-export.sql`
6. Click "Go" to import

**Via Command Line (If Available):**
```bash
mysql -h localhost -u username -p database_name < database-export.sql
```

### 2. Activate Theme

1. Log into WordPress admin: `https://yourdomain.com/wp-admin`
2. Go to **Appearance > Themes**
3. Activate **Trinity Health** theme

### 3. Update Site URLs (If Domain Changed)

**Via WordPress Admin:**
1. Go to **Settings > General**
2. Update "WordPress Address" and "Site Address"

**Via WP-CLI (If Available):**
```bash
wp search-replace 'old-domain.com' 'new-domain.com'
```

### 4. Verify Functionality

- [ ] Homepage loads correctly
- [ ] Navigation works
- [ ] Contact forms function
- [ ] Images display properly
- [ ] SSL certificate is active

---

## Troubleshooting

### Build Script Issues

#### "Requirements check failed"
```bash
# Check DDEV status
ddev status

# Restart if needed
ddev restart

# Verify WordPress installation
ddev wp core is-installed
```

#### "Theme assets not built"
```bash
# Navigate to theme directory
cd web/app/themes/trinity-health

# Install dependencies and build
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm install
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run build
```

#### "Database export failed"
```bash
# Check DDEV database
ddev wp db check

# Manual export if needed
ddev wp db export database-export.sql
```

### FTP Deployment Issues

#### "lftp command not found"
```bash
# Install LFTP
brew install lftp

# Or on Ubuntu/Debian
sudo apt-get install lftp
```

#### "FTP connection failed"
- Verify FTP credentials are correct
- Check if hosting provider uses SFTP instead of FTP
- Ensure firewall allows FTP connections
- Try connecting manually: `lftp ftp://username:password@host`

#### "Permission denied"
- Verify FTP_REMOTE_PATH exists
- Check file permissions on hosting
- Ensure FTP user has write access

### WordPress Issues

#### "Error establishing database connection"
- Verify database credentials in hosting control panel
- Update wp-config.php with correct database details
- Check database server status

#### "Theme not found"
- Ensure wp-content/themes/trinity-health/ was uploaded
- Check file permissions (usually 755 for directories, 644 for files)
- Verify theme files are complete

#### "White screen / 500 error"
- Check error logs in hosting control panel
- Ensure PHP version is 8.2+ 
- Verify all theme files uploaded correctly

---

## Security Best Practices

### FTP Credentials

1. **Use external config file:**
   ```bash
   # Never commit credentials to Git
   echo "ftp-config.sh" >> .gitignore
   ```

2. **Use strong passwords:**
   - Minimum 12 characters
   - Mix of letters, numbers, symbols
   - Avoid dictionary words

3. **Enable two-factor authentication** on hosting account

### Database Security

1. **Change default table prefix:**
   - Default: `wp_`
   - Trinity Health uses: `th_` (already configured)

2. **Update WordPress salts:**
   - Generate new keys: https://api.wordpress.org/secret-key/1.1/salt/
   - Update in wp-config.php

3. **Secure wp-config.php:**
   ```bash
   # File permissions should be 600 or 644
   chmod 644 wp-config.php
   ```

### Hosting Security

1. **Enable SSL certificate** (Let's Encrypt is free)
2. **Keep WordPress core updated**
3. **Use security plugins** (already included in build)
4. **Regular backups** via hosting control panel

---

## Script Command Reference

### Build Script Options

```bash
# Basic build
./build-production.sh

# Show help
./build-production.sh --help

# Build and deploy
./build-production.sh --deploy
```

### DDEV Commands (Development)

```bash
# Start development environment
ddev start

# Stop development environment  
ddev stop

# Build theme assets
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run dev

# Export database
ddev wp db export backup.sql

# WordPress CLI commands
ddev wp theme list
ddev wp plugin list
ddev wp core update
```

### File Locations

- **Build script:** `./build-production.sh`
- **FTP config:** `./ftp-config.sh` (you create this)
- **Build output:** `./dist-production/`
- **Theme source:** `./web/app/themes/trinity-health/`
- **Documentation:** `./docs/`

---

## Support

For technical support or issues:

1. **Check this documentation** for common solutions
2. **Review error logs** in hosting control panel
3. **Test locally** with DDEV before deploying
4. **Contact hosting provider** for server-specific issues

---

**🎉 Congratulations!** Your Trinity Health website should now be successfully deployed and running on your hosting provider.