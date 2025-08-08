# Trinity Health - Staging Deployment Guide

This guide explains how to deploy your Trinity Health WordPress site to a staging server.

## Setup

### 1. Create Environment Configuration

Copy the environment template:
```bash
cp .env.example .env
```

Edit `.env` with your staging server details:
```bash
# For FTP deployment
STAGING_HOST=your-staging-server.com
STAGING_USER=your-ftp-username
STAGING_PASS=your-ftp-password

# For SSH/RSYNC deployment
STAGING_HOST=your-staging-server.com
STAGING_USER=your-ssh-username
STAGING_PATH=/var/www/html
STAGING_PORT=22
```

### 2. Install Required Tools

**For FTP deployment:**
```bash
# macOS
brew install lftp

# Ubuntu/Debian
sudo apt-get install lftp
```

**For SSH/RSYNC deployment:**
```bash
# Usually pre-installed on macOS/Linux
# Ensure you have SSH key access to your server
ssh-keygen -t rsa -b 4096 -C "your-email@example.com"
ssh-copy-id your-username@your-staging-server.com
```

## Deployment Options

⚠️ **Important:** Always run deployment scripts from the Trinity Health project root directory (where the `web/` folder is located).

```bash
# Navigate to project root first
cd /path/to/trinity-health-website

# Verify you're in the correct directory
ls -la web/
```

### Option 1: FTP Deployment
Best for shared hosting providers:

```bash
# IMPORTANT: Run from project root directory
./deploy-staging.sh

# Or using npm from theme directory
cd web/wp-content/themes/trinity-health
npm run deploy:staging
```

### Option 2: SSH/RSYNC Deployment
Best for VPS/dedicated servers with SSH access:

```bash
# IMPORTANT: Run from project root directory
./deploy-staging-rsync.sh

# Or using npm from theme directory
cd web/wp-content/themes/trinity-health
npm run deploy:staging:rsync
```

## What Gets Deployed

✅ **Included:**
- WordPress core files
- Trinity Health custom theme (built assets)
- Plugins
- Uploads folder (synced, not replaced)

❌ **Excluded:**
- `wp-config.php` (use your staging server's version)
- `.htaccess` (use your staging server's version)
- Node.js source files
- Development dependencies
- Git repository
- Cache and temporary files

## Deployment Process

1. **Asset Building**: Compiles SCSS and JavaScript using `wp-scripts build`
2. **File Preparation**: Copies files excluding development assets
3. **Upload**: Transfers files via FTP or RSYNC
4. **Uploads Sync**: Safely syncs media uploads without overwriting
5. **Health Check**: Verifies the site is responding
6. **Permission Setting** (RSYNC only): Sets correct file permissions

## Staging Server Requirements

### FTP Deployment Requirements:
- FTP access to your staging server
- Write permissions to the web directory

### SSH/RSYNC Deployment Requirements:
- SSH access to your staging server
- RSYNC installed on both local and remote systems
- Write permissions to the web directory

## Troubleshooting

### Common Issues:

**"Permission denied" errors:**
- Check your FTP/SSH credentials in `.env`
- Verify directory permissions on staging server

**"Build failed" errors:**
- Ensure Node.js and npm are installed
- Run `npm install` in the theme directory

**"Site not responding" after deployment:**
- Check your staging server's `wp-config.php`
- Verify database connection settings
- Check server error logs

**Uploads not syncing:**
- Verify the uploads folder exists locally
- Check write permissions on staging server's uploads directory

## File Structure on Staging Server

After deployment, your staging server should have:
```
/your-web-root/
├── wp-admin/
├── wp-includes/
├── wp-content/
│   ├── themes/
│   │   └── trinity-health/ (your custom theme)
│   ├── plugins/
│   └── uploads/
├── index.php
├── wp-config.php (your staging configuration)
└── .htaccess (your staging configuration)
```

## Security Considerations

- Never commit your `.env` file to version control
- Use strong passwords for FTP/SSH access
- Consider using SSH keys instead of passwords for RSYNC deployment
- Regularly update your staging server's WordPress core and plugins

## Database Deployment

The Trinity Health website requires both file and database deployment. For comprehensive database deployment procedures, see [DATABASE-DEPLOYMENT.md](./DATABASE-DEPLOYMENT.md).

### Quick Database Operations

**Export local database:**
```bash
./scripts/db-export.sh --full          # Full database export
./scripts/db-export.sh --content-only  # Content only (posts, pages, media)
```

**Import to staging:**
```bash
./scripts/db-import.sh staging                    # Import latest backup
./scripts/db-import.sh staging --content-only    # Import only content
```

**Sync databases:**
```bash
./scripts/db-sync.sh staging              # Local → Staging
./scripts/db-sync.sh production --source=staging  # Staging → Production
```

### Complete Deployment Workflow

For a full site deployment (files + database):

1. **Deploy Files:**
   ```bash
   ./deploy-staging.sh         # or ./deploy-staging-rsync.sh
   ```

2. **Deploy Database:**
   ```bash
   ./scripts/db-sync.sh staging
   ```

3. **Verify Deployment:**
   - Check site loads correctly
   - Verify URLs are updated
   - Test core functionality

## Next Steps

After successful deployment:
1. Test your staging site thoroughly
2. Verify database URLs are correctly updated (handled automatically)
3. Configure any staging-specific plugins or settings
4. Set up automated backups for your staging environment
5. Review database deployment logs for any issues

## Support

For deployment issues specific to Trinity Health project:
- Check the project's main documentation
- Verify your DDEV local environment is working properly
- Test the build process locally before deploying