#!/bin/bash
# Trinity Health FTP Configuration Example
# Copy this file to ftp-config.sh and update with your hosting details

# FTP Server Configuration
export FTP_HOST="ftp.yourhostingprovider.com"     # Your FTP server hostname
export FTP_USER="username@yourdomain.com"         # Your FTP username  
export FTP_PASS="your_secure_password"            # Your FTP password
export FTP_REMOTE_PATH="/public_html"             # Remote path (usually /public_html)

# Usage:
# 1. Copy this file: cp ftp-config.example.sh ftp-config.sh
# 2. Edit ftp-config.sh with your actual FTP details
# 3. Source the config before building: source ftp-config.sh
# 4. Run build with deploy: ./build-production.sh --deploy

# Example for common hosting providers:

# Afrihost / cPanel hosting:
# FTP_HOST="ftp.yourdomain.co.za"
# FTP_USER="username@yourdomain.co.za"  
# FTP_REMOTE_PATH="/public_html"

# Hetzner:
# FTP_HOST="your-server-ip"
# FTP_USER="your-username"
# FTP_REMOTE_PATH="/var/www/yourdomain.com"

# SiteGround:
# FTP_HOST="ftp.yourdomain.com"
# FTP_USER="your-cpanel-username"
# FTP_REMOTE_PATH="/public_html"