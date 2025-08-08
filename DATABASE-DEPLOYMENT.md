# Trinity Health - Database Deployment Guide

This guide explains how to deploy and manage the database for your Trinity Health WordPress site across different environments.

## Database Deployment Strategies

### 1. Initial Database Setup (First Time)

When setting up a new environment (staging/production) for the first time:

```bash
# Export from local development
./scripts/db-export.sh

# Import to staging/production
./scripts/db-import.sh staging
# or
./scripts/db-import.sh production
```

### 2. Content Updates (Ongoing)

For ongoing content updates and synchronization:

```bash
# Sync from local to staging
./scripts/db-sync.sh staging

# Sync from staging to production
./scripts/db-sync.sh production --source staging
```

## Database Scripts Overview

### db-export.sh
Exports the current database with proper sanitization:
- Exports all tables
- Replaces URLs with placeholders
- Removes sensitive data (user passwords, API keys)
- Creates timestamped backup file

### db-import.sh
Imports database to target environment:
- Creates database backup before import
- Imports the database
- Updates URLs for target environment
- Updates wp-config.php settings
- Clears caches

### db-sync.sh
Synchronizes database between environments:
- Backs up target database
- Exports source database
- Imports to target with URL replacement
- Handles user accounts appropriately

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

### Workflow 1: Content-Only Updates
When you only need to update content (posts, pages, media):

```bash
# 1. Export content tables only
./scripts/db-export.sh --content-only

# 2. Deploy to staging
./scripts/db-import.sh staging --content-only

# 3. Test on staging
# 4. Deploy to production
./scripts/db-import.sh production --content-only
```

### Workflow 2: Full Database Migration
When setting up new environment or major updates:

```bash
# 1. Full database export
./scripts/db-export.sh --full

# 2. Deploy with full import
./scripts/db-import.sh staging --full

# 3. Update environment-specific settings
./scripts/db-configure.sh staging

# 4. Test thoroughly
# 5. Repeat for production
```

### Workflow 3: Staging to Production
For moving tested changes from staging to production:

```bash
# 1. Backup production database
./scripts/db-backup.sh production

# 2. Sync from staging to production
./scripts/db-sync.sh production --source staging

# 3. Update production-specific settings
./scripts/db-configure.sh production

# 4. Clear all caches
./scripts/db-cache-clear.sh production
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
# 1. Export from DDEV
ddev export-db --file=local-export.sql.gz

# 2. Use our deployment scripts
./scripts/db-import.sh staging --source=local-export.sql.gz
```

## Automation and CI/CD

### Automated Database Deployments
For advanced setups, consider:
- **Scheduled content syncs**: Daily staging updates
- **Git hooks**: Auto-deploy database on code pushes
- **Migration scripts**: Version-controlled database changes
- **Health monitoring**: Automated post-deployment checks

### Migration Tracking
Keep track of database changes:
```bash
# Create migration file
./scripts/db-migration-create.sh "add_custom_fields"

# Run migrations
./scripts/db-migration-run.sh staging
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