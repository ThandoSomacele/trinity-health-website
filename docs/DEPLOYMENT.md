# Trinity Health - Deployment Guide

Comprehensive guide for deploying the Trinity Health WordPress site to staging and production environments.

## Prerequisites

### Required Tools
- **DDEV** - Local development environment
- **lftp** - FTP client for deployment
- **Node.js 18+** - For building assets
- **PHP CLI** - For running scripts
- **MySQL client** - For database operations

### Installation
```bash
# macOS
brew install lftp

# Ubuntu/Debian
sudo apt-get install lftp
```

## Environment Configuration

### 1. Create .env file
```bash
cp .env.example .env
```

### 2. Configure credentials
Edit `.env` with your server details:

```bash
# File Deployment (FTP)
STAGING_HOST=ftp.object91.co.za
STAGING_USER=dev@object91.co.za
STAGING_PASS=your-password
STAGING_PATH=/staging.object91.co.za

# Database Configuration
STAGING_DB_HOST=localhost
STAGING_DB_NAME=database_name
STAGING_DB_USER=db_username
STAGING_DB_PASS=db_password

# URL Configuration
LOCAL_URL=https://trinity-health-website.ddev.site
STAGING_URL=https://staging.object91.co.za
PRODUCTION_URL=https://trinityhealth.co.zm
```

## Deployment Workflow

### Complete Staging Deployment

#### Step 1: Build Assets
```bash
# Build production-ready assets
ddev npm run build
```

#### Step 2: Export Database
```bash
# Export with staging URLs
./scripts/database-deploy.sh export-staging
```
This creates: `backups/database/trinity-health-[timestamp]-staging.sql.gz`

#### Step 3: Deploy Files
```bash
# Deploy theme and WordPress files
./scripts/deploy-staging.sh
```

#### Step 4: Import Database (on server)
```bash
# Upload database file and import script to server
lftp -c "open ftp://user:pass@host; put backups/database/*.sql.gz; put scripts/staging-db-import.php"

# SSH into server and run
ssh user@staging.object91.co.za
php staging-db-import.php trinity-health-[timestamp]-staging.sql.gz
```

### Quick Commands

#### Database Only
```bash
# Export for staging
./scripts/database-deploy.sh export-staging

# Export for production
./scripts/database-deploy.sh export-production
```

#### Files Only
```bash
# Deploy theme and core files
./scripts/deploy-staging.sh
```

## Database Management

### Export Options
- `export-local` - Keep local URLs (for backup)
- `export-staging` - Replace with staging URLs
- `export-production` - Replace with production URLs

### URL Replacement
The database export automatically replaces:
- `https://trinity-health-website.ddev.site` → Target URL
- `http://localhost:8000` → Target URL
- `@trinity-health-website.ddev.site` → Target domain

### Import Process
1. Database export includes correct URLs for target environment
2. No placeholders used - direct URL replacement
3. WooCommerce transients are cleared automatically
4. Email addresses updated to match target domain

## File Deployment Details

### What Gets Deployed
- **Theme Files**: `/wp-content/themes/trinity-health-theme/`
  - Compiled assets (JS/CSS)
  - PHP templates
  - Images and fonts
  - Excludes: node_modules, src files, .git

- **WordPress Core** (optional):
  - wp-admin/
  - wp-includes/
  - Core PHP files

### Deployment Script Features
- Parallel FTP transfers for speed
- Automatic retry on failures
- SSL/TLS encryption
- Progress reporting
- Asset building before deployment

## Troubleshooting

### Common Issues

#### FTP Connection Failed
```bash
# Error: 530 Login authentication failed
# Solution: Check credentials in .env file
```

#### Database Import Failed
```bash
# Error: Cannot connect to database
# Solution: Verify DB credentials and server access
```

#### Assets Not Loading
```bash
# Run build before deployment
ddev npm run build

# Clear cache after deployment
wp cache flush
```

#### Redirect Loops
1. Clear browser cache
2. Check .htaccess file
3. Verify site URL in database:
```sql
SELECT * FROM wp_options WHERE option_name IN ('siteurl', 'home');
```

### Health Checks

#### Run Diagnostics
```bash
# Local environment
php scripts/wp-diagnostics.php

# Check deployment
curl -I https://staging.object91.co.za
```

#### Verify Deployment
```bash
# Check site status
curl -s -o /dev/null -w "%{http_code}" https://staging.object91.co.za/

# Check admin access
curl -s -o /dev/null -w "%{http_code}" https://staging.object91.co.za/wp-admin/
```

## Post-Deployment

### Clear Caches
1. WordPress cache (if using caching plugin)
2. Browser cache
3. CDN cache (if applicable)
4. PHP opcache (on server)

### Verify Functionality
- [ ] Homepage loads correctly
- [ ] Navigation works
- [ ] Images display properly
- [ ] Forms submit correctly
- [ ] Admin panel accessible
- [ ] No console errors
- [ ] Mobile responsive

### Security Checklist
- [ ] Remove installation scripts
- [ ] Set proper file permissions
- [ ] Enable security headers
- [ ] Configure SSL properly
- [ ] Remove debug mode

## Production Deployment

### Differences from Staging
1. Use production credentials in .env
2. Export with production URLs
3. Additional testing required
4. Backup current production first
5. Consider maintenance mode

### Production Checklist
- [ ] Backup current production database
- [ ] Test on staging first
- [ ] Schedule during low traffic
- [ ] Prepare rollback plan
- [ ] Monitor after deployment

## Script Reference

| Script | Purpose | Usage |
|--------|---------|-------|
| `database-deploy.sh` | Database export/import | `./scripts/database-deploy.sh [command]` |
| `deploy-staging.sh` | File deployment | `./scripts/deploy-staging.sh` |
| `staging-db-import.php` | Server-side import | `php staging-db-import.php [file]` |
| `wp-diagnostics.php` | Health checks | `php scripts/wp-diagnostics.php` |

## Support

For issues or questions:
1. Check this guide first
2. Run diagnostics script
3. Review server logs
4. Check .env configuration