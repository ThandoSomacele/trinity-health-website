# Trinity Health - Deployment Scripts

This directory contains deployment and diagnostic scripts for the Trinity Health website.

## Scripts Overview

### 🗄️ database-deploy.sh
**Purpose:** Export and import database with proper URL handling  
**Usage:**
```bash
# Export database with staging URLs
./database-deploy.sh export-staging

# Export database with production URLs  
./database-deploy.sh export-production

# Import database to staging (requires server access)
./database-deploy.sh import-staging --file=backup.sql.gz
```

### 🚀 deploy-staging.sh
**Purpose:** Deploy WordPress files and theme to staging server via FTP  
**Usage:**
```bash
# Deploy everything to staging
./deploy-staging.sh
```
This script:
- Loads configuration from .env (STAGING_HOST, STAGING_USER, STAGING_PASS, STAGING_PATH)
- Builds theme assets (npm run build)
- Deploys WordPress core files
- Deploys theme files
- Creates/updates .htaccess

### 🚀 deploy-production.sh
**Purpose:** Deploy WordPress files and theme to production server via FTP  
**Usage:**
```bash
# Deploy everything to production (requires confirmation)
./deploy-production.sh
```
This script:
- Loads configuration from .env (PRODUCTION_HOST, PRODUCTION_USER, PRODUCTION_PASS, PRODUCTION_PATH)
- Requires explicit confirmation before deploying
- Builds theme assets (npm run build)
- Deploys WordPress core files
- Deploys theme files
- Creates/updates .htaccess with production security headers

### 🔧 deploy-common.sh
**Purpose:** Shared deployment functions used by staging and production scripts  
**Usage:** Sourced by other deployment scripts, not run directly  
Contains reusable functions for:
- Environment variable loading
- Asset building
- File deployment
- Verification

### 📤 staging-db-import.php
**Purpose:** Server-side PHP script to import database on staging server  
**Usage:**
```bash
# Upload to staging server then run:
php staging-db-import.php trinity-health-20250911-staging.sql.gz
```
Note: This script must be run on the staging server, not locally.

### 🔍 wp-diagnostics.php
**Purpose:** Comprehensive WordPress health check and diagnostics  
**Usage:**
```bash
# Run diagnostic checks
php wp-diagnostics.php
```
Checks:
- PHP configuration
- WordPress settings
- Database connectivity
- Theme integrity
- Plugin status
- File permissions

## Deployment Workflow

### To Deploy to Staging:

1. **Export database with staging URLs:**
   ```bash
   ./database-deploy.sh export-staging
   ```

2. **Deploy files to staging:**
   ```bash
   ./deploy-staging.sh
   ```

3. **Import database on staging server:**
   - Upload the database export and `staging-db-import.php` to server
   - SSH into staging server
   - Run: `php staging-db-import.php [database-file.sql.gz]`

### Environment Configuration

All scripts use the `.env` file in the project root for configuration:
- FTP credentials
- Database credentials  
- URL configurations
- Server paths

See main project `.env` file for configuration.

## Requirements

- DDEV running locally
- lftp installed for FTP deployment
- PHP CLI for diagnostic scripts
- MySQL client for database operations