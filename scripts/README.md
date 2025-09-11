# Trinity Health - Deployment Scripts

Modular deployment scripts for the Trinity Health website with granular control over what gets deployed.

## Main Deployment Script

### `deploy.sh`

Modular deployment script with component-based deployment options.

**Usage:**

```bash
./scripts/deploy.sh [environment] [component] [options]
```

**Environments:**

- `staging` - Deploy to staging server
- `production` - Deploy to production server

**Components:**

- `theme` - Deploy theme files only
- `plugins` - Deploy all plugins
- `media` - Deploy media/uploads
- `core` - Deploy WordPress core files
- `database` - Export and prepare database
- `full` - Deploy everything (core + theme + plugins)

**Options:**

- `--build` - Build assets before deployment (for theme)
- `--no-backup` - Skip creating backups
- `--dry-run` - Show what would be deployed without deploying
- `-y, --yes` - Auto-confirm deployment

**Examples:**

```bash
# Build and deploy theme to staging
./scripts/deploy.sh staging theme --build

# Deploy plugins to staging
./scripts/deploy.sh staging plugins

# Sync media files to staging
./scripts/deploy.sh staging media

# Full deployment to production (with confirmation)
./scripts/deploy.sh production full -y

# Export database for staging
./scripts/deploy.sh staging database

# Dry run to see what would be deployed
./scripts/deploy.sh staging theme --dry-run
```

## Specialized Scripts

### `deploy-staging.sh` (Legacy)

**Deprecated:** Use `deploy.sh staging full` instead.

Legacy script for full staging deployment. Kept for backward compatibility.

### `database-deploy.sh`

Database export/import with URL replacement and table prefix conversion.

**Usage:**

```bash
# Export with staging URLs
./scripts/database-deploy.sh export-staging

# Export with production URLs
./scripts/database-deploy.sh export-production

# Import to staging
./scripts/database-deploy.sh import-staging

# Import to production
./scripts/database-deploy.sh import-production
```

**Features:**

- Automatic URL replacement based on .env configuration
- Table prefix conversion (`wp_` to `wpyn_` for staging)
- Database backup before import
- Malformed URL cleanup (removes :33001 and /wp suffixes)
- No placeholder URLs - uses actual environment URLs

## PHP Import Scripts

### `db-import.php`

Universal database import script for use on remote servers.

**Upload to server and run:**

```bash
# Import to staging
php db-import.php staging database-file.sql.gz

# Import to production
php db-import.php production database-file.sql.gz

# Auto-detect latest export
php db-import.php staging
```

**Features:**

- Uses .env configuration for database credentials
- Automatic table prefix detection and conversion
- URL replacement from local to target environment
- Creates backup before import

### `staging-db-import.php`

Specialized import script for staging server with hardcoded credentials.

**Usage:**

```bash
php staging-db-import.php database-file.sql.gz
```

## Environment Configuration

All scripts use the `.env` file for configuration. No hardcoded values!

**Required Variables:**

```bash
# FILE DEPLOYMENT
STAGING_HOST=ftp.example.com
STAGING_USER=username
STAGING_PASS=password
STAGING_PATH=/path/to/site
STAGING_PORT=21

PRODUCTION_HOST=ftp.example.com
PRODUCTION_USER=username
PRODUCTION_PASS=password
PRODUCTION_PATH=/path/to/site
PRODUCTION_PORT=22

# DATABASE DEPLOYMENT
STAGING_DB_HOST=localhost
STAGING_DB_NAME=database_name
STAGING_DB_USER=db_user
STAGING_DB_PASS=db_password

PRODUCTION_DB_HOST=localhost
PRODUCTION_DB_NAME=database_name
PRODUCTION_DB_USER=db_user
PRODUCTION_DB_PASS=db_password

# URL CONFIGURATION
LOCAL_URL=https://trinity-health-website.ddev.site
STAGING_URL=https://staging.example.com
PRODUCTION_URL=https://production.com
```

## Deployment Workflows

### Quick Theme Update

```bash
# Build and deploy theme only
./scripts/deploy.sh staging theme --build
```

### Full Staging Deployment

```bash
# 1. Export database with staging URLs
./scripts/database-deploy.sh export-staging

# 2. Deploy all files
./scripts/deploy.sh staging full --build

# 3. Import database on server
php db-import.php staging
```

### Production Deployment

```bash
# 1. Export database with production URLs
./scripts/database-deploy.sh export-production

# 2. Deploy everything with confirmation
./scripts/deploy.sh production full --build

# 3. Import database on server
php db-import.php production
```

### Media Sync

```bash
# Sync media files to staging
./scripts/deploy.sh staging media
```

### Plugin Updates

```bash
# Deploy plugins only
./scripts/deploy.sh staging plugins
```

## Best Practices

1. **Always Test on Staging First**

   ```bash
   ./scripts/deploy.sh staging full --dry-run
   ```

2. **Build Assets Before Theme Deployment**

   ```bash
   ./scripts/deploy.sh staging theme --build
   ```

3. **Use Dry Run to Preview**

   ```bash
   ./scripts/deploy.sh production full --dry-run
   ```

4. **Auto-confirm for CI/CD**

   ```bash
   ./scripts/deploy.sh staging full --build -y
   ```

## Troubleshooting

### FTP Connection Issues

- Check credentials in `.env`
- Verify `STAGING_PATH` or `PRODUCTION_PATH` is correct
- Ensure FTP/FTPS is enabled on server

### Database Import Issues

- **WordPress Installation Prompt**: Table prefix mismatch - check `wp_` vs `wpyn_`
- **URLs Not Updated**: Verify .env URLs are correct
- **Import Fails**: Check database credentials and permissions

### Deployment Issues

- **Files Not Uploaded**: Check FTP path configuration
- **Theme Not Working**: Ensure assets were built with `--build`
- **Plugins Missing**: Deploy plugins separately or use `full` deployment

## Requirements

- DDEV running locally
- lftp installed for FTP deployment
- PHP CLI for diagnostic scripts
- MySQL client for database operations
