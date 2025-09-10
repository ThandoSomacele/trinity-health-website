# Trinity Health - Database Deployment Guide

This guide explains how to deploy and manage the database for your Trinity Health WordPress site across different environments.

## Simplified Database Management

We use a single unified script (`db-sync.sh`) for all database operations:

### Quick Deployment (Auto-Export)
```bash
# Import to staging (automatically exports if needed)
./scripts/db-sync.sh import staging

# Import to production (automatically exports if needed)
./scripts/db-sync.sh import production

# Skip confirmation prompt
./scripts/db-sync.sh import staging -y
```
**Note:** Import commands automatically export the local database if no recent export exists.

### Manual Export
```bash
# Export full database from DDEV
./scripts/db-sync.sh export
```
This creates a deployment-ready database file with URLs replaced by placeholders.

### Import Options
```bash
# Import specific file
./scripts/db-sync.sh import staging --file=path/to/backup.sql.gz

# Skip backup creation
./scripts/db-sync.sh import staging --no-backup

# Auto-confirm without prompting
./scripts/db-sync.sh import staging --yes
```

## Database Script Overview

### db-sync.sh - Unified Database Management
Our single script handles both export and import operations:

**Export Features:**
- Exports full database from DDEV
- Replaces local URLs with `{{SITE_URL}}` placeholders
- Creates compressed, deployment-ready files
- Timestamped backups in `./backups/database/`

**Import Features:**
- Automatically finds latest export or accepts specific file
- Creates backup before import (use `--no-backup` to skip)
- Replaces placeholders with target environment URLs
- Updates WordPress configuration
- Uses environment variables from `.env` file

## Environment-Specific Configurations

### Local Development (DDEV)
```bash
# Database details
DB_HOST=db
DB_NAME=db
DB_USER=db
DB_PASS=db
SITE_URL=https://trinity-health-website.ddev.site
```

### Staging Environment
```bash
# Add to your .env file
STAGING_DB_HOST=localhost
STAGING_DB_NAME=trinity_staging
STAGING_DB_USER=staging_user
STAGING_DB_PASS=secure_staging_password
STAGING_SITE_URL=https://staging.trinityhealth.co.zm
```

### Production Environment
```bash
# Add to your .env file
PRODUCTION_DB_HOST=localhost
PRODUCTION_DB_NAME=trinity_production
PRODUCTION_DB_USER=production_user
PRODUCTION_DB_PASS=very_secure_production_password
PRODUCTION_SITE_URL=https://trinityhealth.co.zm
```

## WordPress-Specific Database Considerations

### URL Replacement
WordPress stores URLs in multiple places that need updating during deployment:
- `wp_options` table: `home` and `siteurl` options
- Post content: absolute URLs in content
- Widget content: URLs in widgets
- Customizer settings: theme customization URLs

### User Management
Different strategies for user accounts:
- **Development to Staging**: Keep admin users, remove test users
- **Staging to Production**: Careful user migration, preserve production users
- **Content-only updates**: Preserve all existing users

### Plugin-Specific Data
Some plugins store environment-specific data:
- **Caching plugins**: Clear all caches after deployment
- **SEO plugins**: Update sitemap URLs
- **Contact forms**: Update email settings
- **Analytics**: Update tracking codes

## Database Deployment Workflows

### Workflow 1: Local to Staging
Deploy local development database to staging:

```bash
# 1. Export local database
./scripts/db-sync.sh export

# 2. Upload exported file to server (via FTP/cPanel)
# File location: ./backups/database/trinity-health-[timestamp]-ready.sql.gz

# 3. Import to staging
./scripts/db-sync.sh import staging
```

### Workflow 2: Staging to Production
Move tested database from staging to production:

```bash
# 1. Export from staging (run on staging server)
./scripts/db-sync.sh export

# 2. Transfer file to production server

# 3. Import to production (run on production server)
./scripts/db-sync.sh import production
```

### Workflow 3: Quick Deployment
For rapid deployment without backups:

```bash
# Export locally
./scripts/db-sync.sh export

# Import to staging without backup
./scripts/db-sync.sh import staging --no-backup
```

## Security Best Practices

### Data Sanitization
Before deploying databases:
- Remove or anonymize user data in non-production exports
- Exclude sensitive plugin data (API keys, payment info)
- Clear transients and cache data

### Access Control
- Use environment-specific database users
- Limit database user permissions
- Use strong, unique passwords for each environment
- Enable database SSL connections where possible

### Backup Strategy
Before any database deployment:
1. **Automatic backups**: Scripts create backups before import
2. **Retention policy**: Keep backups for 30 days minimum
3. **Testing backups**: Regularly test backup restoration
4. **Off-site storage**: Store backups in different location

## Common Database Issues and Solutions

### Issue: URLs not updating correctly
```bash
# Manual URL replacement
wp search-replace 'https://old-url.com' 'https://new-url.com' --dry-run
wp search-replace 'https://old-url.com' 'https://new-url.com'
```

### Issue: Plugin activation errors
```bash
# Reactivate plugins after database import
wp plugin deactivate --all
wp plugin activate --all
```

### Issue: Permalink structure broken
```bash
# Flush rewrite rules
wp rewrite flush
```

### Issue: User permissions lost
```bash
# Update user roles
wp user update admin --role=administrator
wp cap add editor edit_theme_options
```

## Monitoring and Validation

### Post-Deployment Checks
After database deployment, verify:
1. **Site loads correctly**: Check frontend and admin
2. **URLs are correct**: Verify internal links work
3. **Media files accessible**: Check image and file URLs
4. **Plugins functioning**: Test plugin functionality
5. **User access**: Verify login and permissions
6. **Forms working**: Test contact forms
7. **Search functionality**: Verify site search works

### Database Health Checks
```bash
# Check database tables
wp db check

# Optimize database
wp db optimize

# Search for common issues
wp db query "SELECT * FROM wp_options WHERE option_name IN ('home', 'siteurl')"
```

## Shared Hosting Database Deployment (phpMyAdmin)

For hosting providers without terminal/SSH access, use phpMyAdmin for database management.

### Prerequisites
- Access to cPanel or hosting control panel
- phpMyAdmin available in hosting control panel
- Database file uploaded to server (via `db-import-remote.sh` script)

### Step-by-Step phpMyAdmin Import

#### 1. Export and Prepare Database
```bash
# Export database with URL placeholders
./scripts/db-sync.sh export
```

This creates a file at `./backups/database/trinity-health-[timestamp]-ready.sql.gz`

#### 2. Download Database File from Server
1. **Log into cPanel**
2. **Open File Manager**
3. **Navigate to** your staging path (e.g., `/staging.object91.co.za/`)
4. **Find your uploaded database file** (e.g., `trinity-health-backup.sql.gz`)
5. **Download to your computer** (right-click → Download)

#### 3. Import via phpMyAdmin
1. **Open phpMyAdmin** from cPanel
2. **Select target database** (e.g., `objecxuk_wp106` for staging)
3. **Click "Import" tab**
4. **Choose File:** Select your downloaded database file
5. **Important Settings:**
   - Format: SQL
   - Character set: utf8_general_ci
   - Compression: Auto-detect (.gz files supported)
6. **Click "Go"** to start import

#### 4. Update URLs via phpMyAdmin SQL
After successful import, update WordPress URLs:

1. **Click "SQL" tab** in phpMyAdmin
2. **Paste and execute this SQL:**

```sql
-- Update WordPress site URLs
UPDATE wp_options SET option_value = 'https://staging.object91.co.za' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://staging.object91.co.za' WHERE option_name = 'siteurl';

-- Fix placeholder URLs (if database was sanitized)
UPDATE wp_options SET option_value = REPLACE(option_value, '{{SITE_URL}}:33001/wp', 'https://staging.object91.co.za');
UPDATE wp_options SET option_value = REPLACE(option_value, '{{SITE_URL}}', 'https://staging.object91.co.za');

-- Update URLs in post content
UPDATE wp_posts SET post_content = REPLACE(post_content, 'https://trinity-health-website.ddev.site', 'https://staging.object91.co.za');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://trinity-health-website.ddev.site', 'https://staging.object91.co.za');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost:8000', 'https://staging.object91.co.za');
UPDATE wp_posts SET post_content = REPLACE(post_content, '{{SITE_URL}}', 'https://staging.object91.co.za');

-- Update URLs in post excerpts
UPDATE wp_posts SET post_excerpt = REPLACE(post_excerpt, 'https://trinity-health-website.ddev.site', 'https://staging.object91.co.za');
UPDATE wp_posts SET post_excerpt = REPLACE(post_excerpt, 'http://trinity-health-website.ddev.site', 'https://staging.object91.co.za');
UPDATE wp_posts SET post_excerpt = REPLACE(post_excerpt, 'http://localhost:8000', 'https://staging.object91.co.za');
UPDATE wp_posts SET post_excerpt = REPLACE(post_excerpt, '{{SITE_URL}}', 'https://staging.object91.co.za');
```

3. **Replace URLs** with your actual target environment URL
4. **Click "Go"** to execute SQL

#### 5. Verify Import Success
1. **Visit your staging site** (e.g., https://staging.object91.co.za)
2. **Check WordPress admin** (add `/wp-admin/` to your URL)
3. **Test key functionality:** navigation, images, forms
4. **Verify URLs** in posts and pages are correct

### phpMyAdmin Limitations and Workarounds

#### File Size Limitations
Most shared hosting has upload limits (typically 50MB-500MB):

**Solution for Large Databases:**
```bash
# Split large database into smaller files
split -l 50000 large-database.sql database-part-
```

Import each part separately in phpMyAdmin.

#### Import Timeout Issues
For very large databases that timeout:

**Solution:**
1. **Increase PHP limits** via `.htaccess` in your web root:
```apache
php_value max_execution_time 600
php_value memory_limit 512M
php_value post_max_size 500M
php_value upload_max_filesize 500M
```

2. **Use phpMyAdmin in smaller chunks**
3. **Contact hosting provider** for temporary limit increases

#### Alternative: Database Restore from Backup
If phpMyAdmin import fails:
1. **Use hosting backup restore feature** (if available)
2. **Contact hosting support** for manual database import
3. **Use staging → production database copy** via hosting tools

### Environment-Specific phpMyAdmin Workflows

#### Development to Staging
```sql
-- Staging-specific URLs (update as needed)
UPDATE wp_options SET option_value = 'https://staging.object91.co.za' WHERE option_name IN ('home', 'siteurl');
```

#### Staging to Production
```sql
-- Production-specific URLs (update as needed)
UPDATE wp_options SET option_value = 'https://trinityhealth.co.zm' WHERE option_name IN ('home', 'siteurl');
```

### Troubleshooting phpMyAdmin Issues

#### Error: "File too large"
- Split database file into smaller parts
- Compress using gzip (.gz extension)
- Ask hosting provider to increase limits

#### Error: "Incorrect format parameter"
- Ensure file is valid SQL format
- Check file extension matches content (.sql, .sql.gz)
- Try uploading uncompressed .sql file

#### Error: "MySQL server has gone away"
- Database too large for server limits
- Split import into smaller chunks
- Contact hosting provider for assistance

#### URLs not updating after import
- Clear WordPress caches
- Check .htaccess file for redirects
- Verify SSL settings in WordPress

#### Error: Site URLs show "{{SITE_URL}}" placeholders
This happens when the sanitized database export wasn't properly processed during import.

**Symptoms:**
- Site redirects to URLs containing `{{SITE_URL}}`
- URLs show `{{SITE_URL}}:33001/wp` or similar
- Site appears broken or redirects incorrectly

**Fix in phpMyAdmin:**
1. **Check current URLs:**
```sql
SELECT option_name, option_value FROM wp_options WHERE option_name IN ('home', 'siteurl');
```

2. **Update with correct staging URLs:**
```sql
UPDATE wp_options SET option_value = 'https://staging.object91.co.za' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://staging.object91.co.za' WHERE option_name = 'siteurl';
```

3. **Check for remaining placeholder URLs:**
```sql
SELECT option_name, option_value FROM wp_options WHERE option_value LIKE '%{{SITE_URL}}%';
```

4. **Replace any remaining placeholders:**
```sql
UPDATE wp_options SET option_value = REPLACE(option_value, '{{SITE_URL}}:33001/wp', 'https://staging.object91.co.za');
UPDATE wp_options SET option_value = REPLACE(option_value, '{{SITE_URL}}', 'https://staging.object91.co.za');
```

**For Production Environment:**
Replace `https://staging.object91.co.za` with `https://trinityhealth.co.zm`

#### Error: wp-admin is unreachable (404 or redirect loops)
Common issue when WordPress can't find admin files or has incorrect URL configuration.

**Symptoms:**
- `/wp-admin/` returns 404 Not Found
- `/wp-admin/` redirects in endless loops
- Can access front-end but not admin area

**Troubleshooting Steps:**

1. **Verify wp-admin files exist on server:**
   Check in cPanel File Manager that `/staging.object91.co.za/wp-admin/` directory exists with files

2. **Check .htaccess file:**
   Create or update `.htaccess` in website root:
```apache
# BEGIN WordPress
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
# END WordPress
```

3. **Verify database URLs are correct:**
```sql
SELECT option_name, option_value FROM wp_options WHERE option_name IN ('home', 'siteurl');
```
Both should show: `https://staging.object91.co.za` (no trailing slash)

4. **Check wp-config.php has correct paths:**
   Ensure these lines are in wp-config.php:
```php
define('WP_HOME','https://staging.object91.co.za');
define('WP_SITEURL','https://staging.object91.co.za');
```

5. **Test direct login URL:**
   Try: `https://staging.object91.co.za/wp-login.php`

6. **Force WordPress to recognize admin:**
```sql
UPDATE wp_options SET option_value = 'https://staging.object91.co.za' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://staging.object91.co.za' WHERE option_name = 'siteurl';
```

7. **Clear any caching:**
   If hosting has caching, clear it via hosting control panel

**Alternative access methods:**
- Try: `https://staging.object91.co.za/wp-login.php` (direct login)
- Check if SSL redirects are working: try `http://staging.object91.co.za/wp-admin/`

### Best Practices for phpMyAdmin Deployment

1. **Always backup** target database before import
2. **Test with small database** first to verify process
3. **Document your specific hosting requirements** (file limits, timeout settings)
4. **Keep database exports compressed** to save upload time
5. **Verify all URLs updated** after import
6. **Clear all caches** after successful import

## Integration with File Deployment

### Combined Deployment Process
1. **Files first**: Deploy files using existing scripts
2. **Database second**: Deploy database with URL updates
3. **Configuration**: Update environment-specific configs
4. **Cache clearing**: Clear all caches
5. **Testing**: Comprehensive site testing

### Rollback Strategy
In case of issues:
```bash
# 1. Restore database backup
./scripts/db-restore.sh production

# 2. Restore files if needed
./scripts/restore-files.sh production

# 3. Clear caches
./scripts/cache-clear.sh production
```

## DDEV Integration

### Local Database Management
```bash
# Export from DDEV
ddev export-db --file=trinity-health-$(date +%Y%m%d).sql.gz

# Import to DDEV
ddev import-db --src=trinity-health-backup.sql.gz

# Access database
ddev mysql
```

### DDEV to Staging Workflow
```bash
# 1. Export from DDEV with our script
./scripts/db-sync.sh export

# 2. Import to staging
./scripts/db-sync.sh import staging
```

## Automation and CI/CD

### Automated Database Deployments
For advanced setups, consider:
- **Scheduled content syncs**: Daily staging updates
- **Git hooks**: Auto-deploy database on code pushes
- **Migration scripts**: Version-controlled database changes
- **Health monitoring**: Automated post-deployment checks

### Command Reference
```bash
# Show help
./scripts/db-sync.sh --help

# Export database
./scripts/db-sync.sh export

# Import to staging
./scripts/db-sync.sh import staging

# Import to production
./scripts/db-sync.sh import production

# Import specific file
./scripts/db-sync.sh import staging --file=backup.sql.gz

# Skip backup during import
./scripts/db-sync.sh import staging --no-backup
```

## Support and Troubleshooting

For database deployment issues:
1. Check the backup files are accessible
2. Verify database connection settings
3. Ensure sufficient disk space
4. Check database user permissions
5. Review server error logs
6. Test with a minimal database first

## Next Steps

After setting up database deployment:
1. Test all workflows in a safe environment
2. Create regular backup schedules
3. Document any site-specific customizations
4. Train team members on procedures
5. Set up monitoring and alerts