# Trinity Health - Maintenance Guide

Guide for ongoing maintenance, updates, backups, and performance optimization.

## Regular Maintenance Tasks

### Daily Tasks
- Monitor site uptime
- Check for security alerts
- Review error logs

### Weekly Tasks
- Backup database
- Update plugins (test first)
- Clear old transients
- Check broken links

### Monthly Tasks
- Full site backup
- Security audit
- Performance review
- Update documentation

## Backup Procedures

### Database Backups

#### Manual Backup
```bash
# Local backup
ddev export-db --file=backups/database/backup-$(date +%Y%m%d).sql.gz

# Export for staging
./scripts/database-deploy.sh export-staging

# Export for production
./scripts/database-deploy.sh export-production
```

#### Automated Backups
Configure cron job on server:
```bash
# Daily database backup at 2 AM
0 2 * * * mysqldump -u[user] -p[pass] [database] | gzip > /backups/db-$(date +\%Y\%m\%d).sql.gz
```

### File Backups
```bash
# Backup theme files
tar -czf backups/theme-$(date +%Y%m%d).tar.gz web/wp-content/themes/trinity-health-theme/

# Backup uploads
tar -czf backups/uploads-$(date +%Y%m%d).tar.gz web/wp-content/uploads/
```

### Restore Procedures
```bash
# Restore database
ddev import-db --file=backups/database/backup.sql.gz

# Restore files
tar -xzf backups/theme-backup.tar.gz -C web/wp-content/themes/
```

## Updates

### WordPress Core Updates

#### Check for Updates
```bash
ddev exec wp core check-update
```

#### Update WordPress
```bash
# Backup first!
ddev export-db --file=backups/before-update.sql.gz

# Update core
ddev exec wp core update

# Update database
ddev exec wp core update-db

# Verify
ddev exec wp core verify-checksums
```

### Plugin Updates

#### Safe Update Process
1. **Test locally first**
```bash
# List updates
ddev exec wp plugin list --update=available

# Update specific plugin
ddev exec wp plugin update [plugin-name]

# Test functionality
```

2. **Deploy to staging**
3. **Test on staging**
4. **Deploy to production**

### Theme Updates

#### Update Build Dependencies
```bash
# Check for updates
ddev npm outdated

# Update packages
ddev npm update

# Rebuild assets
ddev npm run build

# Test thoroughly
```

## Performance Optimization

### Caching Configuration

#### WP Fastest Cache Settings
1. Login to WordPress admin
2. Navigate to **WP Fastest Cache**
3. Enable:
   - ✅ Cache System
   - ✅ Minify HTML
   - ✅ Minify CSS
   - ✅ Combine CSS
   - ✅ GZIP
   - ✅ Browser Caching
   - ✅ Mobile Cache

#### Clear Cache
```bash
# Via WP-CLI
ddev exec wp cache flush

# Via plugin
ddev exec wp fastest-cache clear all
```

### Database Optimization

#### Regular Cleanup
```bash
# Optimize tables
ddev exec wp db optimize

# Clean post revisions
ddev exec wp post delete $(ddev exec wp post list --post_type='revision' --format=ids)

# Clean transients
ddev exec wp transient delete --expired

# Clean spam comments
ddev exec wp comment delete $(ddev exec wp comment list --status=spam --format=ids)
```

#### Database Health Check
```bash
# Check database size
ddev exec wp db size --tables

# Check for overhead
ddev exec wp db query "SHOW TABLE STATUS WHERE Data_free > 0"
```

### Asset Optimization

#### Image Optimization
```bash
# Install image optimization tools
brew install jpegoptim optipng

# Optimize JPEGs
find web/wp-content/uploads -name "*.jpg" -exec jpegoptim {} \;

# Optimize PNGs
find web/wp-content/uploads -name "*.png" -exec optipng {} \;
```

#### Minification Check
```bash
# Verify minified assets
ls -lh web/wp-content/themes/trinity-health-theme/build/
```

## Security Maintenance

### Security Audits

#### File Permissions
```bash
# Check permissions
find web -type f -perm 0777 -ls
find web -type d -perm 0777 -ls

# Fix permissions
find web -type f -exec chmod 644 {} \;
find web -type d -exec chmod 755 {} \;
chmod 600 web/wp-config.php
```

#### Security Plugins
- **Wordfence** - Firewall and malware scanner
- **Sucuri** - Security audit and monitoring
- **iThemes Security** - Hardening and protection

### SSL Certificate
```bash
# Check SSL expiry
echo | openssl s_client -servername staging.object91.co.za -connect staging.object91.co.za:443 2>/dev/null | openssl x509 -noout -dates
```

### Password Policy
- Admin passwords: 16+ characters
- Database passwords: Complex, unique
- FTP passwords: Regular rotation
- API keys: Secure storage

## Monitoring

### Uptime Monitoring

#### Setup Monitoring
- [UptimeRobot](https://uptimerobot.com/) - Free monitoring
- [Pingdom](https://www.pingdom.com/) - Advanced monitoring
- [New Relic](https://newrelic.com/) - Application monitoring

#### Health Check Endpoints
```bash
# Homepage
curl -I https://staging.object91.co.za

# Admin
curl -I https://staging.object91.co.za/wp-admin/

# Custom health check
curl https://staging.object91.co.za/wp-json/
```

### Error Monitoring

#### Check Error Logs
```bash
# DDEV logs
ddev logs

# WordPress debug log
tail -f web/wp-content/debug.log

# PHP error log
ddev exec tail -f /var/log/apache2/error.log
```

#### Setup Error Reporting
In `wp-config.php`:
```php
// Development
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

// Production
define('WP_DEBUG', false);
```

### Performance Monitoring

#### PageSpeed Insights
```bash
# Check performance score
curl "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=https://staging.object91.co.za"
```

#### GTmetrix Analysis
- Visit [GTmetrix](https://gtmetrix.com/)
- Enter site URL
- Review recommendations

## Troubleshooting Common Issues

### Site Down
1. Check server status
2. Verify DNS resolution
3. Check .htaccess file
4. Review error logs
5. Test database connection

### Slow Performance
1. Clear all caches
2. Check database queries
3. Optimize images
4. Review plugin conflicts
5. Check server resources

### White Screen of Death
```bash
# Enable debug mode
ddev exec wp config set WP_DEBUG true --raw

# Check error log
tail -f web/wp-content/debug.log

# Disable plugins
ddev exec wp plugin deactivate --all

# Switch to default theme
ddev exec wp theme activate twentytwentyfour
```

### Database Connection Error
```bash
# Test connection
ddev exec wp db check

# Repair database
ddev exec wp db repair

# Check credentials
cat web/wp-config.php | grep DB_
```

## Disaster Recovery

### Recovery Plan
1. **Assessment**
   - Identify the issue
   - Check backups availability
   - Estimate downtime

2. **Communication**
   - Notify stakeholders
   - Update status page
   - Set expectations

3. **Recovery**
   - Restore from backup
   - Test functionality
   - Verify data integrity

4. **Post-Recovery**
   - Document incident
   - Update procedures
   - Implement preventions

### Rollback Procedure
```bash
# Quick rollback to previous database
./scripts/database-deploy.sh import-staging --file=backups/last-known-good.sql.gz

# Restore theme files
cd web/wp-content/themes/
rm -rf trinity-health-theme
tar -xzf /backups/theme-last-good.tar.gz
```

## Maintenance Mode

### Enable Maintenance Mode
Create `.maintenance` file in WordPress root:
```php
<?php
$upgrading = time();
```

### Custom Maintenance Page
```php
// In wp-content/maintenance.php
<?php
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 3600');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Maintenance - Trinity Health</title>
    <style>
        body { font-family: Arial; text-align: center; padding: 50px; }
        h1 { color: #880005; }
    </style>
</head>
<body>
    <h1>Under Maintenance</h1>
    <p>We're currently updating our site. Please check back soon.</p>
</body>
</html>
```

## Documentation Updates

### Keep Updated
- README.md - Project overview
- DEPLOYMENT.md - Deployment procedures
- DEVELOPMENT.md - Development guide
- MAINTENANCE.md - This file
- CHANGELOG.md - Version history

### Version Control
```bash
# Document changes
git add docs/
git commit -m "Update maintenance procedures"
git push origin main
```

## Support Contacts

### Emergency Contacts
- Hosting Support: [Contact details]
- Developer Team: [Contact details]
- System Admin: [Contact details]

### Resources
- [WordPress Support](https://wordpress.org/support/)
- [DDEV Documentation](https://ddev.readthedocs.io/)
- [Project Repository](repository-url)